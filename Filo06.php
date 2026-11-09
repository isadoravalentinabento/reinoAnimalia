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

$id_aluno = $_SESSION['id_usuario'] ?? 1;
$id_evolucao = 2;

$sqlProgresso = "SELECT etapa FROM progresso WHERE id_aluno = :id_aluno AND id_evolucao = :id_evolucao";
$cmdProgresso = $conexao->prepare($sqlProgresso);
$cmdProgresso->bindValue(':id_aluno', $id_aluno);
$cmdProgresso->bindValue(':id_evolucao', $id_evolucao);
$cmdProgresso->execute();
$dadosProgresso = $cmdProgresso->fetch(PDO::FETCH_ASSOC);

$etapaInicial = $dadosProgresso ? $dadosProgresso['etapa'] : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filo 2 - Moluscos</title>
    <link rel="stylesheet" href="css/filo01.css?v=3">
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
</head>
<body>
    <main class="area-filo">

        <section id="introducao-filo" class="introducao-filo">
            <h1>Conhecendo o Filo</h1>
            <h2>Filo dos Moluscos</h2>
            <p> 
                Características do filo Cnidários:
                aaaaaaaaaaaaaaaaaaaaa
                aaaaaaaaaaaaaaaaaaaaaa
                aaaaaaaaaaaaaaa
            </p>
        </section>
        
        <section class="conteudo-esquerda" style="display: none;">
            <h2 id="titulo-esquerda">Características</h2>
            <p id="texto-esquerda">Aqui estão as características do filo.</p>
        </section>

        <!-- Modelo 3D -->
        <section class="modelo" style="display: none;">
            <model-viewer
                id="modelo-3d"
                src="Modelos3d/caracolMolusco.glb"
                camera-controls
                auto-rotate
                shadow-intensity="1">
            </model-viewer>
        </section>

        <!-- Conteúdo Direita -->
        <section class="conteudo-direita" style="display: none;">
            <h2 id="titulo-direita">Curiosidades</h2>
            <p id="texto-direita">Curiosidades do animal.</p>
        </section>

        <!-- Botão Avançar -->
        <div class="avancar-container">
            <button class="btn-avancar" id="btn-avancar">Avançar</button>
        </div>
    </main>

<script>
let etapa = <?php echo (int)$etapaInicial; ?>;
const idAluno = <?php echo (int)$id_aluno; ?>;
const idTurma = <?php echo (int)$id_turma; ?>;
const idEvolucao = <?php echo (int)$id_evolucao; ?>;

// Elementos da tela
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

function carregarEtapa(e) {
    if (e === 0) {
        introducao.style.display = "block";
        conteudoEsquerda.style.display = "none";
        conteudoModelo.style.display = "none";
        conteudoDireita.style.display = "none";
    } else {
        introducao.style.display = "none";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";

        if (e === 1) {
            modelo.src = "Modelos3d/caracolMolusco.glb";
            tituloEsquerda.textContent = "Características do caracol";
            textoEsquerda.textContent = "Concha espiralada: a maioria dos caracóis apresenta uma concha externa espiralada, que protege o corpo mole. Cabeça com tentáculos: possuem uma cabeça bem definida, com tentáculos sensoriais. Locomoção por pé muscular: deslocam-se deslizando sobre uma superfície. Rádula para alimentação: utilizam uma estrutura com pequenos dentes para raspar o alimento.";
            tituloDireita.textContent = "Curiosidades";
            textoDireita.textContent = "Podem se proteger dentro da concha quando se sentem ameaçados. Apresentam grande diversidade de habitats (terrestres, água doce e marinhos). São mais ativos em condições úmidas.";
        } else if (e === 2) {
            modelo.src = "M3/Vieira.glb";
            tituloEsquerda.textContent = "Características da Vieira";
            textoEsquerda.textContent = "Concha com duas valvas: as vieiras possuem uma concha formada por duas partes articuladas. Alimentação por filtração: retiram partículas alimentares da água. Olhos na borda do manto para detectar mudanças de luz.";
            tituloDireita.textContent = "Curiosidades";
            textoDireita.textContent = "Conseguem nadar para escapar de predadores abrindo e fechando rapidamente suas valvas! Seus olhos possuem pequenos espelhos internos para direcionar a luz.";
        } else if (e === 3) {
            modelo.src = "M3/Lula.glb";
            tituloEsquerda.textContent = "Características da lula";
            textoEsquerda.textContent = "Corpo alongado e concha interna (gládio). Oito braços e dois tentáculos mais longos. Locomoção por jato de água através do sifão. Alimentação predadora com bico resistente.";
            tituloDireita.textContent = "Curiosidades";
            textoDireita.textContent = "Podem mudar de cor usando cromatóforos. Liberam tinta para se defender de predadores. Possuem 3 corações e sangue azulado devido à hemocianina.";
        }
    }
}

window.onload = function() {
    carregarEtapa(etapa);
};

botao.addEventListener("click", function () {

    if (etapa < 3) {
        etapa++;
        carregarEtapa(etapa);
    } else {
        alert("Aqui futuramente iremos para o quiz!");
        etapa = 4;
    }

    let dadosForm = new FormData();
    dadosForm.append("id_aluno", idAluno);
    dadosForm.append("id_turma", idTurma);
    dadosForm.append("id_evolucao", idEvolucao);
    dadosForm.append("etapa", etapa);

    fetch("salvar_progresso.php", {
        method: "POST",
        body: dadosForm
    })
    .then(resposta => resposta.json())
    .then(resultado => {
        if (resultado.sucesso) {
            console.log("Progresso salvo com sucesso no banco!");
        } else {
            console.error("O banco recusou:", resultado.erro);
            alert("Erro ao salvar no banco: " + resultado.erro);
        }
    })
    .catch(erro => {
        console.error("Erro na requisição:", erro);
    });
});
</script>
</body>
</html>