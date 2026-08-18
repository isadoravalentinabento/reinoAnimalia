<?php
include "configinc.php";
include "validar.php";

$id_turma = $_GET['id'];

include "MenuArvore.php";

$conexao = new PDO(dsn,usuario,senha);
$sql = "SELECT nome_turma
        FROM turma
        WHERE id_turma  = :id_turma";

$comando = $conexao->prepare($sql);
$comando->bindValue('id_turma', $id_turma);
$comando->execute();
$turma = $comando->fetch();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>árvore</title>
    <link rel="stylesheet" href="css/SalaArvore.css?=2">
</head>

<body>
    <h1>Árvore Filogenética</h1>
    <h1><?=$turma['nome_turma']?></h1>
    
    <div class="sala">

    <img src="img/arvorefilogenetica.png"
         usemap="#image-map"
         class="arvore">

    <map name="image-map">

        <area
            alt="Nematelmintos"
            title="Nematelmintos"
            href="Filo01.php?id=<?=$id_turma?>"
            coords="96,62,94,68,101,74,108,74,114,76,121,78,129,78,136,79,143,79,149,81,156,80,163,79,169,79,175,80,183,81,190,81,197,80,203,79,210,77,219,77,226,78,231,83,239,82,250,83,259,82,263,78,273,79,284,79,295,77,298,64,287,57"
            shape="poly">

    </map>

</div>
<br><br>

<a href="Turma.php?id=<?=$id_turma?>">
    <button>← Voltar para a turma</button>

    
</a>
</body>
</html>