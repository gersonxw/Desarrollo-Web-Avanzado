<?php
/******************************/
// CONFIGURACIÓN
/******************************/
$host = "localhost";
$db = "escuela_pdo";
$user = "root";
$pass = "";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

/******************************/
// CONEXIÓN PDO (con excepciones)
/******************************/
try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

/***************************
 * MENSAJES PARA MOSTRAR EN PANTALLA
 ***************************/
$mensaje = "";
$detalle = "";

/***************************
 * PROCESAR FORMULARIO
 ***************************/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"] ?? "");
    $apellido = trim($_POST["apellido"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $simularError = isset($_POST["simular_error"]);

    if ($nombre === "" || $apellido === "" || $correo === "") {
        $mensaje = "Todos los campos son obligatorios.";
    } else {
        try {
            $pdo->beginTransaction();

            $sqlAlumno = "INSERT INTO alumnos (nombre, apellido, correo) VALUES (:nombre, :apellido, :correo)";
            $stmtAlumno = $pdo->prepare($sqlAlumno);
            $stmtAlumno->execute([
                "nombre" => $nombre,
                "apellido" => $apellido,
                "correo" => $correo
            ]);

            $idAlumno = (int)$pdo->lastInsertId();

            if ($simularError) {
                throw new Exception("Simulación de error activada: se fuerza rollback.");
            } else {
                $sqlLog = "INSERT INTO logs_alumnos (idAlumno, accion) VALUES (:idAlumno, :accion)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([
                    "idAlumno" => $idAlumno,
                    "accion" => "ALTA_ALUMNO"
                ]);
            }

            $pdo->commit();
            $mensaje = "✅ Transacción confirmada (COMMIT). Alumno registrado con ID: $idAlumno";
        } catch (Exception $e) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }
            $mensaje = "❌ Ocurrió un error. Transacción revertida (ROLLBACK).";
            $detalle = $e->getMessage();
        }
    }
}

/******************************
 * CONSULTAS PARA MOSTRAR TABLAS
 ******************************/
$alumnos = $pdo->query("SELECT * FROM alumnos ORDER BY idAlumno DESC")->fetchAll();
$logs = $pdo->query("SELECT * FROM logs_alumnos ORDER BY idLog DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Práctica PDO: try/catch y transacciones</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            padding: 30px 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        h2 {
            color: #1a3e6f;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 24px;
            margin-bottom: 24px;
        }
        .form-grid {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .form-field {
            flex: 1;
            min-width: 200px;
        }
        .form-field label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }
        .form-field input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s;
        }
        .form-field input:focus {
            outline: none;
            border-color: #0b5ed7;
        }
        .checkbox-group {
            margin: 20px 0;
        }
        .checkbox-group label {
            font-weight: normal;
            cursor: pointer;
        }
        .checkbox-group small {
            color: #666;
            font-size: 12px;
            margin-left: 24px;
            display: block;
        }
        .btn {
            background: #0b5ed7;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn:hover {
            background: #0a58ca;
        }
        .msg {
            background: #e9ecef;
            padding: 12px 16px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .msg-success {
            background: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }
        .msg-error {
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }
        .detail {
            font-size: 12px;
            color: #856404;
            margin-top: 8px;
        }
        h3 {
            color: #1a3e6f;
            margin-bottom: 16px;
            font-size: 18px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        th {
            background: #f8f9fa;
            padding: 12px;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }
        td {
            padding: 10px 12px;
            border-bottom: 1px solid #dee2e6;
        }
        tr:hover {
            background: #f8f9fa;
        }
        .small-note {
            font-size: 12px;
            color: #666;
            margin-top: 16px;
            text-align: center;
        }
        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Práctica: try/catch y transacciones (PDO + MySQL)</h2>

    <div class="card">
        <form method="POST">
            <div class="form-grid">
                <div class="form-field">
                    <label>Nombre</label>
                    <input type="text" name="nombre" maxlength="15" value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>" />
                </div>
                <div class="form-field">
                    <label>Apellido</label>
                    <input type="text" name="apellido" maxlength="10" value="<?= htmlspecialchars($_POST['apellido'] ?? '') ?>" />
                </div>
                <div class="form-field">
                    <label>Correo</label>
                    <input type="email" name="correo" maxlength="50" value="<?= htmlspecialchars($_POST['correo'] ?? '') ?>" />
                </div>
            </div>

            <div class="checkbox-group">
                <label>
                    <input type="checkbox" name="simular_error" <?= isset($_POST['simular_error']) ? ' checked' : '' ?> />
                    Simular error para forzar ROLLBACK
                </label>
                <small>(Activa para comprobar que no se guarda nada si falla un paso.)</small>
            </div>

            <button class="btn" type="submit">Registrar alumno</button>
        </form>

        <?php if ($mensaje): ?>
            <div class="msg <?= strpos($mensaje, '✅') !== false ? 'msg-success' : 'msg-error' ?>">
                <?= htmlspecialchars($mensaje) ?>
                <?php if ($detalle): ?>
                    <div class="detail">Detalle (solo desarrollo): <?= htmlspecialchars($detalle) ?></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="card">
        <h3>Tabla alumnos</h3>
        <?php if (!$alumnos): ?>
            <p style="color: #666; font-size: 14px;">Sin registros.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th><th>Nombre</th><th>Apellido</th><th>Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alumnos as $a): ?>
                    <tr>
                        <td><?= htmlspecialchars($a['idAlumno']); ?></td>
                        <td><?= htmlspecialchars($a['nombre']); ?></td>
                        <td><?= htmlspecialchars($a['apellido']); ?></td>
                        <td><?= htmlspecialchars($a['correo']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <div class="card">
        <h3>Tabla logs_alumnos</h3>
        <?php if (!$logs): ?>
            <p style="color: #666; font-size: 14px;">Sin registros.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID Log</th><th>ID Alumno</th><th>Acción</th><th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($logs as $l): ?>
                    <tr>
                        <td><?= htmlspecialchars($l['idLog']) ?></td>
                        <td><?= htmlspecialchars($l['idAlumno']) ?></td>
                        <td><?= htmlspecialchars($l['accion']) ?></td>
                        <td><?= htmlspecialchars($l['fecha']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <p class="small-note">
        Prueba recomendada: 1) Registrar sin simular error (COMMIT). 2) Activar "Simular error" y registrar (ROLLBACK).
    </p>
</div>
</body>
</html>