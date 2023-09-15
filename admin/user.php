<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Relatório</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="./createuser.php">Criar Usuário</a></li>
            <li><a href="./user.php">Relatório de Usuários</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Relatório de Usuários</h1>
        <form method="post">
            <label for="search">Pesquisar por:</label>
            <input type="text" id="search" name="pesquisa">
            <label for="consultaPor">Consultar por: </label>
            <select id="consultaPor" name="consultaPor">
                <option value="id">ID</option>
                <option selected value="nome">Nome</option>
                <option value="cpf">CPF</option>
                <option value="telefone">Telefone</option>
            </select>
            <input type="submit" name="submit" value="Pesquisar">
        </form>
    
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>CPF</td>
                    <td>Telefone</td>
                    <td>Endereço</td>
                    <td>Nível de Acesso</td>
                    <td>Editar</td>
                    <td>Excluir</td>
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
                        EasyTable::DisplayTable($rows);
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
                        EasyTable::DisplayTable($rows);
                    }
    
                ?>  
            </tbody>
        </table>
    </div>
</body>
</html>