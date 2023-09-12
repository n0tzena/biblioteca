<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input>
    </form>

    <?php

        include 'connect.php';
        include 'classes.php';
        
        if(!isset($_POST['typeSelection']))
        {

            echo User::ReadUser($mysqli, "nome_usuario", "Victor")[0][0];

        }

    ?>
</body>
</html>