<?php

include "configinc.php";


$nome =  isset($_POST['nome'])?$_POST['nome']:" ";
$email =  isset($_POST['email'])?$_POST['email']:" ";
$senha =  isset($_POST['senha'])?$_POST['senha']:" ";

if( $nome !=" "){
                                
$conexao = new PDO(dsn, usuario, senha);
$sql = "INSERT INTO usuario (nome, email, senha)
            values (:nome, :email, :senha )";  

$comando = $conexao -> prepare ( $sql); 
$comando -> bindValue(':nome', $nome);
$comando -> bindValue(':email', $email);
$comando -> bindValue(':senha', $senha);

if ($comando -> execute());
    echo"dados inseridos com sucesso";
}else{
    echo" O campo nome é obrigatório";
}
?>