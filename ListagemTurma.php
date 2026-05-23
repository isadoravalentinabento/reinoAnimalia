<?php
include "validar.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>
</head>
<body>

<h1>Bem vindo <?=$_SESSION['nome'] ?></h1>

    
     <table  border="1"><br>

     <tr>
        <th>Nome Turma</th>
        <th>Código da turma</th>
        <td>Entrar</td>
     </tr>

<?php
if(isset($_GET['filtro'])){
    $filtro = $_GET['filtro'];

    
    include "configinc.php";
    
    $conexao = new PDO(dsn, usuario, senha);
    

    $sql = " SELECT * FROM turma;
                                   
    $comando = $conexao -> prepare ( $sql);  
    $comando -> execute();
    $registro = $comando->fetchAll(); 
    
    foreach($registro as $aluno){
        echo
        "<tr>".
        "<td>".$aluno['id_turma']."</td>".
        "<td>".$aluno['nome_turma']."</td>".
       
        "<td><a href ='formulario_alterar_usuario.php?id=".$turma['id_turma']."'>Entrar</a></td>".
        "</tr>";
    }
}

?>
        </table>
    </body>
</html>
