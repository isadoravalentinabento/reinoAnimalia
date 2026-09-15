<?php
include "configinc.php";
include "validar.php";

$id_turma = $_GET['id']; 

if($_SESSION['tipo_usuario'] == 1){
    include "ProfMenu.php";
}else{
    include "AlunoMenu.php";
}

include "TurmaMenu.php";

$conexao = new PDO(dsn, usuario, senha);

$sql = "SELECT nome_turma, codigo_turma, id_turma
        FROM turma
        WHERE id_turma = :id_turma";

$comando = $conexao->prepare($sql);
$comando->bindValue(':id_turma', $id_turma);
$comando->execute();

$turma = $comando->fetch();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Turma</title>

    <link rel="stylesheet" href="css/Turma.css">

</head>

<body>
    <div class="imagem-arvore">

        <a href="SalaArvore.php?id=<?=$id_turma?>">

            <img src="img/arvore.png"
                 alt="Árvore Filogenética"
                 width="500">
        </a>
    </div>
    <?php if($_SESSION['tipo_usuario'] == 1){ ?>

        <div class="id-turma">

            <p>
                ID da sala:
                <span id="IdTurma">••••</span>
            </p>

            <span onclick="mostrarInformacoes()" class="olho">

                <img id="olho"
                     src="img/icons/hide (1).png"
                     width="30">

            </span>

        </div>

    <?php } ?>


    <!-- Botões -->

    <div class="botoes-turma">

    <?php

    if($_SESSION['tipo_usuario'] == 0){

    ?>

        <a href="SairTurma.php?id_turma=<?=$id_turma?>">

            <button class="btn-sair">
                Sair da turma
            </button>

        </a>

    <?php

    }else{

    ?>

        <a href="ExcluirTurma.php?id_turma=<?=$id_turma?>"
           onclick="return confirm('Tem certeza que deseja excluir esta turma?');">

            <button class="btn-excluir">
                Excluir turma
            </button>

        </a>

    <?php

    }

    ?>

    </div>


<script>
let mostrando = false;
function mostrarInformacoes(){
    if(mostrando){
        document.getElementById("IdTurma").innerHTML = "••••";
        document.getElementById("olho").src = "img/icons/hide (1).png";
        mostrando = false;
    }else{
        document.getElementById("IdTurma").innerHTML = "<?=$turma['id_turma']?>";
        document.getElementById("olho").src = "img/icons/view.png";
        mostrando = true;
    }
}

</script>

</body>

</html>