<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../sweetalert2/package/dist/sweetalert2.min.css">
    <script src="../sweetalert2/package/dist/sweetalert2.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/lib (1).png" type="image/gif">
    <title>libMyAdmin - Cadastro de livros</title>
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

                <select id="categoria" name="categoria">
                    <option value="Ação">Ação</option>
                    <option value="Autobiografia">Autobiografia</option>
                    <option value="Programacao">Programação</option>
                    <option value="Drama">Drama</option>
                    <option value="Romance">Romance</option>
                    <option value="Poesia">Poesia</option>
                    <option value="Literatura Infantil">Literatura Infantil</option>
                    <option value="Ficção Científica">Ficção Científica</option>
                    <option value="História em Quadrinhos (HQ)">História em Quadrinhos (HQ)</option>
                    <option value="Mangá">Mangá</option>
                </select>
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
            <div>
                <label for="numLivros">Quantidade de livros para adicionar</label>
                <input type="number" name="numLivros" id="numLivros" value="1" min="1" required>
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
                        <input type="file" style="background-color: #512DA8;" name="imagem" required>
                    </div>
                    <div class="file-path-wrapper">
                        <label for="file-input">Capa do livro</label>
                        <input class="file-path validate" name="file-input" id="file-input" type="text" required>
                    </div>
                </div>
            </div> 
            <div class="row">
                    <button class="btn" style="background-color: #512DA8;" type="submit" name="submit">Enviar
                        <i class="material-icons right">send</i>
                    </button>
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
            $numLivros = $_POST['numLivros'];

            if($numLivros < 1) $numLivros = 1;

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
            
            for($i = 1; $i <= $numLivros; $i++)
            {
                $query = "INSERT INTO livros VALUES (DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("sssissss", $titulo, $disponibilidade, $autor, $paginas, $categoria, $estado, $imagemURL, $comentarios);
                $stmt->execute();
            }

            // https://www.php.net/manual/pt_BR/mysqli.insert-id.php
            //$id_livro = $mysqli->insert_id;
        }

    ?>
    </div>

<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="../login/cpf-mask.js"></script>
<script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var sel = document.querySelectorAll('#estado_fisico');
            M.FormSelect.init(sel)});
        document.addEventListener('DOMContentLoaded', function() {
            var sel = document.querySelectorAll('#categoria');
            M.FormSelect.init(sel)});
</script>
</body>
</html>