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
    <title>Filo 3</title>
    <link rel="stylesheet" href="css/filo01.css?v=3">
    <script type="module"
    src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js">
    </script>
</head>
<body>

    <main class="area-filo">

        <section id="introducao-filo" class="introducao-filo">
            <h1>Conhecendo o Filo</h1>

            <h2>Filo Arthropoda</h2>

            <p>
                Os artrópodes são animais invertebrados que possuem
                exoesqueleto, corpo segmentado e patas articuladas.
                Esse grupo inclui diversos animais, como insetos,
                aranhas e crustáceos.
            </p>

            <p>
                Ao avançar, você poderá conhecer alguns desses animais,
                suas características e curiosidades por meio de modelos 3D.
            </p>
        </section>

        <section class="conteudo-esquerda" style="display: none;">
            <h2 id="titulo-esquerda">
                Características
            </h2>

            <p id="texto-esquerda">
                Aqui estão as características do filo.
            </p>

        </section>



        <section class="modelo" style="display: none;">

        <model-viewer
        id="modelo-3d"
        src="Modelos3d/abelha.glb"
        camera-controls
        auto-rotate
        shadow-intensity="1">
        </model-viewer>

    </section>


    <section class="conteudo-direita" style="display: none;">
            <h2 id="titulo-direita">
                Curiosidades
            </h2>
            <p id="texto-direita">
                polinização de plantas.
            </p>

        </section>

    <div class="avancar-container">
    <button class="btn-avancar" id="btn-avancar">Avançar</button>
    </div>
</main>
</body>

<script>
let etapa = 0;

const introducao = document.getElementById("introducao-filo");
const modelo = document.getElementById("modelo-3d");
const conteudoEsquerda = document.querySelector(".conteudo-esquerda");
const conteudoModelo = document.querySelector(".modelo");
const conteudoDireita = document.querySelector(".conteudo-direita");

const tituloEsquerda = document.getElementById("titulo-esquerda");
const textoEsquerda = document.getElementById("texto-esquerda");
const tituloDireita = document.getElementById("titulo-direita");
const textoDireita = document.getElementById("texto-direita");
const botao = document.getElementById("btn-avancar");

botao.addEventListener("click", function () {

    if (etapa === 0) {
        // Esconde a introdução
        introducao.style.display = "none";

        // Mostra o conteúdo do primeiro animal
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";

        modelo.src = "Modelos3d/abelha.glb";

        tituloEsquerda.textContent = "Características da abelha";
        textoEsquerda.textContent =
            "A abelha possui seis patas, antenas e corpo dividido em segmentos.";

        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent =
            "As abelhas contribuem para a polinização de muitas plantas.";

        etapa = 1;

    } else if (etapa === 1) {
        modelo.src = "Modelos3d/aranhaArtopode.glb";

        tituloEsquerda.textContent = "Características da aranha";
        textoEsquerda.textContent =
            "As aranhas possuem oito patas e não têm antenas.";

        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent =
            "Muitas aranhas produzem seda para construir teias.";

        etapa = 2;

    } else if (etapa === 2) {
        modelo.src = "Modelos3d/piolhoDeCobra.glb";

        tituloEsquerda.textContent = "Características do piolho-de-cobra";
        textoEsquerda.textContent =
            "O piolho-de-cobra possui corpo alongado e segmentado.";

        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent =
            "Ele costuma viver em locais úmidos e se alimentar de matéria orgânica.";

        etapa = 3;

    } else if (etapa === 3) {
        alert("Aqui futuramente iremos para o quiz!");
    }

});
</script>

</script>
</html>