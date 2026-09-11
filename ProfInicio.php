<?php
include "validar.php";
include "configinc.php";

$id_professor = $_SESSION['id_usuario'];

$conexao = new PDO(dsn, usuario, senha);

$sql = "SELECT turma.id_turma, turma.nome_turma, turma.observacao
        FROM turma 
        WHERE turma.id_professor = :id_professor";

$comando = $conexao->prepare($sql);
$comando->bindValue('id_professor', $id_professor);
$comando->execute();

$registro = $comando->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Animalia</title>

    <link rel="stylesheet" href="css/ProfInicio.css?v=1">
</head>

<body>

    <?php include "ProfMenu.php"; ?>


    <main class="pagina-turmas">

        <div class="turmas-container">

    <?php

    if (count($registro) == 0) {

        echo "

        <div class='nenhuma-sala'>

            <h2>Nenhuma sala criada ainda</h2>

            <a href='ProfCTurma.php' class='btn-criar-sala'>
                Criar Sala
            </a>

        </div>

        ";

    } else {

        foreach($registro as $turma){

            echo "

            <a href='Turma.php?id=".$turma['id_turma']."' class='turma-link'>

                <div class='turma-card'>

                    <h2>".$turma['nome_turma']."</h2>

                    <p>".$turma['observacao']."</p>

                </div>

            </a>

            ";

        }

    }

    ?>
</div>

    </main>

</body>

</html>