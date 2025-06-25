<?php
// 1. Crear array inicial
$listaCompras = ["pan", "leche", "huevos", "arroz", "pollo"];

// 2. Mostrar productos numerados
echo "<h3>Lista de Compras:</h3>";
foreach ($listaCompras as $indice => $producto) {
    echo ($indice + 1) . ". $producto<br>";
}

// 3. Agregar productos
array_push($listaCompras, "queso", "tomate");

// 4. Mostrar total
echo "<p>Total de productos: " . count($listaCompras) . "</p>";

// 5. Verificar si "leche" está en la lista
if (in_array("leche", $listaCompras)) {
    echo "<p>Leche está en la lista.</p>";
} else {
    echo "<p>Leche no está en la lista.</p>";
}
?>
