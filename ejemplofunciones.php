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
    <style>
        /* Estilo general del cuerpo, con máximo ancho y centrado */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 600px;
            margin: 40px auto;
            padding: 20px 30px;
            color: #333;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        /* Título centrado y con color oscuro */
        h2 {
            text-align: center;
            color: #222;
            margin-bottom: 30px;
        }

        /* Párrafos con espacio y tamaño legible */
        p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        /* Etiquetas en negrita para destacar */
        strong {
            font-weight: 700;
            color: #111;
        }

        /* Botón personalizado */
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 12px 28px;
            font-size: 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.25s ease;
            display: block;
            margin: 30px auto 0 auto;
            box-shadow: 0 4px 8px rgba(0,123,255,0.3);
        }

        /* Efecto hover para el botón */
        button:hover {
            background-color: #0056b3;
        }

        /* Quitar subrayado del enlace */
        a {
            text-decoration: none;
        }
    </style>
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
