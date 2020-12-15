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

foreach (devuelvePlatos($mysqli) as $plato) { ?>
  
  <ul>
        <li> 
            <a href="http://localhost:8080/detalle.php?id=<?= $plato["id"] ?>">
                Plato: <?= $plato["Titulo"] ?>
            </a>
        </li>
      
    </ul>

    

<?php }








