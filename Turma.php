<?php
include "validar.php";

/* Ketlin fazer uma função paara tipo usaurio ver o tipo de menu do seu tipo */
include "AlunoMenu.php";
include "ProfMenu.php";


include "TurmaMenu.php";
 
$id_turma = $_GET ['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turma</title>
</head>
<body>
    <h1> sala funcionando <?=$id_turma?> </h1>
    <br><br>
    ver com a patricia ou com o lucas como fazer uma sala dinamica
</body>
</html>