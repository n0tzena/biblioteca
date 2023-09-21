<?php

session_start();
$nome = $_SESSION['nome'];

echo "
<nav class='nav'>
<ul class='left'>
    <li><a href='./createuser.php'>Criar Usuário</a></li>
    <li><a href='./user.php'>Relatório de Usuários</a></li>
</ul>
<ul class='right'>
    <li><a>Bem-vindo, $nome</a></li>
    <li><a href='../login/logout.php'>Logout</a></li>
</ul>
</nav>
";

?>