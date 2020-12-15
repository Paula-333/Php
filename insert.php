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


//echo htmlspecialchars($_POST["ingrediente"]) . '!';
$newIngrediente = $_POST ['ingrediente'];

function insertIngrediente(object $mysqli, string $newIngrediente){

    return $mysqli->query("INSERT INTO ingredientes(nombre) VALUES ('$newIngrediente')");
}

insertIngrediente($mysqli, $_POST ['ingrediente']);

?>




