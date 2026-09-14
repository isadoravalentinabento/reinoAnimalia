<?php
include 'validar.php';
include 'configinc.php';

if($_SESSION['tipo_usuario']== 1){
    include "ProfMenu.php";
}else{
    include "AlunoMenu.php";
}

$id_usuario = $_SESSION['id_usuario'];
$conexao = new PDO(dsn, usuario, senha);
$sql = "SELECT nome, email
        FROM useer 
        WHERE id_usuario = :id_usuario";

$comando = $conexao->prepare($sql);
$comando->bindValue(':id_usuario', $id_usuario);
$comando->execute(); 
$usuario = $comando->fetch();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/perfil.css">
</head>
<body>

    <div class="animais">

    <img src="img/icons/jellyfish (3).png" class="agua-viva agua3">
    <img src="img/icons/jellyfish (3).png" class="agua-viva agua3">
    <img src="img/icons/jellyfish (3).png" class="agua-viva agua3">
    <img src="img/icons/jellyfish (3).png" class="agua-viva agua4">
    <img src="img/icons/jellyfish (3).png" class="agua-viva agua5">
    <img src="img/icons/jellyfish (3).png" class="agua-viva agua6">
    <img src="img/icons/jellyfish (3).png" class="agua-viva agua7">
    <img src="img/icons/jellyfish (3).png" class="agua-viva agua8">
    <img src="img/icons/jellyfish (3).png" class="agua-viva agua9">

    

    </div>

    <div class="perfil">
        <h1>Perfil</h1>
    <img src="img/icons/user (1).png" class="foto-perfil">
    <div class="informacoes">

        <p>
            <strong>Nome:</strong>
            <?= $usuario['nome']?>
        </p>

        <p>
            <strong>E-mail:</strong>
            <?= $usuario['email']?>
        </p>

    </div>

    <a href="index.php">
        <button>Deslogar</button>
    </a>

</div>
</body>
</html>