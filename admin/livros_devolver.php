<?php

include 'connect.php';
include 'classes.php';

$id = $_GET['id'];
$query = "UPDATE livros SET status_livro = 'Disponível' WHERE id_livro = $id";
$stmt = $mysqli->prepare($query);
$stmt->execute();
header("Location: livros_insp.php?id=$id");

?>