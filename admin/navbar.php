<?php

session_start();
$nome = $_SESSION['nome'];

echo "
    <ul id='slide-out' class='sidenav'>
    <li><div class='user-view'>
    <div class='background'>
    <img src='../images/background4.png'>
    </div>
    <a href='#user'><img class='circle' src='../images/user3.png'></a>
    <a href='#name'><span class='white-text name'>$nome</span></a>
    <a href='../login/logout.php'><span class='white-text email'>Logout</span></a>
    </div></li>

    <li><a class='subheader'>Usuários</a></li>
    <li><a href='./user_create.php'>Cadastro de usuários</a></li>
    <li><a href='./user_read.php'>Relatório de usuários</a></li>
    <li><div class='divider'></div></li>

    <li><a class='subheader'>Livros</a></li>
    <li><a href='./livros_cad.php'>Cadastro de livros</a></li>
    <li><a href='./livros_read.php'>Relatório de livros</a></li>
    <li><a href='./emprestimo_read.php'>Empréstimos</a></li>
    <li><div class='divider'></div></li>

    <li><a class='subheader'>Alunos</a></li>
    <li><a href='./aluno_cad.php'>Cadastro de alunos</a></li>
    <li><a href='./aluno_read.php'>Relatório de alunos</a></li>
    <li><div class='divider'></div></li>
    
    <!--
    <li><div class='divider'></div></li>
    <li><a class='subheader'>Subheader</a></li>
    <li><a class='waves-effect' href='#!'>Third Link With Waves</a></li>-->
    </ul>

    <a href='#' data-target='slide-out' class='sidenav-trigger'>
        <i class='material-icons' style='font-size: 2.1rem; padding: 10px;'>menu</i>
    </a>
";

echo "
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var side = document.querySelectorAll('.sidenav');
        M.Sidenav.init(side)
    });
</script>
<script src='../materialize/js/materialize.min.js'></script>
";

?>