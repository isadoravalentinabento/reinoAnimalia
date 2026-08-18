<?php
include 'configinc.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Redefinir Senha</title>

    <link rel="stylesheet" href="css/RedefinirSenha.css?v=1">
</head>

<body>

    <a href="login.html" class="voltar">
        <img src="img/icons/arrow (1).png" alt="Voltar">
    </a>

    <main class="senha-area">

        <div class="senha-box">

            <h1>Redefinir Senha</h1>

            <form action="AtualizarSenha.php" method="POST">

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="senha">Nova Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <label for="confirmar">Confirmar Senha:</label>
                <input type="password" id="confirmar" name="confirmar" required>

                <div class="botoes-senha">

                    <a href="login.html" class="btn-cancelar">
                        Cancelar
                    </a>

                    <button type="submit">
                        Confirmar
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>
</html>