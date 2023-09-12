<?php
    // classe usuario com metodos pra realizar CRUD de forma rapida e uniforme
    class User
    {
        public static function CreateUser()
        {

        }

        // passa os campos da tabela 
        public static function ReadUser($mysqliObject, $search=null, $equals=null)
        {
            $query = "SELECT * FROM usuario";

            if($search != null)
            {
                $query .= " WHERE ? = ?";
                $stmt = $mysqliObject->prepare($query);
                $stmt->bind_param("ss", $search, $equals);
                $stmt->execute();
                $result = $stmt->get_result();
                
                $rows = $result->fetch_all(MYSQLI_BOTH);
            }
            else
            {
                $stmt = $mysqliObject->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                
                $rows = $result->fetch_all(MYSQLI_BOTH);
            }

            

            return $rows;
        }
    }

    class Livro
    {

    }
    
    // cria uma tabela pegando os arrays de uma consulta no banco de dados
    class EasyTable
    {

    }
?>