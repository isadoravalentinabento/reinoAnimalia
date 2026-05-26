<?php
include "validar.php";
include "configinc.php";

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
    <title>Listagem</title>

    <style>

        #popup{
            display: none;
            position: fixed;

            top: 50%;
            left: 50%;

            transform: translate(-50%, -50%);
            background: lightblue;
            padding: 30px;

            border-radius: 10px;
        }

    </style>

</head>
<body>

<table border="5">




<tr>
    <th>
    <label for="pesquisa">Nome da sala</label>
    <input type="text" id="pesquisa" name="pesquisa">
    <button type="submit">Pesquisar</button>
</th>
</tr>

<?php

   // if(isset($_GET['pesquisa'])){
     //   $pesquisa = $_GET['pesquisa']
    //}

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

    <form action="EntrarTurma.php" method="post">

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