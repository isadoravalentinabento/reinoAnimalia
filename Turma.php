<?php

include "validar.php";

$id_turma = $_GET['id']; 

if($_SESSION['tipo_usuario'] == 1){
    include "ProfMenu.php";
}else{
    include "AlunoMenu.php";
}

include "TurmaMenu.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turma</title>
</head>
<body>

    <div class="SalaParticipadas">

    <h1>Sala funcionando <?=$id_turma?></h1>

    <?php
    if($_SESSION['tipo_usuario'] == 0){
    ?>
        <a href="SairTurma.php?id_turma=<?=$id_turma?>">
            <button>Sair da turma</button>
        </a>
    <?php
    }else{
    ?>
        <a href="ExcluirTurma.php?id_turma=<?=$id_turma?>">
            <button>Excluir turma</button>
        </a>
    <?php
    }
    ?>
</div>
    
    <br><br>
    ver com a patricia ou com o lucas como fazer uma sala dinamica


    
</body>
</html>