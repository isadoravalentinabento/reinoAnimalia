<?php
include "validar.php";
include "configinc.php";

if($_SESSION['tipo_usuario'] != 1){
    die("acesso negado bicho");
}
$id_aluno = $_GET ['id_aluno'];
$id_turma = $_GET ['id_turma'];

$conexao = new pdo(dsn, usuario, senha);

$sql = "DELETE FROM aluno_turma
        WHERE id_aluno = :id_aluno
        AND id_turma =:id_turma";

$comando = $conexao->prepare($sql);
$comando->bindValue(':id_aluno', $id_aluno);
$comando->bindValue(':id_turma', $id_turma);

if($comando->execute()){
    header("Location: Participantes.php?id=".$id_turma);
    exit;
}else{
    echo"Erro ao expulsar o aluno";
}
?>