<?php
include "configinc.php";

$nome = isset($_POST['nome']) ? $_POST['nome'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$senha = isset($_POST['senha']) ? $_POST['senha'] : "";
$tipo_usuario = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : "";
$confirmar = isset($_POST['confirmar_senha']) ? $_POST['confirmar_senha'] : "";

if($senha != $confirmar){
    echo "<script>alert('As senhas não coincidem'); history.back();</script>";
    exit;
}

if(trim($nome) == ""){
    echo "<script>alert('O campo nome é obrigatório'); history.back();</script>";
    exit;
}
if(trim($email) == ""){
    echo "<script>alert('O campo email é obrigatório'); history.back();</script>";
    exit;
}
if(trim($senha) == ""){
    echo "<script>alert('O campo senha é obrigatório'); history.back();</script>";
    exit;
}
if(trim($tipo_usuario) == ""){
    echo "<script>alert('O campo entrar como... é obrigatório'); history.back();</script>";
    exit;
}

$conexao = new PDO(dsn, usuario, senha);

// Tabela USER (em vez de usuario)
$sql = "INSERT INTO user (nome, email, senha, tipo_usuario)
        values (:nome, :email, :senha, :tipo_usuario)";  

$comando = $conexao->prepare($sql); 
$comando->bindValue(':nome', $nome);
$comando->bindValue(':email', $email);
$comando->bindValue(':senha', md5($senha));
$comando->bindValue(':tipo_usuario', $tipo_usuario);

if ($comando->execute()){
    echo "<script>
            alert('Cadastro realizado com sucesso');
            window.location.href = 'login.html';
          </script>";
}else{
    echo "<script>alert('Erro ao cadastrar'); history.back();</script>";
}
?>