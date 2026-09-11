<?php
include "validar.php";
include "configinc.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Criar Turma</title>

    <link rel="stylesheet" href="css/header01.css?v=5">

    
    <link rel="stylesheet" href="css/ProfCTurma.css?v=3">
</head>

<body>

    <?php include "ProfMenu.php"; ?>


    <main class="pagina-criar">

        <form action="CreateCad.php" method="post" class="form-criar">

            <h1>Criar Sala</h1>


            <label for="nome_turma">Nome da sala:</label>

            <input 
                type="text" 
                name="nome_turma" 
                id="nome_turma"
                placeholder="Digite o nome da sala"
                required
            >


            <label for="codigo_turma">Código da sala:</label>

            <input 
                type="text" 
                name="codigo_turma" 
                id="codigo_turma"
                placeholder="Crie um código para a sala..."
                required
            >


            <label for="observacao">Observações:</label>

            <input 
                type="text" 
                id="observacao" 
                name="observacao"
                placeholder="Digite uma observação..."
            >


            <div class="botoes">

                <a href="ProfInicio.php" class="btn-cancelar">
                    Cancelar
                </a>

                <button type="submit">
                    Criar Sala
                </button>

            </div>

        </form>

    </main>

</body>
</html>