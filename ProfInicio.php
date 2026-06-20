<?php
include "validar.php";
include "ProfMenu.php";
include "configinc.php";

$id_professor = $_SESSION['id_usuario'];

$conexao = new PDO(dsn, usuario, senha);

$sql = "SELECT turma.id_turma, turma.nome_turma, turma.observacao
        FROM turma 
        WHERE turma.id_professor = :id_professor ";

$comando = $conexao->prepare($sql);
$comando->bindValue('id_professor', $id_professor);
$comando->execute();
$registro = $comando->fetchAll();

foreach($registro as $turma){
     
    echo "<a href='Turma.php?id=".$turma['id_turma']."'>
        <div>
            <h2>".$turma['nome_turma']."</h2>
            <p>".$turma['observacao']."</p>
        </div>
    </a>
    ";

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animalia</title>
</head>
<body>
    <h1>Bem vindo</h1>
    <H1>FUNCINOU professor</H1>

    <P>COLOCAR ICON EM PERFIL E NO SAIR</P>
   
</body>
</html>