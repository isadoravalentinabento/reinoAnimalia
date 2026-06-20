<?php
include "configinc.php";
include "validar.php";
$id_professor = $_SESSION['id_usuario'];


$nome_turma = isset($_POST['nome_turma']) ? $_POST['nome_turma']: "";
$codigo_turma = isset($_POST['codigo_turma']) ? $_POST['codigo_turma'] : "";
$observacao = isset($_POST['observacao'])? $_POST['observacao']: "";


$conexao = new PDO(dsn, usuario, senha);


$sql = "INSERT INTO turma (nome_turma, codigo_turma, id_professor, observacao)
        values (:nome_turma, :codigo_turma, :id_professor, :observacao)";  

$comando = $conexao->prepare($sql); 
$comando->bindValue(':nome_turma', $nome_turma);
$comando->bindValue(':codigo_turma', md5($codigo_turma));
$comando->bindValue(':id_professor', $id_professor);
$comando->bindValue(':observacao', $observacao);


if ($comando->execute()){
    echo "<script>
            alert('Sala criada com sucesso');
            window.location.href = 'ProfInicio.php';
          </script>";
       
}else{
  echo "<script>alert('Erro ao criar sala'); history.back();</script>";
}
?>