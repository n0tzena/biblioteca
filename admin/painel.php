<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
</head>
<body>
<?php include 'navbar.php' ?>
<div class="container">
    <h1>Gerenciamento de Usuários</h1>
    <h3><a href="user_create.php">Cadastrar Usuário</a></h3>
    <h3><a href="user_read.php">Relatório de Usuários</a></h3>
    <h1>Gerenciamento de Alunos</h1>
    <h3><a href="aluno_cad.php">Cadastrar Aluno</a></h3>
    <h3><a href="aluno_read.php">Relatório de Alunos</a></h3>
    <h1>Gerenciamento de Livros</h1>
    <h3><a href="livros_cad.php">Cadastrar Livro</a></h3>
    <h3><a href="livros_read.php">Relatório de Livros</a></h3>
    <h3><a href="emprestimo_read.php">Relatório de Empréstimos</a></h3>
</div>
</body>
</html>