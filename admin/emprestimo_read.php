<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Relatório de Empréstimos</title>
</head>
<body>
    <?php include 'navbar.php' ?> 
    <div class="container">
        <h1>Relatório de Empréstimos</h1>
        <form method="post">
            <label for="search">Pesquisar por:</label>
            <input type="text" id="search" name="pesquisa" autocomplete="off">
            <label for="consultaPor">Consultar por: </label>

            <div class="input-field col s12">
                <select id="consultaPor" name="consultaPor">
                    <option value="" selected disable>Filtro da Consulta</option>
                    <option value="cpf">CPF do Aluno</option>
                    <option value="id_livro">ID do Livro</option>
                </select>
            </div>
            
            <div class="row">
                <button class="btn pink darken-4" type="submit" name="submit">Pesquisar</button>
            </div>
        </form>
    
        <div class="row">
            <table class="stripped centered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>CPF do Aluno</td>
                        <td>ID Livro</td>
                        <td>Data do Empréstimo</td>
                        <td>Data da Devolução</td>
                        <td>Hora do Empréstimo</td>
                        <td>Hora da Devolução</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
        
                        include 'connect.php';
                        include 'classes.php';
                        
                        if(!isset($_POST['submit']))
                        {
                            // na duvida, ve a documentaçao pra classe e metodos estáticos no php
                            $query = "SELECT * FROM emprestimo";
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
                                case "id":
                                    $search = "id_livro";
                                    break;
                                case "titulo":
                                    $search = "id_cpf_aluno";
                                    break;
                                default:
                                    $search = "titulo";
                            }
                            
        
                            $query = "SELECT * FROM emprestimo";

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
                                if($columnIndex == 7 || $columnIndex == 8)
                                {
                                    continue;
                                }
                                echo "<td>$entry</td>";
                            }
                            echo "<td><a href='./livros_insp.php?id=$row[2]'>Inspecionar Livro</a></td>";
                            //echo "<td><a href='./livros_edit.php?id=$row[0]'>Editar</a></td>";
                            //echo "<td><a href='./livros_delete.php?id=$row[0]'>Excluir</a></td>";
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