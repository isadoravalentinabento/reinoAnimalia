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
    <link rel="stylesheet" href="css/SalaArvore.css?v=6">
</head>

<body>
   <div class="sala">

<img src="img/FundoArvore.png" usemap="#image-map" class="arvore" id="arvore" alt="Árvore Filogenética">

<map name="image-map">
    <area shape="rect" coords="682,24,1027,97" href="Filo08.php?id=<?=$id_turma?>" title="Equinodermos" alt="Equinodermos">
    <area shape="rect" coords="671,161,901,225" href="Filo07.php?id=<?=$id_turma?>" title="Molusco" alt="Molusco">
    <area shape="rect" coords="774,290,1050,345" href="Filo06.php?id=<?=$id_turma?>" title="Artropodes" alt="Artropodes">
    <area shape="rect" coords="729,407,968,470" href="Filo05.php?id=<?=$id_turma?>" title="Anelideos" alt="Anelideos">
    <area shape="rect" coords="626,536,977,606" href="Filo04.php?id=<?=$id_turma?>" title="Nematelmintos" alt="Nematelmintos">
    <area shape="rect" coords="768,658,1059,732" href="Filo03.php?id=<?=$id_turma?>" title="Platelmintos" alt="Platelmintos">
    <area shape="rect" coords="1116,778,1349,853" href="Filo02.php?id=<?=$id_turma?>" title="Cnidarios" alt="Cnidarios">
    <area shape="rect" coords="1119,907,1346,989" href="Filo01.php?id=<?=$id_turma?>" title="Poriferos" alt="Poriferos">
</map>

</div>
<br><br>

<script src="js/mapArvore.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/image-map-resizer/1.0.10/js/imageMapResizer.min.js"></script>

</body>
</html>
