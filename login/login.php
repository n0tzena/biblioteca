<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Entre com suas credências!</title>
</head>
<body>
    <div class="row">
        <div class="col s6 offset-s3" class="flow-text"> 
            <div class="container">
                <div class="card-panel">
                    <h4 class="center-align">Login</h4>
                    <h6 class="center-align">Valide suas informações!</h6>
                    
                    <div class="row">
                        <form class="col s12" method="post">
                                <div class="input-field col s12">
                                    <input id="email" type="text" class="validate" name="cpf" required autocomplete="off">
                                    <label for="email">CPF</label>
                                </div> 
                                <div class="input-field col s12">
                                    <input id="password" type="password" class="validate" name="password" required autocomplete="off">
                                    <label for="password">Senha</label>
                                    <div class="row right-align">
                                        <a href="esqueci.php">Esqueceu sua senha?</a>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <button class="btn waves-effect waves-light blue darken-3 col s12 btn-large" type="submit" name="submit">Enviar</button>
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
                                    session_start();
                                    $_SESSION["id"] = $row[0];
                                    $_SESSION["nome"] = $row[1];
                                    $_SESSION["lvlacesso"] = $row[5];

                                    if($row[5] == 1)
                                    {
                                        echo "Redirecionando para a página de administração...";
                                        header("Location: ../admin/user.php");                    
                                    }
                                    if($row[5] == 0)
                                    {
                                        echo "Nível de acesso insuficiente.";
                                    }

                                }
                                else {
                                    echo "Dados inválidos.";
                                }
                            }



                            ?>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
</body>
</html>