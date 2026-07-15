<?php
include "validar.php";
include "configinc.php";

if($_SESSION['tipo_usuario'] != 1){
    die("Acesso negado!");
}

$id_turma = $_GET['id_turma'];

$conexao = new PDO(dsn, usuario, senha);

$sql = "DELETE FROM aluno_turma
        WHERE id_turma = :id_turma";

$comando = $conexao->prepare($sql);
$comando->bindValue(':id_turma', $id_turma);
$comando->execute();


$sql = "DELETE FROM turma
        WHERE id_turma = :id_turma";

$comando = $conexao->prepare($sql);
$comando->bindValue(':id_turma', $id_turma);

if($comando->execute()){
    header("Location: ProfInicio.php");
    exit;
}else{
    echo "Erro ao excluir a turma.";
}
?>