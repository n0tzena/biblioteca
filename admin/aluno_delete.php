<?php

include 'connect.php';
include 'classes.php';

$cpf = $_GET['cpf'];
$cpf = urldecode($cpf); 
$query = "DELETE FROM aluno WHERE cpf = ? ";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $cpf);
$stmt->execute();

echo $cpf;
header("Location: aluno_read.php");

?>