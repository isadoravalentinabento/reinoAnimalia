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
    <link rel="stylesheet" href="css/filo01.css?v=5">
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
</head>
<body>
    <main class="area-filo  ">


        <button id="btn-voltar" class="btn-voltar-topo" style="display: none;">
            <img src="img/icons/left.png" alt="Voltar">
        </button>


        <section id="introducao-filo" class="introducao-filo">
            <h1>Conhecendo o Filo</h1>
            <h2>Filo dos Moluscos</h2>
            <p>
                Características do filo Mollusca:
                Corpo bilateralmente simétrico (assimetria bilateral em alguns); não-segmentados; frequentemente com cabeça definida.
                Parede ventral do corpo especializada como um pé muscular, diversamente modificado, mais usado principalmente para locomoção.
                Parede dorsal do corpo forma um par de dobras chamadas manto, o qual delimita a cavidade do manto e dá origem às brânquias ou pulmões e secreta a concha.
                Epitélio da superfície corporal geralmente ciliado e provido de glândulas de muco e terminações nervosas sensoriais.
                Celoma limitado principalmente à região ao redor do coração, e talvez ao lúmen das gônadas e parte dos rins.
                Sistema digestivo complexo; órgão raspador (rádula) geralmente presente; ânus geralmente evacuando para dentro da cavidade do manto.
                Sistema circulatório aberto constituído de coração, vasos e seios sanguíneos.
                Troca gasosa através das brânquias, pulmão, manto ou superfície corporal.
                Órgãos sensoriais do tato, olfato, paladar, equilíbrio e visão.
            </p>
        </section>


        <section class="conteudo-esquerda" style="display: none;">
            <h2 id="titulo-esquerda">Características</h2>
            <p id="texto-esquerda">Aqui estão as características do filo.</p>
        </section>


        <section class="modelo" style="display: none;">
            <model-viewer
                id="modelo-3d"
                src="Modelos3d/esponja.glb"
                camera-controls
                auto-rotate
                shadow-intensity="1">
            </model-viewer>
        </section>


        <section class="conteudo-direita" style="display: none;">
            <h2 id="titulo-direita">Curiosidades</h2>
            <p id="texto-direita">Curiosidades do animal.</p>
        </section>


        <div class="avancar-container">
            <button class="btn-avancar" id="btn-avancar">Avançar</button>
        </div>

    </main>
<script>
let etapa = <?php echo (int)$etapaInicial; ?>;
const idAluno = <?php echo (int)$id_aluno; ?>;
const idTurma = <?php echo (int)$id_turma; ?>;
const idEvolucao = <?php echo (int)$id_evolucao; ?>;

const introducao = document.getElementById("introducao-filo");
const modelo = document.getElementById("modelo-3d");
const conteudoEsquerda = document.querySelector(".conteudo-esquerda");
const conteudoModelo = document.querySelector(".modelo");
const conteudoDireita = document.querySelector(".conteudo-direita");


const tituloEsquerda = document.getElementById("titulo-esquerda");
const textoEsquerda = document.getElementById("texto-esquerda");
const tituloDireita = document.getElementById("titulo-direita");
const textoDireita = document.getElementById("texto-direita");


const botaoAvancar = document.getElementById("btn-avancar");
const botaoVoltar = document.getElementById("btn-voltar");


function carregarEtapa(e) {
    if (e === 0) {
        introducao.style.display = "block";
        conteudoEsquerda.style.display = "none";
        conteudoModelo.style.display = "none";
        conteudoDireita.style.display = "none";
        botaoVoltar.style.display = "none";
    } else {
        introducao.style.display = "none";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        botaoVoltar.style.display = "block";


        if (e === 1) {
            modelo.src = "Modelos3d/esponja.glb";
            tituloEsquerda.textContent = "Características da esponja ";
            textoEsquerda.textContent = "";
            tituloDireita.textContent = "Curiosidades";
            textoDireita.textContent = "";
        }
    }
}

function salvarProgressoNoBanco(novaEtapa) {
    let dadosForm = new FormData();
    dadosForm.append("id_aluno", idAluno);
    dadosForm.append("id_turma", idTurma);
    dadosForm.append("id_evolucao", idEvolucao);
    dadosForm.append("etapa", novaEtapa);

    fetch("salvar_progresso.php", {
        method: "POST",
        body: dadosForm
    })
    .then(resposta => resposta.json())
    .then(resultado => {
        if (resultado.sucesso) {
            console.log("Progresso atualizado no banco:", novaEtapa);
        } else {
            console.error("Erro ao salvar:", resultado.erro);
        }
    })
    .catch(erro => {
        console.error("Erro na requisição:", erro);
    });
}
    window.onload = function() {
        carregarEtapa(etapa);
    };

    botaoAvancar.addEventListener("click", function () {
        if (etapa < 2) {
            etapa++;
            carregarEtapa(etapa);
            salvarProgressoNoBanco(etapa);
        } else {
            alert("Aqui futuramente iremos para o quiz!");
            etapa = 3;
            salvarProgressoNoBanco(etapa);
        }
    });

    botaoVoltar.addEventListener("click", function () {
        if (etapa > 0) {
            etapa--;
            carregarEtapa(etapa);
            salvarProgressoNoBanco(etapa);  
        }
});
</script>
</body>
</html>