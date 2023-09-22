<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Empréstimo</title>
</head>
<body>
    <?php include 'navbar.php' ?>

    <div class="container">
        <h1>Formulário de Empréstimo</h1>
        <form method="post">
            <div>
                <label for="nome_aluno">Nome do aluno</label>
                <input id="nome_aluno" name="nome_aluno" type="text" autocomplete="off" required>
            </div>
            <div>
                <label for="cpf">CPF</label>
                <input id="cpf" name="cpf" type="text" class="ls-mask-cpf" placeholder="000.000.000-00" autocomplete="off" required>
            </div>
            <div>
                <label for="telefone">Telefone</label>
                <input id="telefone" name="telefone" type="text" autocomplete="off" required>
            </div>
            <div>
                <label for="endereco">Endereço</label>
                <input id="endereco" name="endereco" type="text" autocomplete="off" required>
            </div>
        </form>
    </div>

<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
</body>
</html>