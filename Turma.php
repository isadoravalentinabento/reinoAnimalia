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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turma</title>
</head>
<body>

    <div class="SalaParticipadas">

    <h1>Sala funcionando <?=$id_turma?></h1>

  
</div>
    

<div id="popup" style="color=red">


  <?php
    if($_SESSION['tipo_usuario'] == 0){
    ?>
        <a href="SairTurma.php?id_turma=<?=$id_turma?>">
            <button>Sair da turma</button>
        </a>
    <?php
    }else{
    ?>
        <a href="ExcluirTurma.php?id_turma=<?=$id_turma?>"
        onclick="return confirm('Tem certeza que deseja excluir esta turma?');">
            <button typr="">Excluir turma</button>
        </a>
    <?php
    }
    ?>



    <!--</button type="submit">Cancelar</button>
    <button type="button" onclick="fecharPopup()"></button> -->
</div>
    <br><br>
    ver com a patricia ou com o lucas como fazer uma sala dinamica


    
</body>
</html>