<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="../sweetalert2/package/dist/sweetalert2.min.css">
    <script src="../sweetalert2/package/dist/sweetalert2.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de empréstimo</title>
</head>
<body>
    <?php 
    include 'navbar.php';
    include 'connect.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM livros WHERE id_livro = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $row = $result->fetch_row();

    ?>

    <div class="container">
        <h1>Formulário de empréstimo</h1>
        <form method="post" enctype="multipart/form-data">
        <div>
                <label for="cpf">CPF do Aluno</label>
                <input id="cpf" name="cpf" type="text" class="ls-mask-cpf" autocomplete="off" required onkeypress="mascarazinhaCpf()" maxlength="14">
            </div>
            <div>
                <label for="nome_livro">Nome do livro</label>
                <input id="nome_livro" name="nome_livro" type="text" autocomplete="off" disabled required value="<?php echo $row[1]; ?>">
            </div>
            <div>
                <label for="nome_autor">Nome do autor</label>
                <input id="nome_autor" name="nome_autor" type="text" autocomplete="off" disabled required value="<?php echo $row[3]; ?>">
            </div>
            <div>
                <label for="data_emprestimo">Data do empréstimo</label>
                <input id="data_emprestimo" name="data_emprestimo" type="date" autocomplete="off" required>
            </div>
            <div>
                <label for="data_devolucao">Data da devolução</label>
                <input id="data_devolucao" name="data_devolucao" type="date" autocomplete="off" required>
            </div>
            <div>
                <label for="hora_emprestimo">Hora do empréstimo</label>
                <input id="hora_emprestimo" name="hora_emprestimo" type="time" autocomplete="off" required>
            </div>
            <div>
                <label for="hora_devolucao">Hora da devolução</label>
                <input id="hora_devolucao" name="hora_devolucao" type="time" autocomplete="off" required>
            </div>
            <div>
                <label for="textarea1">Comentários</label>
                <textarea id="textarea1" name="comentarios" class="materialize-textarea" placeholder="Limite de 400 caracteres." maxlength="400"></textarea>
            </div>
            <div class="row">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Selecionar imagem</span>
                        <input type="file" name="imagem" required>
                    </div>
                    <div class="file-path-wrapper">
                        <label for="file-input">Foto do exemplar</label>
                        <input class="file-path validate" name="file-input" id="file-input" type="text" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <button class="btn" style="background-color: #512DA8;" type="submit" name="submit">Enviar</button>
            </div> 
        </form>
        <?php

            if(isset($_POST["submit"]))
            {
                $cpf = $_POST['cpf'];
                $data_emprestimo = $_POST['data_emprestimo'];
                $data_devolucao = $_POST['data_devolucao'];
                $hora_emprestimo = $_POST['hora_emprestimo'];
                $hora_devolucao = $_POST['hora_devolucao'];
                $comentarios = $_POST['comentarios'];
                
                $mysqli->query("UPDATE livros SET status_livro = 'Indisponível' WHERE id_livro = '$id'");
                // adicionar imagem na linha do tempo
                // https://www.php.net/manual/en/features.file-upload.post-method.php
                $imagemURL = "/imagemLivros/".basename($_FILES['imagem']['name']);
                $saveURL = getcwd()."/imagemLivros/".basename($_FILES['imagem']['name']);

                $query = "INSERT INTO imagem VALUES (DEFAULT, ?, ?, ?, ?, ?)";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("issss", $id, $imagemURL, $data_emprestimo, $hora_emprestimo, $comentarios);
                $stmt->execute();

                move_uploaded_file($_FILES['imagem']['tmp_name'], $saveURL);

                $query = "INSERT INTO emprestimo VALUES (DEFAULT, ?, ?, ?, ?, ?, ?, ?, 'Emprestado')";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("sisssss", $cpf, $id, $data_emprestimo, $data_devolucao, $hora_emprestimo, $hora_devolucao, $comentarios);

                if($stmt->execute())
                {
                    echo '<script type="text/javascript">
                    Swal.fire(
                        "Exito",
                        "Livro emprestado com sucesso!",
                        "success"
                    );
                    </script>';
                }
                else
                {
                    echo "Este aluno não existe.";
                }
            }

        ?>
    </div>

<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="../login/cpf-mask.js"></script>
<script type="text/javascript">
    $('#textarea1').val('New Text');
    M.textareaAutoResize($('#textarea1'));
</script>
</body>
</html>