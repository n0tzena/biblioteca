<?php

session_start();
$nome = $_SESSION['nome'];

echo "
<nav class='nav'>
<ul class='left'>
    <li><a href='./createuser.php'>Criar usuário</a></li>
    <li><a href='./user.php'>Relatório de usuários</a></li>
    <li><a href='./form_emprestimo.php'>Formulário de empréstimo</a></li>
    <li><a href='./cad_livros.php'>Cadastro de livros</a></li>
</ul>
<ul class='right'>
    <li><a>Bem-vindo, $nome</a></li>
    <li><a href='../login/logout.php'>Logout</a></li>
</ul>
</nav>
";

?>