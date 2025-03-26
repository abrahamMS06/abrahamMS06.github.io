<?php
// Verificar si los datos están presentes en la URL
if (isset($_GET['nombre']) && isset($_GET['apellido_P']) && isset($_GET['apellido_M']) && isset($_GET['Numero_boleta']) && isset($_GET['semestre']) && isset($_GET['opcion'])) {
    
    // Obtener y sanitizar los datos de la URL
    $nombre        = htmlspecialchars(urldecode($_GET['nombre']));
    $apellido_P    = htmlspecialchars($_GET['apellido_P']);
    $apellido_M    = htmlspecialchars($_GET['apellido_M']);
    $Numero_boleta = htmlspecialchars($_GET['Numero_boleta']);
    $semestre      = htmlspecialchars($_GET['semestre']);
    $opcion        = htmlspecialchars($_GET['opcion']);

    // Redirigir según la opción seleccionada
    switch ($opcion) {
        case 'recuperar_correo_baja':
            header("Location: formulario_recuperar_correo_baja.php?nombre=$nombre&apellido_P=$apellido_P&apellido_M=$apellido_M&Numero_boleta=$Numero_boleta&semestre=$semestre");
            break;

        case 'actualizar_telefono':
            header("Location: formulario_actualizar_telefono.php?nombre=$nombre&apellido_P=$apellido_P&apellido_M=$apellido_M&Numero_boleta=$Numero_boleta&semestre=$semestre");
            break;

        case 'recuperar_contrasena':
            header("Location: formulario_recuperar_contrasena.php?nombre=$nombre&apellido_P=$apellido_P&apellido_M=$apellido_M&Numero_boleta=$Numero_boleta&semestre=$semestre");
            break;

        case 'consultar_correo':
            header("Location: formulario_consultar_correo.php?nombre=$nombre&apellido_P=$apellido_P&apellido_M=$apellido_M&Numero_boleta=$Numero_boleta&semestre=$semestre");
            break;

        case 'solicitar_correo':
            header("Location: formulario_solicitar_correo.php?nombre=$nombre&apellido_P=$apellido_P&apellido_M=$apellido_M&Numero_boleta=$Numero_boleta&semestre=$semestre");
            break;

        case 'cambiar_correo':
            header("Location: formulario_cambiar_correo_egresado.php?nombre=$nombre&apellido_P=$apellido_P&apellido_M=$apellido_M&Numero_boleta=$Numero_boleta&semestre=$semestre");
            break;

        default:
            echo "<p>Opción no válida. Por favor, regresa a Fase 1 y selecciona una opción correcta.</p>";
            break;
    }
    exit();

} else {
    echo "<p>No se recibieron los datos correctamente. Por favor, regresa a Fase 1.</p>";
}
?>