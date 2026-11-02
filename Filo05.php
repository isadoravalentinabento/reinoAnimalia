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
    <title>Filo 5</title>
    <link rel="stylesheet" href="css/filo01.css?v=3">
    <script type="module"
    src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js">
    </script>
</head>
<body>

<main class="area-filo">

    <section class="conteudo-esquerda">
            <h2 id="titulo-esquerda">
                Características
            </h2>

            <p id="texto-esquerda">
                Aqui estão as características do filo.
            </p>

        </section>

    <section class="modelo">

    <model-viewer
        id="modelo-3d"
        src="Modelos3d/estrela.glb"
        camera-controls
        auto-rotate
        shadow-intensity="1">
    </model-viewer>
</section>



     <section class="conteudo-direita">
            <h2 id="titulo-direita">
                Curiosidades
            </h2>
            <p id="texto-direita">
                se alimentam pelo estomago
                <br>
                
            </p>

        </section>

    <div class="avancar-container">
        <button class="btn-avancar" id="btn-avancar">Avançar</button>
    </div>
</main>
</body>
</html>