<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Empréstimo</title>
</head>
<body>
    <?php include 'navbar.php' ?>

    <div class="container">
        <h1>Empréstimo</h1>
        <form method="post">
            <div>
                <label for="nome_aluno">Nome do aluno</label>
                <input id="nome_aluno" name="nome_aluno" type="text" autocomplete="off" required>
            </div>
            <div>
                <label for="nome_livro">Nome do livro</label>
                <input id="nome_livro" name="nome_livro" type="text" autocomplete="off" required>
            </div>
            <div>
                <label for="nome_autor">Nome do autor</label>
                <input id="nome_autor" name="nome_autor" type="text" autocomplete="off" required>
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
                <label for="cpf">CPF</label>
                <input id="cpf" name="cpf" type="text" class="ls-mask-cpf" autocomplete="off" required onkeypress="mascarazinhaCpf()" maxlength="14">
            </div>
            <div>
                <label for="telefone">Telefone</label>
                <input id="telefone" name="telefone" type="text" autocomplete="off" required onkeypress="mascarazinhaTelefone()" maxlength="14"> 
            </div>
            <div>
                <label for="endereco">Endereço</label>
                <input id="endereco" name="endereco" type="text" autocomplete="off" required>
            </div>
            <div>
                <label for="textarea1">Comentários</label>
                <textarea id="textarea1" class="materialize-textarea" placeholder="Limite de 400 caracteres." maxlength="400"></textarea>
            </div>
            <div class="row">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
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
    $('#textarea1').val('New Text');
    M.textareaAutoResize($('#textarea1'));
</script>
</body>
</html>