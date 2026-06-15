<?php

include "validar.php";
include "configinc.php";

$id_aluno = $_SESSION['id_usuario'];

$id_turma = $_POST ['id_turma'];
$codigo = $_POST ['codigo'];

$conexao = new PDO(dsn, usuario, senha);

$sql = "SELECT * FROM aluno_turma
        WHERE id_aluno = :id_aluno
        AND id_turma = :id_turma";

$comando = $conexao->prepare($sql);

$comando->bindValue(':id_aluno', $id_aluno);
$comando->bindValue(':id_turma', $id_turma);

$comando->execute();

$registro_aluno = $comando->fetch();


$sql = "SELECT * FROM turma
       WHERE id_turma = :id_turma
       AND codigo_turma = :codigo_turma";

$comando = $conexao->prepare($sql);

$comando ->bindValue(':id_turma', $id_turma);
$comando ->bindValue(':codigo_turma', md5($codigo));
$comando -> execute();


$registro = $comando->fetch();


if($registro){

    if($registro_aluno){
        header("Location: Turma.php?id=".$id_turma);
        exit;
    } else{
        $sql = "INSERT INTO aluno_turma (id_aluno, id_turma)
                VALUES (:id_aluno, :id_turma)";
    
    $comando = $conexao->prepare($sql);
    $comando->bindValue(':id_aluno', $id_aluno);
    $comando->bindValue(':id_turma', $id_turma);
    $comando->execute();

    header("Location: Turma.php?id=".$id_turma);
           exit;
    }
}else{
    echo "codigo deu erro";
}
?>