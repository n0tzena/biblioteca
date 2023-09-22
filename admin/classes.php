<?php
    // classe usuario com metodos pra realizar CRUD de forma rapida e uniforme
    class User
    {
        public static function CreateUser($mysqliObject, $nome, $cpf, $tel, $end, $lvlAcesso, $senha)
        {
            $query = "INSERT INTO usuario VALUES (DEFAULT, ?, ?, ?, ?, ?, ?)";
            $stmt = $mysqliObject->prepare($query);
            $stmt->bind_param("ssssis", $nome, $cpf, $tel, $end, $lvlAcesso, $senha);
            $stmt->execute();

            return true;
        }

        // passa os campos da tabela 
        public static function ReadUser($mysqliObject, $search=null, $equals=null)
        {
            $query = "SELECT * FROM usuario";

            if($search != null)
            {
                $query .= " WHERE $search LIKE CONCAT('%', ?, '%')";
                $stmt = $mysqliObject->prepare($query);
                $stmt->bind_param("s", $equals);
                $stmt->execute();
                $result = $stmt->get_result();
                
                // MYSQLI_ASSOC pra associar apenas a matriz associativa
                $rows = $result->fetch_all(MYSQLI_NUM);
            }
            else
            {
                $stmt = $mysqliObject->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                
                $rows = $result->fetch_all(MYSQLI_NUM);
            }

            

            return $rows;
        }

        public static function UpdateUser($mysqliObject, $id, $nome, $cpf, $tel, $end, $lvlAcesso)
        {
            $query = "UPDATE usuario SET nome_usuario = ?, cpf = ?, telefone = ?, endereco = ?, nivel_acesso = ? WHERE id_usuario = ?";
            $stmt = $mysqliObject->prepare($query);
            $stmt->bind_param("ssssii", $nome, $cpf, $tel, $end, $lvlAcesso, $id);
            $stmt->execute();

            return true;
        }

        public static function DeleteUser($mysqliObject, $id)
        {
            $query = "DELETE FROM usuario WHERE id_usuario = $id";
            $stmt = $mysqliObject->prepare($query);
            $stmt->execute();
        }
    }

    class Livro
    {

    }
    
    // cria uma tabela pegando os arrays de uma consulta no banco de dados
    class EasyTable
    {
        // passa os rows do fetch (só exibe uma tabela com <tr> e <td>,
        // ainda é necessário fazer uma tabela no html)
        public static function DisplayTable($rows)
        {
            foreach($rows as $row)
            {
                echo "<tr>";
                foreach($row as $columnName=>$entry)
                {
                    echo "<td>$entry</td>";
                }
                echo "<td><a href='./edituser.php?id=$row[0]'>Editar</a></td>";
                echo "<td><a href='./deleteuser.php?id=$row[0]'>Excluir</a></td>";
                echo "</tr>";
            }
        }
    }
?>