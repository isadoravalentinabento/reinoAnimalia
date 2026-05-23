<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form action="create.php" method="post">

        <H1>Cadastro</H1>

        <label for="nome">Nome:</label>
        <input type="name" name="nome" id="nome">

        <br><br>

        <label for="email">email</label>
        <input type="email" name="email" id="email">

        <br><br>

        <label for="senha">senha</label>
        <input type="password" name="senha" id="senha" required>

        <br><br>

        <label for="confirmar_senha">Confirma senha:</label>
        <input type="password" name="confirmar_senha" id="confirma_senha" required>

        <br><br>

        <label for="tipo_usuario">Cadastrar Como:</label>
        <br>
        <select name="tipo_usuario">
            <option value="0">Estudante</option>
            <option value="1">Professor</option>
        </select>
            
        <br><br>
        <button for="cancelar">Cancelar</button>
        <button for="salvar">Salvar</button>
       
    </form>

    <?php
?>
</body>
</html>