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
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Meu Modelo 3D</title>

    <link rel="stylesheet" href="css/filo01.css?v=2">

    <script type="module"
        src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js">
    </script>

</head>

<body>
    <main class="area-filo">

        <section class="conteudo-esquerda">
            <h2>Texte 1</h2>

            <p>
               aaaaaaaaaaaaaaaaaaaaaa
            </p>
        </section>


        <section class="modelo">

            <model-viewer
                src="3d/untitled.glb"
                camera-controls
                auto-rotate
                shadow-intensity="1">
            </model-viewer>

        </section>


        <section class="conteudo-direita">
            <h2>Texte 2</h2>

            <p>
                bbbbbbbbbbbbbbbb
            </p>
        </section>

        <div class="avancar-container">
            <button class="btn-avancar">Avançar</button>
        </div>

    </main>

</body>
</html>