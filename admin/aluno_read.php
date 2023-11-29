<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Relatório de Alunos</title>
</head>
<body>
    <?php include 'navbar.php' ?> 
    <div class="container">
        <h1>Relatório de Alunos</h1>
        <form method="post">
            <label for="search">Pesquisar por:</label>
            <input type="text" id="search" name="pesquisa" autocomplete="off">
            <label for="consultaPor">Consultar por: </label>

            <div class="input-field col s12">
                <select id="consultaPor" name="consultaPor">
                    <option value="" selected disable>Filtro da Consulta</option>
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
                        <td>Nome</td>
                        <td>CPF</td>
                        <td>Telefone</td>
                        <td>Endereço</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
        
                        include 'connect.php';
                        include 'classes.php';
                        
                        if(!isset($_POST['submit']))
                        {
                            // na duvida, ve a documentaçao pra classe e metodos estáticos no php
                            $query = "SELECT * FROM aluno";
                            $stmt = $mysqli->prepare($query);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            $rows = $result->fetch_all(MYSQLI_NUM);
                        }
                        else
                        {
                            $consulta = $_POST["consultaPor"];
                            $equals = $_POST["pesquisa"];
        
                            switch ($consulta)
                            {
                                case "nome":
                                    $search = "nome";
                                    break;
                                case "cpf":
                                    $search = "cpf";
                                    break;
                                case "telefone":
                                    $search = "telefone";
                                    break;
                                default:
                                    $search = "nome";
                            }

                            $query = "SELECT * FROM aluno";

                            if($search != null)
                            {
                                $query .= " WHERE $search LIKE CONCAT('%', ?, '%')";
                                $stmt = $mysqli->prepare($query);
                                $stmt->bind_param("s", $equals);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                
                                // MYSQLI_ASSOC pra associar apenas a matriz associativa
                                $rows = $result->fetch_all(MYSQLI_NUM);
                            }
                            else
                            {
                                $stmt = $mysqli->prepare($query);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                
                                $rows = $result->fetch_all(MYSQLI_NUM);
                            }
                            }
                            foreach($rows as $row)
                            {

                                echo "<tr>";
                                foreach($row as $columnIndex=>$entry)
                                {
                                    echo "<td>$entry</td>";
                                }
                            //  echo "<td><a href='./livros_edit.php?id=$row[0]'>Editar</a></td>";
                                echo "<td><a href='./aluno_delete.php?cpf=$row[1]'>Excluir</a></td>";
                                echo "</tr>";
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