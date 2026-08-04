<?php
include "configinc.php";
include "validar.php";

$id_turma = $_GET['id'];

if($_SESSION['tipo_usuario'] == 1){
    include "ProfMenu.php";
}else{
    include "AlunoMenu.php";
}

include "TurmaMenu.php";

$id_turma = $_GET['id'];
$conexao = new PDO(dsn,usuario,senha);
$sql = "SELECT nome_turma
        FROM turma
        WHERE id_turma  = :id_turma";

$comando = $conexao->prepare($sql);
$comando->bindValue('id_turma', $id_turma);
$comando->execute();
$turma = $comando->fetch();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>árvore</title>
    <link rel="stylesheet" href="css/SalaArvore.css">
</head>

<body>
    <h1>Árvore Filogenética</h1>
    <h1><?=$turma['nome_turma']?></h1>

<br><br>

<a href="Turma.php?id=<?=$id_turma?>">
    <button>← Voltar para a turma</button>
</a>

</body>
</html>