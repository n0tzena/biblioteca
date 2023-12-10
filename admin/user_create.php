<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../sweetalert2/package/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <script src="../sweetalert2/package/dist/sweetalert2.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar usuário</title>
</head>
<body>
    <?php include 'navbar.php' ?> 
    <div class="container">
        <h1>Criar usuário</h1>
        <form method="post">
            <div>
                <label for="nome">Nome do Usuário</label>
                <input id="nome" name="nome" type="text" autocomplete="off" required>
            </div>
            <div>
                <label for="senha">Senha</label>
                <input id="senha" name="senha" type="password" autocomplete="off" required onchange="checkPasswordStrength(this.value)">
                <div id="passwordStrength"></div>
            </div>
            <div>
                <label for="cpf">CPF</label>
                <input id="cpf" name="cpf" type="text" class="ls-mask-cpf" autocomplete="off" required onkeypress="mascarazinhaCpf()" maxlength="14">
            </div>
            <div>
                <label for="telefone">Telefone</label>
                <input id="telefone" name="telefone" type="text" autocomplete="off" required required onkeypress="mascarazinhaTelefone()" maxlength="14">
            </div>
            <div>
                <label for="endereco">Endereço</label>
                <input id="endereco" name="endereco" type="text" autocomplete="off" required>
            </div>
            <div class="row">
                <label for="nivelAcesso">Nível de Acesso</label>

                <select id="nivelAcesso" name="nivelAcesso">
                    <option value="0">Usuário</option>
                    <option value="1">Administrador</option>
                </select>
                <div class="row"> 
                    <div class="row">
                        <button class="btn pink darken-4" type="submit" name="submit">Criar Usuário
                            <i class="material-icons right">send</i>
                        </button>
                    </div>  
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
                $senha = $_POST['senha'];

                if($_POST['nivelAcesso'] == 0)
                $nivelAcesso = 0;
                else $nivelAcesso = 1;
                
                if(User::CreateUser($mysqli, $nome, $cpf, $tel, $end, $nivelAcesso, $senha))
                echo '<script type="text/javascript">
                Swal.fire(
                    "Exito",
                    "Usuário criado com sucesso!",
                    "success"
                );
                </script>';
            }

        ?>
    </div>
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sel = document.querySelectorAll('#nivelAcesso');
            M.FormSelect.init(sel)});
        
            function checkPasswordStrength(password) {
                // Initialize variables
                var strength = 0;
                var tips = "";

                // Check password length
                if (password.length < 8) {
                    tips += "Coloque mais caracteres. ";
                } else {
                    strength += 1;
                }

                // Check for mixed case
                if (password.match(/[a-z]/) && password.match(/[A-Z]/)) {
                    strength += 1;
                } else {
                    tips += "Use letras maiúsculas e minúsculas. ";
                }

                // Check for numbers
                if (password.match(/\d/)) {
                    strength += 1;
                } else {
                    tips += "Inclua pelo menos um número. ";
                }

                // Check for special characters
                if (password.match(/[^a-zA-Z\d]/)) {
                    strength += 1;
                } else {
                    tips += "Inclua pelo menos um caractere especial (Ex.: @, #, !, ?). ";
                }

                // Return results
                // Get the paragraph element
                var strengthElement = document.getElementById("passwordStrength");

                // Return results
                if (strength < 2) {
                strengthElement.textContent = "Senha fraca. " + tips;
                strengthElement.style.color = "red";
                } else if (strength === 2) {
                strengthElement.textContent = "Senha média. " + tips;
                strengthElement.style.color = "orange";
                } else if (strength === 3) {
                strengthElement.textContent = "Senha forte. " + tips;
                strengthElement.style.color = "limegreen";
                } else {
                strengthElement.textContent = "Senha extremamente forte. " + tips;
                strengthElement.style.color = "green";
                }
            }
    </script>
    <script type="text/javascript" src="../login/cpf-mask.js"></script>
</body>
</html>