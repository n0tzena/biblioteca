<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="./createuser.php">Criar Usuário</a></li>
            <li><a href="./user.php">Relatório de Usuários</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Criar Usuário</h1>
        <form method="post">
            <div>
                <label for="nome">Nome do Usuário</label>
                <input id="nome" name="nome" type="text">
            </div>
            <div>
                <label for="cpf">CPF</label>
                <input id="cpf" name="cpf" type="text">
            </div>
            <div>
                <label for="telefone">Telefone</label>
                <input id="telefone" name="telefone" type="text">
            </div>
            <div>
                <label for="endereco">Endereço</label>
                <input id="endereco" name="endereco" type="text">
            </div>
            <div>
            <label for="nivelAcesso">Nível de Acesso</label>
            <select id="nivelAcesso" name="nivelAcesso">
                <option value="0">Usuário</option>
                <option value="1">Administrador</option>
            </select>
            </div>
            <div>
                <input name="submit" type="submit" value="Criar Usuário">
            </div>
        </form>
        <?php
            include 'connect.php';
            include 'classes.php';

            if(isset($_POST['submit']))
            {
                $nome = $_POST['nome'];
                $cpf = $_POST['cpf'];
                $tel = $_POST['telefone'];
                $end = $_POST['endereco'];

                if($_POST['nivelAcesso'] == 0)
                $nivelAcesso = 0;
                else $nivelAcesso = 1;
                
                if(User::CreateUser($mysqli, $nome, $cpf, $tel, $end, $nivelAcesso))
                echo "Usuário criado com sucesso!";
            }

        ?>
    </div>
</body>
</html>