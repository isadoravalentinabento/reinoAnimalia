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
    <link rel="stylesheet" href="css/filo03.css?v=2">
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
</head>
<body>
    <main id="main-container" class="area-intro">

        <button id="btn-voltar" class="btn-voltar-topo" style="display: none;">
            <img src="img/icons/left.png" alt="Voltar">
        </button>

        <div class="titulos">
            <h1>Conhecendo o Filo dos anelídeo</h1>
            <h2>Características do filo:</h2>
        </div>
        
       <section id="intro-etapa-0" class="introducao-filo">
            <div class="bloco-introducao">
                <ul>
                    <li><strong>Corpo segmentado em anéis:</strong>apresentam o corpo dividido em segmentos chamados metâmeros, que se repetem ao longo do comprimento do animal. Essa organização, denominada metameria, pode ser observada externamente e também na organização interna. É uma das principais características que diferenciam os anelídeos de outros vermes, como os nematódeos, que não possuem o corpo segmentado dessa maneira.</li>
                    <li><strong>Habitat aquático e terrestre:</strong>podem viver em ambientes marinhos, de água doce e terrestres. As minhocas são encontradas principalmente em solos úmidos, enquanto muitas sanguessugas vivem em ambientes aquáticos e diversos poliquetas habitam os mares. As condições do ambiente influenciam suas adaptações para respiração, alimentação e locomoção.</li>
                    <li><strong>Corpo mole e musculoso:</strong>possuem uma parede corporal com camadas de músculos circulares e longitudinais, revestida externamente por uma cutícula fina e flexível. A contração desses músculos permite alongar, encurtar e movimentar o corpo. A cutícula ajuda a proteger o animal, mas não forma um esqueleto rígido.</li>
                    <li><strong>Celoma e esqueleto hidrostático:</strong> apresentam uma cavidade corporal chamada celoma, preenchida por líquido. Esse líquido exerce pressão contra a parede do corpo e funciona como um esqueleto hidrostático, oferecendo sustentação e permitindo que os músculos movimentem o animal. Nas minhocas, por exemplo, esse mecanismo auxilia no deslocamento pelo solo.</li>
                    <li><strong>Cerdas para locomoção:</strong> muitos anelídeos possuem pequenas estruturas chamadas cerdas, formadas por quitina, que ajudam na fixação ao substrato e no deslocamento. As minhocas apresentam poucas cerdas por segmento, enquanto muitos poliquetas possuem numerosas cerdas associadas a estruturas laterais chamadas parapódios. As sanguessugas são uma exceção importante, pois não possuem cerdas.</li>
                    <li><strong>Sistema digestório completo:</strong> possuem boca e ânus, permitindo que o alimento percorra o tubo digestório em um único sentido. A alimentação varia entre os grupos: muitas minhocas ingerem solo e matéria orgânica, algumas espécies são predadoras e certas sanguessugas alimentam-se do sangue de outros animais. Portanto, nem todos os anelídeos possuem os mesmos hábitos alimentares.</li>
                </ul>
            </div>
        </section>


        <section id="intro-etapa-1" class="introducao-filo" style="display: none;">
            <div class="bloco-introducao">
                <ul>
                    <li><strong>Sistema circulatório fechado:</strong> o sangue circula pelo interior de vasos sanguíneos, sem sair deles para banhar diretamente os tecidos, como ocorre na circulação aberta de muitos outros invertebrados. O sangue transporta substâncias pelo corpo e frequentemente apresenta pigmentos respiratórios, como a hemoglobina, que auxilia no transporte de oxigênio.</li>
                    <li><strong>Respiração pela pele ou por brânquias:</strong>as minhocas realizam respiração cutânea, ou seja, as trocas gasosas ocorrem pela superfície corporal, que precisa permanecer úmida. Já diversos anelídeos aquáticos possuem brânquias ou outras estruturas especializadas para realizar as trocas gasosas com a água. Em alguns poliquetas, os parapódios também participam da respiração.</li>
                    <li><strong>Sistema excretor:</strong>é formado principalmente por estruturas tubulares chamadas nefrídios, que retiram resíduos metabólicos e ajudam a regular a quantidade de água e sais no organismo. Em muitos anelídeos, há estruturas excretoras repetidas ao longo dos segmentos corporais.</li>
                    <li><strong>Sistema nervoso e órgãos sensoriais:</strong>apresentam um par de gânglios nervosos na região anterior, que funciona como um cérebro simples, ligado a um cordão nervoso ventral. Ao longo do corpo, existem outros gânglios que ajudam a coordenar os movimentos. Dependendo da espécie, podem apresentar receptores táteis, células sensíveis à luz e outras estruturas que permitem perceber estímulos ambientais.</li>
                    <li><strong>Reprodução sexuada:</strong>a reprodução varia conforme o grupo. Muitas minhocas e sanguessugas são hermafroditas, ou seja, cada indivíduo possui estruturas reprodutoras masculinas e femininas, mas geralmente ocorre troca de espermatozoides entre indivíduos. Já muitos poliquetas possuem sexos separados, com machos e fêmeas distintos.</li>
                    <li><strong>Desenvolvimento e reprodução:</strong>algumas espécies apresentam desenvolvimento direto, sem fase larval, como ocorre nas minhocas. Muitos anelídeos marinhos, por outro lado, apresentam desenvolvimento indireto, com uma fase larval chamada trocófora. Em determinadas espécies, também pode ocorrer reprodução assexuada por fragmentação ou brotamento.</li>
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

        modelo.src = "Modelos3d/Minhoca.glb";
        tituloEsquerda.textContent = "Características da Minhoca";
        textoEsquerda.textContent = "Corpo segmentado em anéis: as minhocas apresentam o corpo alongado dividido em vários segmentos, chamados metâmeros. Essa organização permite maior flexibilidade e facilita os movimentos durante a escavação do solo.";
        tituloDireita.textContent = "Características";
        textoDireita.textContent = "Contribuem para a fertilidade do solo: ao ingerirem matéria orgânica e escavarem galerias, ajudam a misturar os materiais presentes no solo, favorecem a circulação de ar e facilitam a infiltração da água.";

    }else if (e === 3) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Minhoca.glb";
        tituloEsquerda.textContent = "Características:";
        textoEsquerda.textContent = "Cerdas para locomoção: possuem pequenas cerdas distribuídas ao longo do corpo, que ajudam a fixá-lo no solo durante o deslocamento. Ao contrário de muitos outros anelídeos, como os poliquetas, não possuem parapódios.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Possuem uma moela muscular: depois de passar pela faringe e pelo esôfago, o alimento chega à moela, uma estrutura muscular que o tritura com a ajuda de partículas presentes no material ingerido.";

    }else if (e === 4) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Minhoca.glb";
        tituloEsquerda.textContent = "Características da Minhoca";
        textoEsquerda.textContent = "Respiração pela pele: realizam as trocas gasosas através da pele fina, que precisa permanecer úmida para permitir a entrada de oxigênio e a eliminação de gás carbônico. Por isso, são mais vulneráveis ao ressecamento.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " São hermafroditas: cada minhoca possui órgãos reprodutores masculinos e femininos. Apesar disso, geralmente ocorre fecundação cruzada, na qual dois indivíduos trocam espermatozoides durante a reprodução.";

    }else if (e === 5) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Minhoca.glb";
        tituloEsquerda.textContent = "Características da Minhoca";
        textoEsquerda.textContent = "Alimentação de matéria orgânica: ingerem solo que contém restos de vegetais, organismos em decomposição e outros materiais orgânicos. Durante a digestão, aproveitam nutrientes e eliminam resíduos que contribuem para a fertilidade do solo.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Não possuem olhos como os humanos: não apresentam olhos verdadeiros, mas possuem células sensíveis à luz na pele, principalmente na região anterior do corpo. Isso permite perceber diferenças de luminosidade e ajuda a evitar a exposição a condições desfavoráveis";

    }else if (e === 6) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Minhoca.glb";
        tituloEsquerda.textContent = "Características da Minhoca";
        textoEsquerda.textContent = "Sistema circulatório fechado: possuem vasos sanguíneos pelos quais o sangue circula sem sair para banhar diretamente os tecidos. A hemoglobina presente no sangue auxilia no transporte de oxigênio pelo organismo.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Podem regenerar algumas partes do corpo: determinadas espécies conseguem regenerar partes perdidas, mas essa capacidade é limitada e varia conforme a espécie, a região lesionada e as condições do animal. Isso não significa que qualquer fragmento de uma minhoca consiga formar um novo indivíduo.";

    }else if (e === 7) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Minhoca.glb";
        tituloEsquerda.textContent = "Características da Minhoca";
        textoEsquerda.textContent = "Clitelo relacionado à reprodução: apresentam uma região mais espessa do corpo, chamada clitelo, que participa da reprodução e secreta o material utilizado na formação do casulo onde os ovos se desenvolvem.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Ajudam na decomposição da matéria orgânica: ao ingerirem restos de organismos e processarem esse material, contribuem para a reciclagem de nutrientes e para o funcionamento dos ecossistemas terrestres";

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