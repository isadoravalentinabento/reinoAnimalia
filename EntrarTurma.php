<?php

include "validar.php";
include "configinc.php";

$id_turma = $_POST ['id_turma'];
$codigo = $_POST ['codigo'];

$conexao = new PDO(dsn, usuario, senha);

$sql = "SELECT * FROM turma
       WHERE id_turma = :id_turma
       AND codigo_turma = :codigo_turma";

$comando -> $conexao->prepare($sql);
$comando ->bindValue(':id_turma', $id_turma);
$comando ->bindValue(':codigo_turma', $codigo_turma);
$comando -> execute();

$registro = $comando->fetch();

if($registro){
    echo"Cod certinho";
}else{
    echo "cod invalido";
}
?>