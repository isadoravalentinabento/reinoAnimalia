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
    <title>Filo - Poríferos</title>
    <link rel="stylesheet" href="css/filo01.css?v=9">
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
</head>
<body>
    <main id="main-container" class="area-intro">

        <button id="btn-voltar" class="btn-voltar-topo" style="display: none;">
            <img src="img/icons/left.png" alt="Voltar">
        </button>

        <div class="titulos">
            <h1>Conhecendo o Filo dos poríferos</h1>
            <h2>Características do filo Porifera</h2>
        </div>
        
        <section id="intro-etapa-0" class="introducao-filo">
            <div class="bloco-introducao">
                <ul>
                    <li><strong>Multicelulares:</strong> são animais formados por várias células, que desempenham funções diferentes, como a captura de alimentos, o transporte de nutrientes e a sustentação do corpo.</li>
                    <li><strong>Habitat aquático:</strong> vivem exclusivamente em ambientes aquáticos, tanto marinhos quanto de água doce. A maioria das espécies é marinha, e elas podem ser encontradas fixadas em rochas, corais e outros substratos submersos.</li>
                    <li><strong>Corpo com poros:</strong> apresentam numerosos poros na superfície corporal, pelos quais a água entra. Ela circula por canais internos e sai, em muitas espécies, por uma abertura maior chamada ósculo.</li>
                    <li><strong>Simetria corporal:</strong> a maioria das esponjas é assimétrica, ou seja, não apresenta um padrão de divisão do corpo em partes equivalentes. Algumas espécies, entretanto, apresentam simetria radial.</li>
                </ul>
            </div>
        </section>

        <!-- Etapa 1 -->
        <section id="intro-etapa-1" class="introducao-filo" style="display: none;">
            <div class="bloco-introducao">
                <ul>
                    <li><strong>Organização corporal simples:</strong> não possuem tecidos verdadeiros, órgãos ou sistemas especializados. Apesar disso, apresentam diferentes tipos de células, que realizam funções essenciais à sobrevivência do animal.</li>
                    <li><strong>Células da superfície:</strong> a camada externa do corpo é formada principalmente por células achatadas chamadas pinacócitos, que constituem a pinacoderme.</li>
                    <li><strong>Alimentação por filtração:</strong> são animais filtradores, pois retiram da água partículas orgânicas e organismos microscópicos que servem de alimento.</li>
                    <li><strong>Digestão intracelular:</strong> como não possuem sistema digestório, a digestão ocorre no interior das células. Os coanócitos capturam partículas alimentares e os amebócitos distribuem os nutrientes.</li>
                </ul>
            </div>
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


const intro0 = document.getElementById("intro-etapa-0");
const intro1 = document.getElementById("intro-etapa-1");
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

const mainContainer = document.getElementById("main-container");
const titulosContainer = document.querySelector(".titulos");

function carregarEtapa(e) {
    
    intro0.style.display = "none";
    intro1.style.display = "none";
    conteudoEsquerda.style.display = "none";
    conteudoModelo.style.display = "none";
    conteudoDireita.style.display = "none";
    botaoVoltar.style.display = "block";

    if (e === 0) {
        mainContainer.className = "area-intro";
        intro0.style.display = "block";
        titulosContainer.style.display = "block"; 
        botaoVoltar.style.display = "none";       
    } else if (e === 1) {
        mainContainer.className = "area-intro";
        intro1.style.display = "block";
        titulosContainer.style.display = "none"; 
    } else if (e === 2) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/esponja.glb";
        tituloEsquerda.textContent = "Características da esponja";
        textoEsquerda.textContent = "As esponjas possuem uma estrutura porosa que permite a entrada contínua de água para filtração de nutrientes.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Elas não possuem sistema nervoso, muscular ou circulatório, mas suas células conseguem se recompor mesmo se o corpo for totalmente separado!";
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