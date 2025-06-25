<?php
function precioPorEdad($edad, $entrada) {
    if ($edad >= 0 && $edad <= 20) {
        return $entrada * 0.85;
    } elseif ($edad > 20 && $edad <= 50) {
        return $entrada * 0.80;
    } elseif ($edad > 50) {
        return $entrada * 0.70;
    }
    return $entrada;
}

function elegirColorPorEdad($edad) {
    if ($edad >= 0 && $edad <= 18) {
        return "#FFF5BA"; // amarillo claro
    } elseif ($edad > 18 && $edad <= 35) {
        return "#A7D8DE"; // celeste
    } elseif ($edad > 35) {
        return "#C1CDC1"; // gris verdoso
    }
    return "#FFFFFF";
}

$anioNacimiento = intval($_POST['anio'] ?? 0);
$nombre = htmlspecialchars($_POST['nombre'] ?? '');

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
    <title>Resultado de Descuento</title>
    <link rel="stylesheet" href="ejemplofunciones.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: <?= $colorFondo ?>;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            color: #333;
        }

        h2 {
            text-align: center;
            color: #222;
            margin-bottom: 30px;
        }

        p {
            font-size: 1.15rem;
            margin-bottom: 15px;
        }

        strong {
            color: #000;
        }

        .boton-volver {
            text-align: center;
            margin-top: 30px;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0 4px 8px rgba(0,123,255,0.3);
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>Detalle de la Entrada</h2>
    <p><strong>Nombre:</strong> <?= $nombre ?></p>
    <p><strong>Año de nacimiento:</strong> <?= $anioNacimiento ?></p>
    <p><strong>Edad actual:</strong> <?= $edad ?> años</p>
    <p><strong>Precio base:</strong> $<?= number_format($precioEntradaBase, 2) ?></p>
    <p><strong>Precio con descuento:</strong> $<?= number_format($precioConDescuento, 2) ?></p>
    <p><strong>Color aplicado:</strong> <?= $colorFondo ?></p>
    <div class="boton-volver">
        <a href="ejemplofunciones.html"><button type="button">Volver al formulario</button></a>
    </div>
</body>
</html>
