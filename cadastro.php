<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro</title>

    <link rel="stylesheet" href="css/cadastro.css?v=3">
</head>

<body>
<a href="index.php" class="voltar">
    <img src="img/icons/arrow (1).png" alt="Voltar">
</a>

    <main class="cadastro-area">

        <div class="cadastro-box">

            <h1>Cadastro</h1>

            <form action="create.php" method="post">

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required>

                <label for="confirmar_senha">Confirma senha:</label>
                <input type="password" name="confirmar_senha" id="confirma_senha" required>

                <label for="tipo_usuario">Cadastrar Como:</label>

                <select name="tipo_usuario" id="tipo_usuario">
                    <option value="0">Estudante</option>
                    <option value="1">Professor</option>
                </select>

                <div class="botoes-cadastro">
                    <a href="index.php" class="btn-cancelar">Cancelar</a>
                    <button type="submit">Salvar</button>
                </div>

            </form>

        </div>

    </main>

</body>
</html>