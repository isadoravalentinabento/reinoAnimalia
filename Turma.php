<?php

include "validar.php";

$id_turma = $_GET['id']; // PRIMEIRO

if($_SESSION['tipo_usuario'] == 1){
    include "ProfMenu.php";
}else{
    include "AlunoMenu.php";
}

include "TurmaMenu.php"; // DEPOIS

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