<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Habilitar registro de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar si los datos del formulario están presentes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'] ?? 'No especificado';
    $apellido_P = $_POST['apellido_P'] ?? 'No especificado';
    $apellido_M = $_POST['apellido_M'] ?? 'No especificado';
    $numero_boleta = $_POST['Numero_boleta'] ?? 'No especificado';
    $semestre = $_POST['semestre'] ?? 'No especificado';
    $correo_personal = $_POST['Correo_Personal'] ?? 'No especificado';
    $Clave_Curp = $_POST['Clave_Curp'] ?? 'No especificado';

    // Manejo de archivos subidos
    $archivos_subidos = [];
    if (!empty($_FILES['documentos']['name'][0])) {
        foreach ($_FILES['documentos']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['documentos']['name'][$key];
            $file_tmp = $_FILES['documentos']['tmp_name'][$key];
            $file_size = $_FILES['documentos']['size'][$key];
            $file_path = __DIR__ . "/uploads/" . basename($file_name);

            // Verificar el tamaño del archivo (3400 KB = 3481600 bytes)
            if ($file_size > 3481600) {
                echo "<script>alert('El archivo $file_name es demasiado grande. El tamaño máximo permitido es 3.4 MB.');</script>";
                continue;
            }

            // Verificar si el archivo es un PDF
            if (pathinfo($file_name, PATHINFO_EXTENSION) === 'pdf') {
                if (move_uploaded_file($file_tmp, $file_path)) {
                    $archivos_subidos[] = $file_path;
                } else {
                    echo "<script>alert('Error al subir el archivo: $file_name');</script>";
                }
            } else {
                echo "<script>alert('El archivo $file_name no es un PDF válido.');</script>";
            }
        }
    }

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->SMTPDebug = SMTP::DEBUG_OFF; // Desactivar salida de depuración
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'Canelooctubre@gmail.com'; // Tu correo Gmail
        $mail->Password   = 'rszfieakydnabnrl';       // Tu contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Usar TLS
        $mail->Port       = 587; // Puerto para TLS

        // Remitente
        $mail->setFrom('Canelooctubre@gmail.com', 'Ingeniero Mendez');

        // Destinatario principal
        $mail->addAddress('victormanueldehenaulloa@gmail.com', 'Victor');


        // Adjuntar archivos
        foreach ($archivos_subidos as $archivo) {
            $mail->addAttachment($archivo);
        }

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Solicitud de Correo Institucional';
        $mail->Body = "
            <html>
            <head>
                <title>Solicitud de Correo Institucional</title>
            </head>
            <body>
                <h2>Solicitud de Correo Institucional</h2>
                 <p><strong>Nombre:</strong> $nombre</p>
                <p><strong>Apellido Paterno:</strong> $apellido_P</p>
                <p><strong>Apellido Materno:</strong> $apellido_M</p>
                <p><strong>Número de Boleta:</strong> $numero_boleta</p>
                <p><strong>Semestre:</strong> $semestre</p>
                <p><strong>Correo Personal:</strong> $correo_personal</p>
                <p><strong>Clave CURP:</strong> $Clave_Curp</p>
                <p><strong>Archivos Adjuntos:</p>
            </body>
            </html>
        ";

        // Enviar el correo
        $mail->send();
        header("Location: Fase1.php"); // Redirigir si el correo se envía correctamente
        exit();
    } catch (Exception $e) {
        header("Location: Fase2.php?error=1"); // Redirigir con error si falla el envío
        exit();
    }
} else {
    // Redirigir si no se envió el formulario
    header("Location: Fase1.php");
    exit();
}
?>