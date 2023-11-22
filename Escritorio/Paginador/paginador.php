<?php
// Generar array asociativo con información de personas
$personas = [];
for ($i = 1; $i <= 20; $i++) {
    $personas[] = [
        'nombre' => 'Persona ' . $i,
        'dni' => 'dni'. $i .''.$i.''.$i.''.$i.''.$i,
        'poblacion' => 'Ciudad ' . $i+1000
    ];
}

// Obtener la variable 'page' del query string (1 por defecto)
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;


$personasPorPagina = 5;//Personas para mostrar por página

// Calcular inicio y fin para cada página 
$inicio = ($page - 1) * $personasPorPagina;
$fin = $inicio + $personasPorPagina - 1;

// Filtrar las personas para mostrar solo las 5 personas de la pagina
$personasPagina = array_slice($personas, $inicio, $personasPorPagina);

// Mostrar los resultados de la página correcta
echo "<h1>Personas de la página $page</h1>";
foreach ($personasPagina as $persona) {
    echo "<p>Nombre: {$persona['nombre']} - DNI: {$persona['dni']} - Población: {$persona['poblacion']}</p>";
}

// Navegación en el pie de la página
echo "<div>";
echo "<p>Páginas: ";
for ($i = 1; $i <= ceil(count($personas) / $personasPorPagina); $i++) {
    echo "<a href='?page=$i'>$i</a> ";
}
echo "</p>";
echo "</div>";

?>