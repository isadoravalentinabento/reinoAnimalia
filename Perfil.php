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
</head>
<body>
    <div class="perfil" style="background: blue">
        <h1>Perfil</h1>

        <img src="img/icons/user (1).png" width="120">

        <br><br>

        <label>Nome:</label>
        <?= $usuario['nome']?>

        <br><br>

        <label>E-mail:</label>
        <?= $usuario['email']?> 


        <br><br>
        <a href="index.php">
            <button>Deslogar</button>
        </a>
    </div>
</body>
</html>