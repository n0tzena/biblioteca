<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livros</title>
</head>
<body>
    <?php include 'navbar.php' ?>

    <div class="container">
        <h1>Cadastro de livros</h1>
        <form method="post">
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
                <input id="paginas" name="paginas" type="text" autocomplete="off" required>
            </div>
            <div>
                <label for="nome_autor">Autor do livro</label>
                <input id="nome_autor" name="nome_autor" type="text" autocomplete="off" required>
            </div>
            <div>
                <label for="textarea1">Comentários</label>
                <textarea id="textarea1" class="materialize-textarea" placeholder="Limite de 400 caracteres." maxlength="400"></textarea>
            </div>
            <div class="row">
                <label for="estado_fisico">Estado físico do livro</label>

                <select id="estado_fisico" name="estado_fisico">
                    <option value="0">Excelente</option>
                    <option value="1">Muito bom</option>
                    <option value="2">Regular</option>
                    <option value="3">Critico</option>
                </select>
            </div>
            <div class="row">
                <label>Disponiblidade</label>
                <p>
                    <label>
                        <input name="disponivel" type="radio" checked />
                        <span>Disponível para empréstimo</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input name="disponivel" type="radio"/>
                        <span>Indisponível para empréstimo</span>
                    </label>
                </p>
            </div>
            <div class="row">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Selecionar imagem</span>
                        <input type="file">
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