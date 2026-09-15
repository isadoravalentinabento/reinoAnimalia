<?php
include "configinc.php";
include "validar.php";
include "AlunoMenu.php";

$id_aluno = $_SESSION['id_usuario'];

$conexao = new PDO(dsn, usuario, senha);

$sql = "SELECT turma.id_turma, turma.nome_turma, turma.observacao
        FROM aluno_turma
        INNER JOIN turma 
        ON aluno_turma.id_turma = turma.id_turma
        WHERE aluno_turma.id_aluno = :id_aluno";

$comando = $conexao->prepare($sql);
$comando->bindValue(':id_aluno', $id_aluno);
$comando->execute();

$registro = $comando->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Animalia</title>

    <link rel="stylesheet" href="css/AlunoInicio.css">

</head>

<body>

    <main class="pagina-turmas">

        <div class="turmas-container">

            <?php

            if(count($registro) > 0){

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

            }else{

                echo "
                <div class='nenhuma-sala'>

                    <h2>Você não está em nenhuma sala</h2>

                    <a href='PesquisarTurma.php' class='btn-criar-sala'>
                        Pesquisar sala
                    </a>

                </div>
                ";

            }

            ?>

        </div>

    </main>

</body>

</html>