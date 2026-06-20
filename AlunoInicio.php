<?php
include "configinc.php";
include "validar.php";
include "AlunoMenu.php";

$id_aluno = $_SESSION ['id_usuario'];

$conexao = new PDO(dsn, usuario, senha);

//consulta e retorno
//$sql = "SELECT * FROM turma";
//$comando = $conexao->prepare($sql);
//$comando->execute();
//$registro = $comando->fetchAll();

$sql = "SELECT turma.id_turma, turma.nome_turma, turma.observacao
        FROM aluno_turma
        INNER JOIN turma 
        ON aluno_turma.id_turma = turma.id_turma
        WHERE aluno_turma.id_aluno = :id_aluno";

$comando = $conexao->prepare($sql);
$comando->bindValue(':id_aluno', $id_aluno);
$comando->execute();
$registro = $comando->fetchAll();

foreach($registro as $turma){
     
    echo "<a href='Turma.php?id=".$turma['id_turma']."'>
        <div>
            <h2>".$turma['nome_turma']."</h2>
            <p>".$turma['observacao']."</p>
        </div>
    </a>";

}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animalia</title>
</head>
<body>
    <h1>Bem vindo</h1>
    <H1>FUNCINOU ALUNO</H1>
</body>
</html>