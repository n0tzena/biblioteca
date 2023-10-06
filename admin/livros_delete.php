<?php

include 'connect.php';
include 'classes.php';

$id = $_GET['id'];
$query = "DELETE FROM livros WHERE id_livro = $id";
$stmt = $mysqli->prepare($query);
$stmt->execute();
header("Location: livros_read.php");

?>