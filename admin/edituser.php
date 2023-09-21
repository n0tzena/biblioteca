<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
</head>
<body>
    <?php include 'navbar.php' ?> 
    <div class="container">
        <h1>Editar Usuário</h1>

        <?php 
            $id = $_GET['id'];

            include 'classes.php';
            include 'connect.php';
    
            $rows = User::ReadUser($mysqli, 'id_usuario', $id);
        ?>

        <form method="post">
            <div>
                <label for="nome">Nome do Usuário</label>
                <input id="nome" name="nome" type="text" value='<?php echo $rows[0][1] ?>' >
            </div>
            <div>
                <label for="cpf">CPF</label>
                <input id="cpf" name="cpf" type="text" value='<?php echo $rows[0][2] ?>'>
            </div>
            <div>
                <label for="telefone">Telefone</label>
                <input id="telefone" name="telefone" type="text" value='<?php echo $rows[0][3] ?>'>
            </div>
            <div>
                <label for="endereco">Endereço</label>
                <input id="endereco" name="endereco" type="text" value='<?php echo $rows[0][4] ?>'>
            </div>
            <div>
            <label for="nivelAcesso">Nível de Acesso</label>
            <select id="nivelAcesso" name="nivelAcesso">
                <option value="0" <?php if($rows[0][5] == 0) echo "selected" ?>>Usuário</option>
                <option value="1" <?php if($rows[0][5] == 1) echo "selected" ?>>Administrador</option>
            </select>
            </div>
            <div>
            <button class="btn light-blue accent-4" type="submit" name="submit">Editar Usuário</button>
            </div>
        </form>

        <?php
            if(isset($_POST['submit']))
            {
                $nome = $_POST['nome'];
                $cpf = $_POST['cpf'];
                $tel = $_POST['telefone'];
                $end = $_POST['endereco'];

                if($_POST['nivelAcesso'] == 0)
                $nivelAcesso = 0;
                else $nivelAcesso = 1;

                if(User::UpdateUser($mysqli, $id, $nome, $cpf, $tel, $end, $nivelAcesso))
                echo "Usuário editado com sucesso!";
            }

        ?>

    </div>
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sel = document.querySelectorAll('select');
            M.FormSelect.init(sel)});
    </script>
</body>
</html>