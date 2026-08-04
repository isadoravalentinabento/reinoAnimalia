<?php
include 'configinc.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
</head>
<body>
    <form action="AtualizarSenha.php" method="POST">

        <label for="">E-mail:</label>
        <input type="email" id="email" name="email"  required>

        <br>
        <br>

        <label>Nova Senha:</label>
        <input type="password" id="senha" name="senha"  required>

        <br>
        <br>

        <label for="">Confirmar Senha:</label>
        <input type="password" id="confirmar" name="confirmar"  required>

        <br><br>
        <button type="submit">Confirmar</button>
        <br>
        <a href="login.html">Cancelar</a>
    </form>
</body>
</html>