<?php
include "configinc.php";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$conexao = new PDO(dsn, usuario, senha);

$sql = "SELECT id_usuario, email
        FROM user 
        WHERE email = :usuario 
        AND senha = :senha";

$comando = $conexao->prepare($sql);
$comando->bindValue(':usuario', $usuario);
$comando->bindValue(':senha', md5($senha));
$comando->execute();
$registro = $comando->fetch();

if($registro){
    session_start();
    $_SESSION['id_usuario'] = $registro['id_usuario'];
    $_SESSION['email'] = $registro['email'];
    $_SESSION['nome'] = $registro ['nome'];
    header('location: teste.php');
} else {
    header('location: login.html');
}
?>