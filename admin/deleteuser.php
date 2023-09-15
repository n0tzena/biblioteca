<?php

include 'connect.php';
include 'classes.php';

$id = $_GET['id'];
User::DeleteUser($mysqli, $id);
header("Location: user.php");

?>