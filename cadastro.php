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
        <input type="name" name="name" id="nome">

        <label for="email">email</label>
        <input type="email" name="email" id="email">

        <br><br>

        <label for="senha">senha</label>
        <input type="password" name="passwod" id="senha">

        <br><br>

        <label for="senha">Confirma senha:</label>
        <input type="password" name="password" id="senha">

        
        
        <button for="cancelar">Cancelar</button>
        <button for="salvar">Salvar</button>
       
    </form>
</body>
</html>