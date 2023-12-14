<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciclo de Vida</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
<?php 

include 'connect.php';
$id = $_GET['id'];

$query = "SELECT * FROM livros WHERE id_livro =  $id";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$rows = $result->fetch_all(MYSQLI_NUM);

// imagens
$query = "SELECT * FROM imagem WHERE id_livro = $id";
$stmt = $mysqli->prepare($query);
$stmt->execute(); $result = $stmt->get_result();
$imgrows = $result->fetch_all(MYSQLI_NUM);


?>
<h3><?php echo $rows[0][1] ?></h3>
<?php 
foreach ($imgrows as $row) {
    echo 
    "
    <div class='row grey lighten-3 ciclovida hoverable'>
        <div class='col s4 valign-wrapper'>
            <img class='responsive-img' src='.$row[2]'>
        </div>
        <div class='col s8'>
            <h5>Data da Foto</h5>
            <blockquote>$row[3]</blockquote>
            <h5>Hora</h5>
            <blockquote>$row[4]</blockquote>
            <h5>Comentários</h5>
            <blockquote>$row[5]</blockquote>
        </div>
    </div>
    ";
}
?>
</div>
</body>
</html>