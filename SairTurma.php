<?php
include 'validar.php';
include 'configinc.php';

if($_SESSION['tipo_usuario'] !=0){
    die("Acesso negado");
}

$id_aluno = $_SESSION['id_usuario'];
$id_turma = $_GET['id_turma'];

$conexao = new PDO(dsn, usuario, senha);
$sql = "DELETE FROM aluno_turma
        WHERE id_aluno = :id_aluno
        AND id_turma = :id_turma";

$comando = $conexao->prepare($sql);
$comando->bindValue(':id_aluno', $id_aluno);
$comando->bindValue(':id_turma', $id_turma);

if($comando->execute()){
    header("Location: AlunoInicio.php");
    exit;
}else{
    echo"Erro ao sair da turma";
}

?>