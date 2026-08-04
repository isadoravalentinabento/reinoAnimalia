<?php
include "configinc.php";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$conexao = new PDO(dsn, usuario, senha);

$sql = "SELECT id_usuario, email, tipo_usuario
        FROM useer 
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
    $_SESSION['nome'] = $registro['nome'];
    $_SESSION['tipo_usuario'] = $registro['tipo_usuario'];

    if($registro['tipo_usuario'] == 1){
        header("Location: ProfInicio.php");
    }else{
        header("Location: AlunoInicio.php");
    }
    exit;
}else{
    echo "<script>
            alert('E-mail ou senha incorretos!');
            window.location.href='login.html';
          </script>";
    exit;
}
?>
