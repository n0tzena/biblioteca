<?php

session_start();
$nome = $_SESSION['nome'];

echo "
<nav class='nav pink darken-4'>
<ul class='left'>
    <li><a href='./user.php'>Gerenciar Usuários</a></li>
    <li><a href='./livros.php'>Gerenciar Livros</a></li>
    <li><a href='./aluno.php'>Gerenciar Alunos</a></li>
</ul>
<ul class='right'>
    <li><a>Bem-vindo, $nome</a></li>
    <li><a href='../login/logout.php'>Logout</a></li>
</ul>
</nav>
";

?>