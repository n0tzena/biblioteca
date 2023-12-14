<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/lib (1).png" type="image/gif">
    <title>libMyAdmin - Relatório de Usuários</title>
</head>
<body>
    <?php include 'navbar.php' ?> 
    <div class="container">
        <h1>Relatório de usuários</h1>
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
                <button class="btn" style="background-color: #512DA8;" type="submit" name="submit">Pesquisar</button>
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
                                    if($columnIndex == 2)
                                    {
                                        $censorcpf = str_split($row[2]);
                                        echo "<td onpointerover='seeInfoCPF(this)' onpointerout='hideInfoCPF(this)' data-cpf-censor='$censorcpf[0]$censorcpf[1]$censorcpf[2].***.***-**' data-cpf='$row[2]'>$censorcpf[0]$censorcpf[1]$censorcpf[2].***.***-**";
                                    }
                                    else if ($columnIndex == 3)
                                    {
                                        $censortel = str_split($row[3]);
                                        echo "<td onpointerover='seeInfoTel(this)' onpointerout='hideInfoTel(this)' data-tel-censor='$censortel[0]$censortel[1]$censortel[2]$censortel[3]$censortel[4]$censortel[5]$censortel[6]**-****' data-tel='$row[3]'>$censortel[0]$censortel[1]$censortel[2]$censortel[3]$censortel[4]$censortel[5]$censortel[6]**-****</td>";
                                    }
                                    else if ($columnIndex == 4)
                                    {
                                        echo "<td onpointerover='seeInfoEnd(this)' onpointerout='hideInfoEnd(this)' data-end-censor='Rua' data-end='$row[4]'>Rua</td>";
                                    }
                                    else echo "<td>$entry</td>";
                                }
                                echo "<td><a href='./user_edit.php?id=$row[0]'>Editar</a></td>";
                                echo "<td><a href='./user_delete.php?id=$row[0]' onclick='return confirm(\"Deseja excluir o usuário?\")'>Excluir</a></td>";
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
                                    if($columnIndex == 2)
                                    {
                                        $censorcpf = str_split($row[2]);
                                        echo "<td onpointerover='seeInfoCPF(this)' onpointerout='hideInfoCPF(this)' data-cpf-censor='$censorcpf[0]$censorcpf[1]$censorcpf[2].***.***-**' data-cpf='$row[2]'>$censorcpf[0]$censorcpf[1]$censorcpf[2].***.***-**";
                                    }
                                    else if ($columnIndex == 3)
                                    {
                                        $censortel = str_split($row[3]);
                                        echo "<td onpointerover='seeInfoTel(this)' onpointerout='hideInfoTel(this)' data-tel-censor='$censortel[0]$censortel[1]$censortel[2]$censortel[3]$censortel[4]$censortel[5]$censortel[6]**-****' data-tel='$row[3]'>$censortel[0]$censortel[1]$censortel[2]$censortel[3]$censortel[4]$censortel[5]$censortel[6]**-****</td>";
                                    }
                                    else if ($columnIndex == 3)
                                    {
                                        $censortel = str_split($row[2]);
                                        echo "<td onpointerover='seeInfoEnd(this)' onpointerout='hideInfoEnd(this)' data-end-censor='Rua' data-end='$row[3]'>Rua</td>";
                                    }
                                    else echo "<td>$entry</td>";
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

        var Teste;
        function seeInfoCPF(obj)
        {
            obj.innerHTML = obj.dataset.cpf;
        }
        function hideInfoCPF(obj)
        {
            obj.innerHTML = obj.dataset.cpfCensor;
        }
        function seeInfoTel(obj)
        {
            obj.innerHTML = obj.dataset.tel;
        }
        function hideInfoTel(obj)
        {
            obj.innerHTML = obj.dataset.telCensor;
        }
        function seeInfoEnd(obj)
        {
            obj.innerHTML = obj.dataset.end;
        }
        function hideInfoEnd(obj)
        {
            obj.innerHTML = obj.dataset.endCensor;
        }
    </script>
</body>
</html>