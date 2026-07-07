<?php
include "validar.php";
include "configinc.php";

$id_turma = $_GET['id'];

if($_SESSION['tipo_usuario'] == 1){
    include "ProfMenu.php";
}else{
    include "AlunoMenu.php";
}

include "TurmaMenu.php";



$conexao = new PDO(dsn, usuario, senha);

$sql= "SELECT useer.nome FROM turma
       INNER JOIN useer ON turma.id_professor = useer.id_usuario
       WHERE turma.id_turma = :id_turma";

$comando = $conexao->prepare($sql);

$comando->bindValue(':id_turma', $id_turma);
$comando->execute();

$professor = $comando ->fetch();

//aluno 

$sql = "SELECT useer.nome FROM aluno_turma
        INNER JOIN useer ON aluno_turma.id_aluno = useer.id_usuario
        WHERE aluno_turma.id_turma = :id_turma";

$comando = $conexao->prepare($sql);

$comando->bindValue(':id_turma', $id_turma);
$comando->execute();

$alunos = $comando ->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes</title>
</head>
<body>
    <h2>Professor</h2>
<p><?= $professor['nome'] ?></p>

<br><br>

<h2>Alunos</h2> 
<br>

<?php
    foreach($alunos as $aluno){
        echo "<p>".$aluno['nome']."</p>";
}
?>


</body>
</html>