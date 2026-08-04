<?php

include "configinc.php";
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("Location: EsqueciSenha.php");
    exit;
}

$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar = $_POST['confirmar'];

if($senha != $confirmar){

    echo "<script>
            alert('As senhas não são iguais!');
            history.back();
          </script>";

    exit;
}

$conexao = new PDO(dsn, usuario, senha);

$sql = "SELECT * FROM useer
        WHERE email = :email";

$comando = $conexao->prepare($sql);
$comando->bindValue(':email', $email);
$comando->execute();

$usuario = $comando->fetch();

if(!$usuario){

    echo "<script>
            alert('E-mail não encontrado!');
            history.back();
          </script>";

    exit;
}

$sql = "UPDATE useer
        SET senha = :senha
        WHERE email = :email";

$comando = $conexao->prepare($sql);

$comando->bindValue(':senha', md5($senha));
$comando->bindValue(':email', $email);

if($comando->execute()){

    echo "<script>
            alert('Senha alterada com sucesso!');
            window.location='login.html';
          </script>";

}else{

    echo "<script>
            alert('Erro ao alterar a senha.');
            history.back();
          </script>";

}