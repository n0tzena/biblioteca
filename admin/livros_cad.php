<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../sweetalert2/package/dist/sweetalert2.min.css">
    <script src="../sweetalert2/package/dist/sweetalert2.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livros</title>
</head>
<body>
    <?php include 'navbar.php' ?>

    <div class="container">
        <h1>Cadastro de livros</h1>
        <form method="post" enctype="multipart/form-data">
            <div>
                <label for="titulo_livro">Título do livro</label>
                <input id="titulo_livro" name="titulo_livro" type="text" autocomplete="off" required>
            </div>
            <div>
                <label for="categoria">Categoria do livro</label>
                <input id="categoria" name="categoria" type="text" autocomplete="off" required>
            </div>
            <div>
                <label for="paginas">Número de páginas</label>
                <input id="paginas" name="paginas" type="number" autocomplete="off" required>
            </div>
            <div>
                <label for="nome_autor">Autor do livro</label>
                <input id="nome_autor" name="nome_autor" type="text" autocomplete="off" required>
            </div>
            <div>
                <label for="textarea1">Comentários</label>
                <textarea id="textarea1" name="comentarios" class="materialize-textarea" placeholder="Limite de 400 caracteres." maxlength="400"></textarea>
            </div>
            <div class="row">
                <label for="estado_fisico">Estado físico do livro</label>

                <select id="estado_fisico" name="estado_fisico">
                    <option value="Excelente">Excelente</option>
                    <option value="Muito Bom">Muito bom</option>
                    <option value="Regular">Regular</option>
                    <option value="Crítico">Critico</option>
                </select>
            </div>
            <div class="row">
                <label>Disponiblidade</label>
                <p>
                    <label>
                        <input name="disponivel" value="Disponível" type="radio" checked />
                        <span>Disponível para empréstimo</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input name="disponivel" value="Indisponível" type="radio"/>
                        <span>Indisponível para empréstimo</span>
                    </label>
                </p>
            </div>
            <div class="row">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Selecionar imagem</span>
                        <input type="file" name="imagem">
                    </div>
                    <div class="file-path-wrapper">
                        <label for="file-input">Foto do exemplar</label>
                        <input class="file-path validate" name="file-input" id="file-input" type="text">
                    </div>
                </div>
                
                <div class="row">
                    <button class="btn red lighten-1" type="submit" name="submit">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </div> 
            </div> 
        </form>
    <?php
        include "./connect.php";

        if(isset($_POST["submit"]))
        {
            $titulo = $_POST['titulo_livro'];
            $categoria = $_POST['categoria'];
            $paginas = $_POST['paginas'];
            $autor = $_POST['nome_autor'];
            $comentarios = $_POST['comentarios'];
            $disponibilidade = $_POST['disponivel'];
            $estado = $_POST['estado_fisico'];

            // https://www.php.net/manual/en/features.file-upload.post-method.php
            $imagemURL = "/imagemLivros/".basename($_FILES['imagem']['name']);
            $saveURL = getcwd()."/imagemLivros/".basename($_FILES['imagem']['name']);
            if(move_uploaded_file($_FILES['imagem']['tmp_name'], $saveURL))
            {
                echo '<script type="text/javascript">
                Swal.fire(
                    "Exito",
                    "Livro cadastrado com sucesso!",
                    "success"
                );
                </script>';
            }
            

            $query = "INSERT INTO livros VALUES (DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ssssisss", $titulo, $disponibilidade, $autor, $categoria, $paginas, $estado, $imagemURL, $comentarios);
            $stmt->execute();

        }

    ?>
    </div>

<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="../login/cpf-mask.js"></script>
<script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var sel = document.querySelectorAll('#estado_fisico');
            M.FormSelect.init(sel)});
</script>
</body>
</html>