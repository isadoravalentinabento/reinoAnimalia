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
$id_evolucao = 4;

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
    <link rel="stylesheet" href="css/filo03.css?v=2">
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
</head>
<body>
    <main id="main-container" class="area-intro">

        <button id="btn-voltar" class="btn-voltar-topo" style="display: none;">
            <img src="img/icons/left.png" alt="Voltar">
        </button>

        <div class="titulos">
            <h1>Conhecendo o Filo dos Nematelmintos</h1>
            <h2>Características do filo:</h2>
        </div>
        
        <section id="intro-etapa-0" class="introducao-filo">
            <div class="bloco-introducao">
                <ul>
                    <li><strong>Simetria bilateral:</strong> o corpo pode ser dividido longitudinalmente em duas metades semelhantes, uma direita e outra esquerda.</li>
                    <li><strong>Corpo não segmentado:</strong> não apresentam o corpo dividido em anéis ou segmentos. Seu formato é alongado, cilíndrico e geralmente afilado nas extremidades.</li>
                    <li><strong>Triblásticos:</strong>durante o desenvolvimento embrionário, formam três folhetos germinativos — ectoderme, mesoderme e endoderme — que dão origem aos diferentes tecidos e estruturas do corpo.</li>
                    <li><strong>Pseudocelomados:</strong>possuem uma cavidade corporal chamada pseudoceloma, preenchida por líquido e localizada entre a parede do corpo e o tubo digestório. Essa cavidade abriga órgãos internos, auxilia na distribuição de substâncias e contribui para a sustentação corporal.</li>
                    <li><strong>Tamanho variado:</strong> existem espécies microscópicas, outras com poucos milímetros e algumas que ultrapassam um metro de comprimento. O tamanho depende da espécie e de seu modo de vida.</li>
                    <li><strong>Revestimento corporal:</strong>a superfície do corpo é protegida por uma camada resistente chamada cutícula, produzida pela epiderme. Ela protege o animal e é substituída durante o crescimento de muitas espécies parasitas por meio de mudas.</li>
                </ul>
            </div>
        </section>

        <section id="intro-etapa-1" class="introducao-filo" style="display: none;">
            <div class="bloco-introducao">
                <ul>
                    <li><strong>Musculatura e locomoção:</strong>apresentam principalmente músculos longitudinais, que permitem movimentos de flexão e ondulação do corpo. Diferentemente de muitos outros animais, não possuem uma camada de músculos circulares bem desenvolvida.</li>
                    <li><strong>Habitat e modo de vida:</strong> são encontrados em ambientes terrestres úmidos, na água doce e nos oceanos. Existem espécies de vida livre, que participam dos processos ecológicos do solo e da água, e espécies parasitas de animais e plantas.</li>
                    <li><strong>Sistema digestório completo:</strong>possuem tubo digestório com duas aberturas, boca e ânus. O alimento entra pela boca, passa pela faringe e pelo intestino, onde ocorre a digestão e a absorção dos nutrientes; os resíduos são eliminados pelo ânus. Nos machos de algumas espécies, o sistema digestório termina em uma cloaca, abertura compartilhada com o sistema reprodutor.</li>
                    <li><strong>Ausência de sistemas circulatório e respiratório:</strong> não possuem coração, vasos sanguíneos nem órgãos respiratórios especializados. As trocas gasosas ocorrem por difusão através da superfície corporal, e o líquido do pseudoceloma auxilia no transporte de substâncias pelo organismo.</li>
                    <li><strong>Sistema excretor:</strong> apresentam estruturas especializadas, como canais excretores ou células glandulares, que participam da eliminação de resíduos e do equilíbrio de água e sais. A organização desse sistema varia entre as espécies.</li>
                    <li><strong>Sistema nervoso:</strong> possuem um anel nervoso próximo à faringe, ligado a cordões nervosos longitudinais. Também apresentam estruturas sensoriais que permitem perceber estímulos químicos, mecânicos e ambientais.</li>
                    <li><strong>Reprodução sexuada:</strong> a maioria das espécies apresenta sexos separados, com machos e fêmeas. Em muitas espécies, as fêmeas são maiores que os machos, característica conhecida como dimorfismo sexual. A fecundação geralmente é interna.</li>
                    <li><strong>Desenvolvimento:</strong> pode ser direto, quando os jovens se desenvolvem sem uma fase larval muito diferente do adulto, ou indireto, quando existem fases larvais. Algumas espécies parasitas apresentam ciclos de vida que envolvem diferentes hospedeiros.</li>
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
            <p id="texto-direita">Curiosidades .</p>
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

        modelo.src = "Modelos3d/Lombriga.glb";
        tituloEsquerda.textContent = "Características da Lombriga";
        textoEsquerda.textContent = "Corpo cilíndrico e alongado: são vermes nematódeos que apresentam corpo alongado, sem segmentação, podendo atingir cerca de 30 cm de comprimento.";
        tituloDireita.textContent = "Características";
        textoDireita.textContent = "Produzem milhares de ovos: uma única fêmea fecundada pode produzir até 200 mil ovos por dia, que são eliminados junto das fezes do hospedeiro.";

    }else if (e === 3) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Lombriga.glb";
        tituloEsquerda.textContent = "Características:";
        textoEsquerda.textContent = "Habitat intestinal: os vermes adultos vivem principalmente no intestino delgado humano, onde completam seu desenvolvimento e se reproduzem.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Os ovos são muito resistentes: podem permanecer viáveis no ambiente por meses ou até anos, dependendo das condições de umidade e temperatura.";

    }else if (e === 4) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Lombriga.glb";
        tituloEsquerda.textContent = "Características da Lombriga";
        textoEsquerda.textContent = "Ciclo de vida monoxênico: apresentam ciclo biológico que necessita de apenas um hospedeiro, o ser humano, sem participação de hospedeiro intermediário.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Os ovos não são imediatamente infectantes: após serem eliminados nas fezes, precisam permanecer no ambiente por aproximadamente 15 dias em condições adequadas para se tornarem infectantes.";

    }else if (e === 5) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Lombriga.glb";
        tituloEsquerda.textContent = "Características da Lombriga";
        textoEsquerda.textContent = " Transmissão por ovos: a infecção ocorre pela ingestão de ovos embrionados presentes em água, alimentos ou solo contaminados. Após serem ingeridos, liberam larvas no intestino delgado.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "As larvas passam pelos pulmões: durante o ciclo de vida, migram até os pulmões, sobem pelas vias respiratórias e chegam à faringe, sendo posteriormente engolidas e retornando ao intestino.";

    }else if (e === 6) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Lombriga.glb";
        tituloEsquerda.textContent = "Características da Lombriga";
        textoEsquerda.textContent = "Migração das larvas: durante o desenvolvimento, as larvas atravessam a parede intestinal, passam pelo fígado e pelos pulmões e posteriormente retornam ao intestino delgado, onde se tornam adultas.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Vivem por bastante tempo no hospedeiro: os vermes adultos podem permanecer no organismo humano por aproximadamente um a dois anos.";

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
    if (etapa < 7) { 
        etapa++;
        carregarEtapa(etapa);
        salvarProgressoNoBanco(etapa);
    } else {
        window.location.href = `quiz.php?id_evolucao=${idEvolucao}&id_turma=${idTurma}`;
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