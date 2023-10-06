<?php

session_start();
$nome = $_SESSION['nome'];

echo "
<nav class='nav'>
<ul class='left'>
    <li><a href='./user.php'>Gerenciar Usuários</a></li>
    <li><a href='./form_emprestimo.php'>Formulário de empréstimo</a></li>
    <li><a href='./livros.php'>Gerenciar Livros</a></li>
</ul>
<ul class='right'>
    <li><a>Bem-vindo, $nome</a></li>
    <li><a href='../login/logout.php'>Logout</a></li>
</ul>
</nav>
";

?>