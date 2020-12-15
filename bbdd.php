<?php
declare(strict_types=1);
function conexion(string $host, string $user, string $password, string $database): object
{
    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        exit;
    }
    return ($mysqli);
}
$mysqli = conexion("localhost", "root", "", "BaseDatosMenu");
$platos = $mysqli->query("SELECT * FROM Platos");
function devuelvePlatos(object $conexion)
{
    return $conexion->query("SELECT * FROM Platos");
}
function devuelveIngrediente(object $conexion, string $plato): object
{
    return $conexion->query("SELECT plato_ingredientes.cantidad, ingredientes.nombre FROM plato_ingredientes LEFT JOIN
    ingredientes ON plato_ingredientes.id_ingrediente=ingredientes.id  WHERE id_platos=$plato");
}
foreach (devuelvePlatos($mysqli) as $plato) { ?>
  
    <ul>
        <li>Plato: <?= $plato["Titulo"] ?></li>
        <li>Comensales: <?= $plato["Comensales"] ?></li>
        <li>Tipo: <?= $plato["Tipo"] ?></li>
        <li>Ingredientes:</li>
        <ul>
            <?php
            foreach (devuelveIngrediente($mysqli, $plato["id"]) as $ingrediente) {
            ?>
                <li><?= $ingrediente["cantidad"] . " " . $ingrediente["nombre"] ?></li>
            <?php
            };
            ?>
        </ul>
    </ul>
<?php }
