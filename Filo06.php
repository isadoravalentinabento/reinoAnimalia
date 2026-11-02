<?php
include "configinc.php";
include "validar.php";
include "MenuArvore.php";

$id_turma = $_GET['id'];

$conexao = new PDO(dsn, usuario, senha);

$sql = "SELECT nome_turma
        FROM turma
        WHERE id_turma = :id_turma";

$comando = $conexao->prepare($sql);
$comando->bindValue(':id_turma', $id_turma);
$comando->execute();

$turma = $comando->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filo 6</title>
    <link rel="stylesheet" href="css/filo01.css?v=3">
    <script type="module"
        src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js">
    </script>
</head>


<body>
    
    <main class="area-filo">

    <section class="conteudo-esquerda">
            <h2 id="titulo-esquerda">Características</h2>

            <p id="texto-esquerda"> Aqui estão as características do filo.</p>
    </section>

    <section class="modelo">
         <model-viewer 
         id="modelo-3d"  
         src="Modelos3d/hidraCnidario.glb"
         camera-controls auto-rotate 
         shadow-intensity="1">
        </model-viewer>
    </section>

    <section class="conteudo-direita">
            <h2 id="titulo-direita">Curiosidades</h2>
            <p id="texto-direita">Curiosidades</p>
    </section>

    <div class="avancar-container">
    <button class="btn-avancar" id="btn-avancar">Avançar</button>
    </div>
</main>
</body>
<script>

let etapa = 1;
const modelo = document.getElementById("modelo-3d");
const tituloEsquerda = document.getElementById("titulo-esquerda");
const textoEsquerda = document.getElementById("texto-esquerda");
const tituloDireita = document.getElementById("titulo-direita");
const textoDireita = document.getElementById("texto-direita");
const botao = document.getElementById("btn-avancar");

botao.addEventListener("click", function () {

    if (etapa === 1) {

        modelo.src = "Modelos3d/aguavivaCnidario.glb";
        tituloEsquerda.textContent = "Características da agua viva";
        textoEsquerda.textContent ="a";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent ="96 feito de agua";
        etapa = 2;
    }

    else if (etapa === 2) {
        alert("Aqui futuramente iremos para o quiz!");
    }

});

</script>
</html>