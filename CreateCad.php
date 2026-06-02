<?php
include "configinc.php";

$nome_turma = isset($_POST['nome_turma']) ? $_POST['nome_turma'] : "";
$codigo_turma = isset($_POST['codigo_turma']) ? $_POST['codigo_turma'] : "";


$conexao = new PDO(dsn, usuario, senha);


$sql = "INSERT INTO turma (nome_turma, codigo_turma)
        values (:nome_turma, :codigo_turma )";  

$comando = $conexao->prepare($sql); 
$comando->bindValue(':nome_turma', $nome_turma);
$comando->bindValue(':codigo_turma', md5($codigo_turma));


if ($comando->execute()){
    echo "<script>
            alert('Sala criada com sucesso');
            window.location.href = 'ListagemTurma.php';
          </script>";
       
}else{
  echo "<script>alert('Erro ao criar sala'); history.back();</script>";
}
?>