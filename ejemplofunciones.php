<?php
//funcion para el precio de entrada
function precioPorEdad($edad, $entrada) {
    $precioFinal = $entrada;
    if ($edad >= 0 && $edad <= 20) {
        $precioFinal = $entrada * 0.85;
    } elseif ($edad > 20 && $edad <= 50) {
        $precioFinal = $entrada * 0.80;
    } elseif ($edad > 50) {
        $precioFinal = $entrada * 0.70;
    }
    return $precioFinal;
}

// funcion para el color de pagina
function elegirColorPorEdad($edad) {
    $color = "#FFFFFF";
    if ($edad >= 0 && $edad <= 18) {
        $color = "#FFF5BA";
    } elseif ($edad > 18 && $edad <= 35) {
        $color = "#A7D8DE";
    } elseif ($edad > 35) {
        $color = "#C1CDC1";
    }
    return $color;
}

$anioNacimiento = intval($_POST['anio'] ?? 0);
$nombre = htmlspecialchars($_POST['nombre'] ?? '');

// Precio base fijo
$precioEntradaBase = 100;

$anioActual = date("Y");
$edad = $anioActual - $anioNacimiento;

$colorFondo = elegirColorPorEdad($edad);
$precioConDescuento = precioPorEdad($edad, $precioEntradaBase);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <link rel="stylesheet" href="ejemplofunciones.css">
</head>
<body style="background-color: <?= $colorFondo ?>;">
    <h2>Resultado</h2>
    <p><strong>Nombre:</strong> <?= $nombre ?></p>
    <p><strong>Año de nacimiento:</strong> <?= $anioNacimiento ?></p>
    <p><strong>Edad actual:</strong> <?= $edad ?> años</p>
    <p><strong>Precio base:</strong> <?= number_format($precioEntradaBase, 2) ?> </p>
    <p><strong>Precio con descuento:</strong> <?= number_format($precioConDescuento, 2) ?> </p>
    <p><strong>Color aplicado:</strong> <?= $colorFondo ?></p>
    <p>
        <a href="ejemplofunciones.html"><button type="button">Volver al formulario</button></a>
    </p>
</body>
</html>
