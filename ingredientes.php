<?php

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

$ingredientes = $mysqli->query("SELECT * FROM ingredientes");

function devuelveIngrediente(object $mysqli): object
{
   return $mysqli->query("SELECT * FROM ingredientes");
}

    foreach (devuelveIngrediente($mysqli, $_GET["id"]) as $ingrediente) {?>
        
        <li><?= $ingrediente["cantidad"] . " " . $ingrediente["nombre"] ?></li>
        <?php
    };
    ?>
    <form action="insert.php" method="post">
        <input type="text" name="ingrediente"></input>
        <input type="submit"/>
    </form>


