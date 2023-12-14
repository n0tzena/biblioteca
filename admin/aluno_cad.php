<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../sweetalert2/package/dist/sweetalert2.min.css">
    <script src="../sweetalert2/package/dist/sweetalert2.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/lib (1).png" type="image/gif">
    <title>libMyAdmin - Cadastro de Alunos</title>
</head>
<body>
    <?php include 'navbar.php' ?>

    <div class="container">
        <h1>Cadastro de alunos</h1>
        <form method="post" enctype="multipart/form-data">
            <div>
                <label for="nome">Nome do Aluno</label>
                <input id="nome" name="nome" type="text" autocomplete="off" required>
            </div>
            <div>
                <label for="cpf">CPF do Aluno</label>
                <input id="cpf" name="cpf" maxlength="14" type="text" autocomplete="off" onkeypress="mascarazinhaCpf()" required>
            </div>
            <div>
                <label for="telefone">Telefone do Aluno</label>
                <input id="telefone" name="telefone" maxlength="14" type="text" autocomplete="off" onkeypress="mascarazinhaTelefone()" required>
            </div>
            <div>
                <label for="end">Endereço do Aluno</label>
                <input id="end" name="end" type="text" autocomplete="off" required>
            </div>  
            <div class="row">
                <button class="btn" style="background-color: #512DA8;" type="submit" name="submit">Criar Aluno</button>
            </div> 
        
        </form>
    <?php
        include "./connect.php";

        if(isset($_POST["submit"]))
        {
            
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $telefone = $_POST['telefone'];
            $end = $_POST['end'];

            $query = "INSERT INTO aluno VALUES (?, ?, ?, ?)";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ssss", $nome, $cpf, $telefone, $end);
            $stmt->execute();

        }

    ?>
    </div>

<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="../login/cpf-mask.js"></script>
<script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var sel = document.querySelectorAll('#estado_fisico');
            M.FormSelect.init(sel)});
</script>
</body>
</html>