<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../sweetalert2/package/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="cpf-mask.js"></script>
    <script src="../sweetalert2/package/dist/sweetalert2.min.js"></script>
    <link type="text/css" rel="stylesheet" href="style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>libMyAdmin - Entre com suas credências!</title>
</head>
<body>
    <div class="container">
        <form method="post">
            <div class="input field">
                <input type="text" class="validate" name="cpf" placeholder="CPF" id="cpf" required autocomplete="off" maxlength="14" onkeypress="mascarazinhaCpf()">
            </div>
            <div class="input">
                <input type="password" class="validate" name="password" id="password" placeholder="Senha" required autocomplete="off">
            </div>
            <div class="input">
                <input type="submit" name="submit" value="Entrar">
            </div>
        </form>

            <?php

                                include '../admin/connect.php';

                                if(isset($_POST['submit']))
                                {
                                    $cpf = $_POST['cpf'];
                                    $password = $_POST['password'];

                                    $query = "SELECT * FROM usuario WHERE cpf='$cpf' AND senha='$password';";

                                    $result = $mysqli->query($query);
                                    $row = $result->fetch_row();

                                    if($row != null)
                                    {
                                        if($row[5] == 1)
                                        {
                                            echo "Redirecionando para a página de administração...";
                                            header("Location: ../admin/user_read.php");         
                                            
                                            session_start();
                                            $_SESSION["id"] = $row[0];
                                            $_SESSION["nome"] = $row[1];
                                            $_SESSION["lvlacesso"] = $row[5];
                                        }
                                        if($row[5] == 0)
                                        {
                                            echo '<script type="text/javascript"> 
                                            Swal.fire({
                                                icon: "error",
                                                title: "Erro",
                                                text: "Nivel de acesso insuficiente!"
                                            })
                                            </script>';
                                        }

                                    }
                                    else {
                                        echo '<script type="text/javascript"> 
                                        Swal.fire({
                                            icon: "error",
                                            title: "Erro",
                                            text: "Credenciais incorretas. Por favor verifique-as e tente novamente!"
                                        })
                                        </script>';
                                    }
                                }

            ?>

    </div>
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script> 
    <script type="text/javascript" src="cpf-mask.js"></script>
</body>
</html>