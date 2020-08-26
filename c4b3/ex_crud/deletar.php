<?php

require_once 'db.php';
$connection = new mysqli($hn, $un, $pw, $db);

if ($connection->connect_error) die ("Não foi possivel conectar");

$query = "DELETE FROM titulo WHERE codtitulo=".$_GET['id'];
$result = $connection->query($query);

if (!$result) die ("Erro na query");

echo '<script> alert ("Excluído com sucesso!"); location.href=("index.php")</script>';

$result->close();
$conn->close();

?>