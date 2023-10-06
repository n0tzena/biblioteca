<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Relatório de usuários</title>
</head>
<body>
    <?php include 'navbar.php' ?> 
    <div class="container">
        <h1>Relatório de Usuários</h1>
        <form method="post">
            <label for="search">Pesquisar por:</label>
            <input type="text" id="search" name="pesquisa" autocomplete="off">
            <label for="consultaPor">Consultar por: </label>

            <div class="input-field col s12">
                <select id="consultaPor" name="consultaPor">
                    <option value="" selected disable>Filtro da Consulta</option>
                    <option value="id">ID</option>
                    <option value="nome">Nome</option>
                    <option value="cpf">CPF</option>
                    <option value="telefone">Telefone</option>
                </select>
            </div>
            
            <div class="row">
                <button class="btn red lighten-1" type="submit" name="submit">Pesquisar</button>
            </div>
        </form>
    
        <div class="row">
            <table class="stripped centered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>CPF</td>
                        <td>Telefone</td>
                        <td>Endereço</td>
                        <td>Nível de Acesso</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
        
                        include 'connect.php';
                        include 'classes.php';
                        
                        if(!isset($_POST['submit']))
                        {
                            // na duvida, ve a documentaçao pra classe e metodos estáticos no php
                            $rows = User::ReadUser($mysqli);
                            foreach($rows as $row)
                            {

                                echo "<tr>";
                                foreach($row as $columnIndex=>$entry)
                                {
                                    // se o array for a senha, passa pra proxima iteraçao
                                    if($columnIndex == 6)
                                    {
                                        continue;
                                    }
                                    echo "<td>$entry</td>";
                                }
                                echo "<td><a href='./user_edit.php?id=$row[0]'>Editar</a></td>";
                                echo "<td><a href='./user_delete.php?id=$row[0]'>Excluir</a></td>";
                                echo "</tr>";
                            }
                        }
                        else
                        {
                            $consulta = $_POST["consultaPor"];
                            $equals = $_POST["pesquisa"];
        
                            switch ($consulta)
                            {
                                case "id":
                                    $search = "id_usuario";
                                    break;
                                case "nome":
                                    $search = "nome_usuario";
                                    break;
                                case "cpf":
                                    $search = "cpf";
                                    break;
                                case "telefone":
                                    $search = "telefone";
                                    break;
                                default:
                                    $search = "nome_usuario";
                            }
                            
        
                            $rows = User::ReadUser($mysqli, $search, $equals);
                            foreach($rows as $row)
                            {

                                echo "<tr>";
                                foreach($row as $columnIndex=>$entry)
                                {
                                    // se o array for a senha, passa pra proxima iteraçao
                                    if($columnIndex == 6)
                                    {
                                        continue;
                                    }
                                    echo "<td>$entry</td>";
                                }
                                echo "<td><a href='./user_edit.php?id=$row[0]'>Editar</a></td>";
                                echo "<td><a href='./user_delete.php?id=$row[0]'>Excluir</a></td>";
                                echo "</tr>";
                            }
                        }
        
                    ?>  
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sel = document.querySelectorAll('select');
            M.FormSelect.init(sel)});
    </script>
</body>
</html>