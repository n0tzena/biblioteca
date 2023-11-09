<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspecionar Livro</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <style>
        blockquote
        {
            margin: 0;
        }
    </style>
</head>
<body>
<?php 
    include 'navbar.php'; 
    include 'connect.php'; 
    $id = $_GET['id'];

    $query = "SELECT * FROM livros WHERE id_livro =  $id";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $rows = $result->fetch_all(MYSQLI_NUM);
?>
<div class="container">
    <h1>Inspeção</h1>
    <div class="row">
        <div class="col s4">
            <img class="responsive-img" src=".<?php echo $rows[0][7] ?>">
            <div class="row">
                <a class="waves-effect waves-light btn disabled">Editar Livro</a>
                <a class="waves-effect waves-light btn" href="./emprestimo_cad.php?id=<?php echo $id ?>">Empréstimo</a>
                <?php if($rows[0][2] != "Disponível") echo "<a class='waves-effect waves-light btn' href='./livros_devolver.php?id=$id'>Devolver Livro</a>" ?>
            </div>
            <div class="row">
                <a class="red waves-effect waves-light btn-small" href="./livros_delete.php?id=<?php echo $id ?>">Excluir Livro</a>
            </div>
        </div>
        <div class="col s8">
            <div class="row">
                <h4><?php echo $rows[0][1] ?></h4>
            </div>
            <div class="row">
                <h5>Gênero</h5>
                <blockquote><?php echo $rows[0][4] ?></blockquote>
            </div>
            <div class="row">
                <h5>Autor</h5>
                <blockquote><?php echo $rows[0][3] ?></blockquote>
            </div>
            <div class="row">
                <h5>Número de Páginas</h5>
                <blockquote><?php echo $rows[0][5] ?></blockquote>
            </div>
            <div class="row">
                <h5>Estado do Livro</h5>
                <blockquote><?php echo $rows[0][6] ?></blockquote>
            </div>
            <div class="row">
                <h5>Disponiblidade</h5>
                <blockquote class="white-text <?php if($rows[0][2] == "Disponível") echo "green"; else echo "red";?>"><?php echo $rows[0][2] ?></blockquote>
            </div>
            <div class="row">
                <h5>Observações</h5>
                <blockquote><?php echo $rows[0][8] ?></blockquote>
            </div>
        </div>
    </div>
</div>
</body>
</html>