<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>libMyAdmin - Relatório de Livros</title>
</head>
<body>
    <?php include 'navbar.php' ?> 
    <div class="container">
        <h1>Relatório de Livros</h1>
        <form method="post">
            <label for="search">Pesquisar por:</label>
            <input type="text" id="search" name="pesquisa" autocomplete="off">
            <label for="consultaPor">Consultar por: </label>

            <div class="input-field col s12">
                <select id="consultaPor" name="consultaPor">
                    <option value="" selected disable>Filtro da Consulta</option>
                    <option value="id">ID</option>
                    <option value="titulo">Título</option>
                    <option value="autor">Autor</option>
                    <option value="categoria">Categoria</option>
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
                        <td>Título</td>
                        <td>Disponiblidade</td>
                        <td>Autor</td>
                        <td>Páginas</td>
                        <td>Categoria</td>
                        <td>Estado</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
        
                        include 'connect.php';
                        include 'classes.php';
                        
                        if(!isset($_POST['submit']))
                        {
                            // na duvida, ve a documentaçao pra classe e metodos estáticos no php
                            $query = "SELECT * FROM livros";
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
                                    $search = "titulo";
                                    break;
                                case "autor":
                                    $search = "autor";
                                    break;
                                case "categoria":
                                    $search = "categoria";
                                    break;
                                default:
                                    $search = "titulo";
                            }
                            
        
                            $query = "SELECT * FROM livros";

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
                                // se o array for a imagem ou os comentarios 
                                if($columnIndex == 7 || $columnIndex == 8)
                                {
                                    continue;
                                }
                                echo "<td>$entry</td>";
                            }
                            echo "<td><a href='./livros_insp.php?id=$row[0]'>Inspecionar</a></td>";
                            //echo "<td><a href='./livros_edit.php?id=$row[0]'>Editar</a></td>";
                            echo "<td><a href='./livros_delete.php?id=$row[0]' onclick='return confirm(\"Deseja deletar o livro?\")'>Excluir</a></td>";
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