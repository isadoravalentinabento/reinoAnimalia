<?php
include "validar.php";
include "configinc.php";
include "AlunoMenu.php";

$conexao = new PDO(dsn, usuario, senha);

$sql = "SELECT * FROM turma";

$comando = $conexao->prepare($sql);
$comando->execute();

$registro = $comando->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/Listagem.css">
    <title>Listagem</title>
   
</head>
<body>

<table border="5">
<form action="" method="POST">
<tr>
    <th>
    <label for="pesquisa">Nome da sala</label>
    <input type="text" id="pesquisa" name="filtro">
    <button type="submit">Pesquisar</button>
</th>
</tr>
</form>


<?php

if(isset($_POST['filtro']) && !empty($_POST['filtro'])){
    $filtro = $_POST['filtro'];

    $sql= " SELECT * FROM turma WHERE nome_turma LIKE :filtro";
    $comando= $conexao->prepare($sql);
    $comando->bindValue(':filtro', "%".$filtro."%");

}else{
    $sql = "SELECT * FROM turma";
    $comando = $conexao->prepare($sql); 
}
$comando->execute();
$registro = $comando->fetchAll();
        

foreach($registro as $turma){

    echo
    "<tr>".

    "<td>".$turma['nome_turma']."</td>".

    "<td>

        <button onclick='abrirPopup(".$turma['id_turma'].")'>
            Entrar
        </button>

    </td>".

    "</tr>";
}
?>

</table>

<div id="popup">

    <h2>Digite o código</h2>

    <form action="EntrarTurma.php" method="POST">

        <input type="hidden" name="id_turma" id="id_turma">
        <input type="text" name="codigo">
        <br>
        <br>
        <button type="submit">Entrar</button>
        <button type="button" onclick="fecharPopup()">Fechar</button>
    </form>
</div>

<script>
    function abrirPopup(id){
      document.getElementById("popup").style.display = "block";
      document.getElementById("id_turma").value = id;
      }
    function fecharPopup(){
      document.getElementById("popup").style.display = "none";
    }
</script>

</body>
</html>