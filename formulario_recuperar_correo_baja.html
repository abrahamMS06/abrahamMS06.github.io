<?php
// Verificar si los datos están presentes en la URL
if (isset($_GET['nombre']) && isset($_GET['apellido_P']) && isset($_GET['apellido_M']) && isset($_GET['Numero_boleta']) && isset($_GET['semestre'])) {
    // Obtener los datos de la URL
    $nombre = htmlspecialchars(urldecode($_GET['nombre'])); // Decodificar el nombre
    $apellido_P = htmlspecialchars($_GET['apellido_P']); // Obtener el apellido_P
    $apellido_M  = htmlspecialchars($_GET['apellido_M']); // Obtener el apellido_M
    $Numero_boleta = htmlspecialchars($_GET['Numero_boleta']);
    $semestre = htmlspecialchars($_GET['semestre']);
} else {
    // Si no hay datos, redirigir a Fase 1
    header("Location: Fase1.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar Correo Institucional</title>
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            text-align: left;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: 600;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="file"]:focus {
            border-color: #007bff;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .file-upload {
            margin-bottom: 20px;
        }

        .file-upload input[type="file"] {
            display: none;
        }

        .file-upload label {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .file-upload label:hover {
            background-color: #0056b3;
        }

        .file-upload span {
            display: block;
            margin-top: 10px;
            color: #777;
            font-size: 14px;
        }

        .file-preview {
            margin-top: 20px;
            text-align: left;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .file-preview h3 {
            margin-top: 0;
            font-size: 18px;
            color: #333;
        }

        .file-preview ul {
            list-style-type: none;
            padding: 0;
        }

        .file-preview li {
            margin-bottom: 10px;
            font-size: 14px;
            color: #555;
            padding: 8px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .back-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color:rgb(206, 0, 0);
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color:rgb(255, 0, 0);
        }


    </style>
</head>
<body>
    <div class="form-container">
        <h1>Aviso</h1>
        <p>
            Este formulario sirve para los siguientes casos:
            <ul>
                <li>Se te hizo llegar un correo que te notifico que se daria de baja tu correo.</li>
                <li>Tu correo Institucional fue dado de baja por falta de uso.</li>
                <li>Se dio baja tu correo por actividades sospechosas.</li>
            </ul>
        </p>
        <p>
            Si es tu caso, llena el formulario con tus datos y en breve nos pondremos en contacto contigo para ayudarte a resolver tu problema.
            Ten en cuenta que el proceso puede tardar, así que ten tus documentos a la mano y en formato PDF, ya que esto agiliza el proceso de ayuda.
        </p>
        <p>
            Si no es tu caso, te invitamos a que vuelvas a la <strong>Fase 1</strong> y selecciones la opción correcta para que puedas ser redirigido al formulario correspondiente.
        </p>
         <!-- Botón para regresar a Fase 1 -->
        <a href="Fase1.php" class="back-button">Regresar a Fase 1</a>

        <h1>Formulario</h1>
        <p>
            Por favor, llena el siguiente formulario con tus datos y sube los siguientes documentos para poder ayudarte.
        </p>
        <ul>
            <li>Correo @ipn.mx que se te hizo llegar en PDF.</li>
            <li>Comprobante de Horario Renombralo (HORARIO_NOMBREC_NUMEROBOLETA).</li>
            <li>CURP.</li>
        </ul>
        <br><br>

<!-- Formulario de contacto -->
<form action="BAJA_CORREO_IPN.PHP" method="post" enctype="multipart/form-data">
    <!-- Campo para el nombre -->
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" readonly>
    
    <!-- Campo para el apellido paterno -->
    <label for="apellido_P">Apellido Paterno:</label>
    <input type="text" id="apellido_P" name="apellido_P" value="<?php echo htmlspecialchars($apellido_P); ?>" readonly>

    <!-- Campo para el apellido materno -->
    <label for="apellido_M">Apellido Materno:</label>
    <input type="text" id="apellido_M" name="apellido_M" value="<?php echo htmlspecialchars($apellido_M); ?>" readonly>

    <!-- Campo para el número de boleta -->
    <label for="Numero_boleta">Número de Boleta:</label>
    <input type="text" id="Numero_boleta" name="Numero_boleta" value="<?php echo $Numero_boleta; ?>" readonly>
    
    <!-- Campo para el Correo Personal -->
    <label for="Correo_Personal">Correo Personal</label>
    <input type="text" id="Correo_Personal" name="Correo_Personal" required>

    <!-- Campo para la Clave Curp -->
    <label for="Clave_Curp">Clave Curp:</label>
    <input type="text" id="Clave_Curp" name="Clave_Curp" required>

    <!-- Campo para el Correo Institucional -->
    <label for="Correo_Institucional">Correo Institucional:</label>
    <input type="email" id="Correo_Institucional" name="Correo_Institucional" required>

    <!-- Campo para el semestre -->
    <label for="semestre">Semestre:</label>
    <input type="text" id="semestre" name="semestre" value="<?php echo $semestre; ?>" readonly>

    <!-- Campo para subir múltiples archivos PDF -->
    <div class="file-upload">
        <label for="documentos">Subir documentos (PDF):</label>
        <input type="file" id="documentos" name="documentos[]" accept=".pdf" multiple required>
        <span>Puedes seleccionar más de 5 archivos PDF.</span>
    </div>

    <!-- Vista previa de archivos -->
    <div class="file-preview" id="filePreview">
        <h3>Archivos seleccionados:</h3>
        <ul id="fileList"></ul>
    </div>

    <input type="submit" value="Enviar">
</form>

<script>
    // Script para mostrar vista previa de los archivos seleccionados
    document.getElementById('documentos').addEventListener('change', function(e) {
        const fileList = document.getElementById('fileList');
        fileList.innerHTML = '';
        
        for (let i = 0; i < this.files.length; i++) {
            const li = document.createElement('li');
            li.textContent = this.files[i].name;
            fileList.appendChild(li);
        }
    });
</script>
    </div>
</body>
</html>
