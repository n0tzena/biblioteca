<?php

session_start();
$nome = $_SESSION['nome'];

echo "
    <style id=\"darkMode\">
    body
    {
        color: white;
        background-color: #151515;
    }
    input
    {
        color: white;
    }
    .description::-webkit-scrollbar
    {
        width: 5px;
        background-color: rgb(24, 24, 24);
        border-radius: 5px;
    }
    .description::-webkit-scrollbar-thumb
    {
        background: #707070;
        border-radius: 5px;
    }
    .material-icons
    {
        color: white;
    }
    .sidenav
    {
        background-color: #101010;
        color: white;
    }
    .sidenav li a
    {
        color: white;
    }
    .sidenav li a.subheader
    {
        color: rgb(199, 199, 199);
    }
    .sidenav .divider
    {
        border-bottom: solid rgb(50, 50, 50) 1px;
    }
    tr
    {
        border-bottom: solid rgb(78, 78, 78) 1px;
    }
    </style>

    <ul id='slide-out' class='sidenav'>
    <li><div class='user-view'>
    <div class='background'>
    <img src='../images/background4.png'>
    </div>
    <a href='#user'><img class='circle' src='../images/user3.png'></a>
    <a href='#name'><span class='white-text name'>$nome</span></a>
    <a href='../login/logout.php'><span class='white-text email'>Logout</span></a>
    </div></li>

    <li><a class='subheader'>Modo Noturno</a></li>
    <li>
        <div style=\"margin-left: 20px;\" class=\"switch\">
            <label>
            Off
            <input id=\"nightModeCheck\" type=\"checkbox\" onclick=\"alternateDarkMode()\">
            <span class=\"lever\"></span>
            On
            </label>
        </div>
    </li>
    <li><div class='divider'></div></li>
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
<script>
    darkModeStyle = document.getElementById(\"darkMode\");
    //nightModeIcon = document.getElementById(\"nightModeIcon\");    
    nightModeButton = document.getElementById(\"nightModeCheck\");  

    function darkModeIcons()
    {
        // troca os icones
        if(darkModeStyle.disabled)
        {
            //nightModeIcon.src = \"../images/night-sleep.svg\";
        } else {
            //nightModeIcon.src = \"../images/sun.svg\"
            nightModeButton.setAttribute(\"checked\", \"true\");
        }
    }
    // modo noturno
    function alternateDarkMode()
    {
        // inverte o tema atual
        darkModeStyle.disabled = !darkModeStyle.disabled;
        darkModeIcons();
        // guarda o tema preferido
        localStorage.setItem(\"nightMode\", darkModeStyle.disabled)
    }

    // coloca o tema que o usuario deixou
    previousMode = localStorage.getItem(\"nightMode\");
    if(previousMode === \"false\")
    darkModeStyle.disabled = false;
    else darkModeStyle.disabled = true;
    darkModeIcons();
</script>
";

?>