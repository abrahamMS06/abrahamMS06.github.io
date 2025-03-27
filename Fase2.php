<?php
// Filtrar y validar los datos recibidos
$nombre        = filter_input(INPUT_GET, 'nombre', FILTER_SANITIZE_STRING);
$apellido_P    = filter_input(INPUT_GET, 'apellido_P', FILTER_SANITIZE_STRING);
$apellido_M    = filter_input(INPUT_GET, 'apellido_M', FILTER_SANITIZE_STRING);
$Numero_boleta = filter_input(INPUT_GET, 'Numero_boleta', FILTER_SANITIZE_NUMBER_INT);
$semestre      = filter_input(INPUT_GET, 'semestre', FILTER_SANITIZE_STRING);
$opcion        = filter_input(INPUT_GET, 'opcion', FILTER_SANITIZE_STRING);

// Lista de opciones válidas para evitar redirecciones no autorizadas
$opciones_validas = [
    'recuperar_correo_baja' => 'formulario_recuperar_correo_baja.html',
    'actualizar_telefono' => 'formulario_actualizar_telefono.html',
    'recuperar_contrasena' => 'formulario_recuperar_contrasena.html',
    'consultar_correo' => 'formulario_consultar_correo.html',
    'solicitar_correo' => 'formulario_solicitar_correo.html',
    'cambiar_correo' => 'formulario_cambiar_correo_egresado.html'
];

// Verificar que todos los datos están presentes
if ($nombre && $apellido_P && $apellido_M && $Numero_boleta && $semestre && isset($opciones_validas[$opcion])) {
    // Redirigir a la página correspondiente
    $url = $opciones_validas[$opcion] . "?nombre=" . urlencode($nombre) . 
           "&apellido_P=" . urlencode($apellido_P) . 
           "&apellido_M=" . urlencode($apellido_M) . 
           "&Numero_boleta=" . urlencode($Numero_boleta) . 
           "&semestre=" . urlencode($semestre);
    
    header("Location: $url");
    exit();
} else {
    echo "<p>Error: Datos incompletos o inválidos. Por favor, regresa a Fase 1.</p>";
}
?>
