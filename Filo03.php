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

          <div class="titulos">
            <h1>Conhecendo o Filo dos platelmintos</h1>
            <h2>Características do filo:</h2>
        </div>


        <section id="intro-etapa-0" class="introducao-filo">
            <div class="bloco-introducao"> 
                <ul>
                    <li><strong>Simetria radial:</strong> apresentam o corpo organizado ao redor de um eixo central, permitindo que suas estruturas sejam distribuídas ao redor da região oral.</li>
                    <li><strong>Animais diblásticos:</strong> durante o desenvolvimento embrionário, apresentam dois folhetos germinativos, a ectoderme e a endoderme.</li>
                    <li><strong>Organização corporal em tecidos:</strong> possuem tecidos verdadeiros, diferentemente dos poríferos.</li>
                    <li><strong>Mesogleia:</strong> entre a epiderme e a gastroderme existe uma camada gelatinosa chamada mesogleia.</li>
                    <li><strong>Cnidócitos:</strong> são células especializadas características do filo, utilizadas principalmente na defesa e na captura de presas.</li>
                    <li><strong>Tentáculos:</strong> apresentam projeções ao redor da região oral, utilizadas principalmente na captura de alimentos.</li>
                    <li><strong>Cavidade gastrovascular:</strong> possuem uma cavidade interna responsável pela digestão e distribuição de nutrientes.</li>
                    <li><strong>Sistema digestório incompleto:</strong> não possuem ânus nem tubo digestório completo.</li>
                    <li><strong>Alimentação predominantemente carnívora:</strong> capturam pequenos animais aquáticos utilizando seus tentáculos e cnidócitos.</li>
                    <li><strong>Ausência de sistemas circulatório, respiratório e excretor:</strong> Não possuem órgãos especializados para essas funções.</li>
                </ul>
            </div>
        </section>

        <section id="intro-etapa-1" class="introducao-filo" style="display: none;">
            <div class="bloco-introducao"> <!-- Corrigido de bloco-indroducao para bloco-introducao -->
                <ul>
                    <li><strong>Sistema nervoso difuso:</strong> Possuem uma rede de células nervosas distribuídas pelo corpo, sem cérebro ou sistema nervoso centralizado.</li>
                    <li><strong>Estruturas sensoriais:</strong> algumas medusas apresentam estatocistos, responsáveis pela percepção do equilíbrio e da posição corporal.</li>
                    <li><strong>Duas formas corporais:</strong> podem apresentar duas organizações principais, denominadas pólipo e medusa.</li>
                    <li><strong>Pólipos geralmente sésseis:</strong> são formas normalmente fixadas a um substrato, como rochas ou outros organismos.</li>
                    <li><strong>Medusas livre-natantes:</strong> apresentam corpo geralmente gelatinoso e movimentam-se por contrações musculares.</li>
                    <li><strong>Reprodução sexuada e assexuada:</strong> podem reproduzir-se por meio da formação de gametas ou por processos assexuados.</li>
                    <li><strong>Desenvolvimento larval:</strong> muitas espécies apresentam uma larva chamada plânula, geralmente ciliada e de vida livre.</li>
                    <li><strong>Polimorfismo:</strong> algumas espécies coloniais apresentam indivíduos com funções diferentes.</li>
                    <li><strong>Habitat aquático:</strong> são animais exclusivamente aquáticos, sendo a maioria marinha.</li>
                    <li><strong>Importância ecológica:</strong> participam das cadeias alimentares aquáticas, servindo de alimento e formando recifes.</li>
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
                src="Modelos3d/planaria.glb"
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
            modelo.src = "Modelos3d/planaria.glb";
            tituloEsquerda.textContent = "Características da Planaria";
            textoEsquerda.textContent = "";
            tituloDireita.textContent = "Curiosidades";
            textoDireita.textContent = "";
        } else if (e === 2) {
            modelo.src = "Modelos3d/Tenia.glb";
            tituloEsquerda.textContent = "Características da Tenia";
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
