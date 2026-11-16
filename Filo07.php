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
                    <li><strong> Animais invertebrados de corpo mole:</strong> os moluscos não possuem coluna vertebral e apresentam o corpo mole, geralmente protegido por uma concha. Essa concha pode ser externa, como nos caracóis e nas ostras, interna e reduzida, como nas lulas, ou ausente, como nos polvos e nas lesmas.</li>
                    <li><strong>Habitat aquático e terrestre:</strong>vivem principalmente em ambientes marinhos, mas também existem espécies de água doce e terrestres. Os moluscos terrestres, como caracóis e lesmas, geralmente vivem em locais úmidos, pois precisam evitar a perda excessiva de água pelo corpo.</li>
                    <li><strong>Simetria bilateral:</strong> apresentam, em geral, simetria bilateral, ou seja, o corpo pode ser dividido em duas metades aproximadamente equivalentes por um plano longitudinal. Entretanto, alguns moluscos, como muitos gastrópodes adultos, apresentam assimetria corporal relacionada a mudanças ocorridas durante o desenvolvimento.</li>
                    <li><strong>Organização corporal:</strong>  o corpo dos moluscos apresenta três regiões principais: o pé muscular, a massa visceral e o manto. O pé participa da locomoção, da escavação ou da fixação ao substrato; a massa visceral contém a maioria dos órgãos internos; e o manto recobre a massa visceral e pode produzir a concha. Nos cefalópodes, como polvos e lulas, o pé é modificado e está relacionado à formação dos braços ou tentáculos e ao mecanismo de locomoção por jato de água.</li>
                    <li><strong>Manto e concha:</strong>  o manto é uma dobra de tecido que recobre a massa visceral e, nas espécies que possuem concha, secreta as substâncias que a formam. Entre o manto e o corpo existe a cavidade do manto, onde geralmente se encontram as brânquias nos moluscos aquáticos. Essa cavidade também participa de outras funções, dependendo da espécie. A concha oferece proteção e, em muitos moluscos terrestres, ajuda a reduzir a perda de água.</li>
                    <li><strong>Revestimento corporal:</strong> a superfície do corpo geralmente apresenta células que produzem muco. Essa substância ajuda a manter a superfície úmida e facilita o deslocamento de animais como caracóis e lesmas. Em diversas espécies, cílios microscópicos também participam da movimentação de partículas e da circulação de água. </li>
                    <li><strong>Sistema digestório completo:</strong> possuem sistema digestório com boca e ânus, permitindo que o alimento percorra o tubo digestório em um único sentido. A alimentação varia conforme a espécie: existem moluscos herbívoros, carnívoros e filtradores. Os bivalves, como ostras e mexilhões, retiram partículas alimentares da água, enquanto polvos são predadores.</li>
                </ul>
            </div>
        </section>

        <section id="intro-etapa-1" class="introducao-filo" style="display: none;">
            <div class="bloco-introducao">
                <ul>
                    <li><strong>Rádula:</strong> a maioria dos moluscos apresenta uma estrutura chamada rádula, semelhante a uma língua com pequenos dentes, utilizada para raspar ou fragmentar alimentos. Ela é comum em gastrópodes, como caracóis, e está presente nos cefalópodes. Entretanto, os bivalves, como ostras e mexilhões, não possuem rádula e geralmente se alimentam por filtração.</li>
                    <li><strong>Sistema circulatório:</strong>  na maioria dos moluscos, a circulação é aberta, ou seja, o líquido circulatório, chamado hemolinfa, sai dos vasos e passa por espaços entre os tecidos antes de retornar ao coração. Os cefalópodes, como polvos e lulas, são uma exceção, pois apresentam circulação fechada, na qual o sangue permanece dentro dos vasos. O coração impulsiona o líquido circulatório pelo corpo.</li>
                    <li><strong>Respiração:</strong>  as estruturas respiratórias variam conforme a espécie e o ambiente. Muitos moluscos aquáticos realizam trocas gasosas por brânquias, que retiram oxigênio da água. Em vários moluscos terrestres, como alguns caracóis, a cavidade do manto funciona como um pulmão, permitindo a troca de gases com o ar. Em algumas espécies, as trocas gasosas também ocorrem pela superfície corporal.</li>
                    <li><strong>Sistema excretor:</strong>  a eliminação de resíduos metabólicos é realizada por órgãos chamados metanefrídios, que atuam na filtragem de líquidos corporais e na retirada de substâncias que precisam ser eliminadas. Geralmente, esses órgãos estão relacionados à cavidade do manto, por onde os resíduos são liberados para o ambiente.</li>
                    <li><strong>Sistema nervoso e órgãos sensoriais:</strong> possuem sistema nervoso formado por gânglios nervosos e cordões nervosos, responsáveis pela coordenação das funções corporais. Também apresentam estruturas sensoriais que permitem perceber estímulos do ambiente, como toque, substâncias químicas e alterações de posição. Nos cefalópodes, como polvos e lulas, o sistema nervoso é bastante desenvolvido, assim como os olhos, que permitem uma visão eficiente. </li>
                    <li><strong>Reprodução sexuada:</strong>  a reprodução ocorre, geralmente, pela união de gametas masculinos e femininos. A maioria das espécies possui sexos separados, com indivíduos machos e fêmeas, mas existem moluscos hermafroditas, como algumas espécies de caracóis. A fecundação pode ser interna ou externa, dependendo da espécie.</li>
                    <li><strong>Desenvolvimento embrionário:</strong> algumas espécies apresentam desenvolvimento direto, no qual o jovem nasce ou sai do ovo com características semelhantes às do adulto. Outras apresentam desenvolvimento indireto, com fases larvais. Entre as larvas encontradas em determinados grupos estão a trocófora e a véliger, que participam do desenvolvimento e da dispersão desses animais.</li>
                    <li><strong> Principais grupos de moluscos:</strong> os três grupos mais estudados no Ensino Médio são os gastrópodes, os bivalves e os cefalópodes. Os gastrópodes incluem caracóis, caramujos e lesmas; os bivalves incluem ostras, mexilhões e vieiras; e os cefalópodes incluem polvos e lulas. Esses grupos apresentam diferenças na organização do corpo, na alimentação e na locomoção.</li>
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

        modelo.src = "Modelos3d/caracolMolusco.glb";
        tituloEsquerda.textContent = "Características do caracol";
        textoEsquerda.textContent = "Concha espiralada: a maioria dos caracóis apresenta uma concha externa espiralada, que protege o corpo mole. Diferentemente das vieiras, que possuem duas valvas, os caracóis geralmente apresentam uma única concha.";
        tituloDireita.textContent = "Características";
        textoDireita.textContent = "Podem se proteger dentro da concha: quando se sentem ameaçados, retraem o corpo para dentro da concha. Algumas espécies também conseguem fechar sua abertura com uma estrutura chamada opérculo, enquanto outras utilizam diferentes mecanismos de proteção.";

    }else if (e === 3) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/caracolMolusco.glb";
        tituloEsquerda.textContent = "Características do caracol:";
        textoEsquerda.textContent = "Cabeça com tentáculos: possuem uma cabeça bem definida, com tentáculos sensoriais. Nos caracóis terrestres mais conhecidos, os olhos ficam nas extremidades do par de tentáculos mais longos.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Apresentam grande diversidade de habitats: existem caracóis terrestres, de água doce e marinhos. Cada grupo apresenta adaptações relacionadas ao ambiente em que vive, especialmente em relação à respiração e à conservação da água no corpo.";

    }else if (e === 4) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/caracolMolusco.glb";
        tituloEsquerda.textContent = "Características do caracol";
        textoEsquerda.textContent = "Locomoção por pé muscular: deslocam-se deslizando sobre uma superfície por meio de um pé muscular, com auxílio do muco produzido pelo corpo. Diferentemente das lulas, não nadam por propulsão a jato.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Algumas espécies são hermafroditas: determinados caracóis possuem órgãos reprodutores masculinos e femininos no mesmo indivíduo. Mesmo assim, muitas espécies precisam acasalar com outro indivíduo para realizar a fecundação.";

    }else if (e === 5) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/caracolMolusco.glb";
        tituloEsquerda.textContent = "Características do caracol";
        textoEsquerda.textContent = "Rádula para alimentação: utilizam uma estrutura com pequenos dentes para raspar o alimento. Muitas espécies alimentam-se de vegetais e algas, embora existam caracóis com outros hábitos alimentares.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "São mais ativos em condições úmidas: muitos caracóis terrestres apresentam maior atividade durante períodos úmidos, como após a chuva, pois a umidade ajuda a reduzir a perda de água pelo corpo.";

    }else if (e === 6) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Vieira.glb";
        tituloEsquerda.textContent = "Características da Vieira";
        textoEsquerda.textContent = "Concha com duas valvas: as vieiras possuem uma concha formada por duas partes articuladas, característica dos moluscos bivalves. Diferentemente dos caracóis, não apresentam uma cabeça bem definida nem uma rádula.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Alimentação por filtração: retiram partículas alimentares da água, como organismos microscópicos e matéria orgânica. As brânquias participam tanto da alimentação quanto das trocas gasosas.";

    }else if (e === 7) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Vieira.glb";
        tituloEsquerda.textContent = "Características da vieira";
        textoEsquerda.textContent = "Alimentação por filtração: retiram partículas alimentares da água, como organismos microscópicos e matéria orgânica. As brânquias participam tanto da alimentação quanto das trocas gasosas.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Seus olhos possuem uma estrutura incomum: em algumas espécies, os olhos utilizam pequenos espelhos internos para direcionar a luz e contribuir para a formação de imagens, um mecanismo diferente daquele encontrado nos olhos humanos.";

    }else if (e === 8) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Vieira.glb";
        tituloEsquerda.textContent = "Características da Vieira";
        textoEsquerda.textContent = " Olhos na borda do manto: muitas espécies apresentam numerosos olhos pequenos distribuídos ao longo da borda do manto. Eles ajudam a detectar mudanças de luz e movimentos no ambiente.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " São utilizadas na alimentação humana: o músculo adutor é uma das partes mais consumidas das vieiras. Esses moluscos possuem importância econômica e podem ser obtidos por pesca ou cultivo.";

    }else if (e === 9) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Vieira.glb";
        tituloEsquerda.textContent = "Características da vieira";
        textoEsquerda.textContent = "Capacidade de nadar: apesar de serem bivalves, muitas vieiras conseguem nadar por curtas distâncias, abrindo e fechando rapidamente as valvas para expulsar água. Isso as diferencia de muitos outros bivalves, como ostras adultas, que permanecem fixas ao substrato.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "A concha ajuda na identificação das espécies: o formato, a coloração, as nervuras e o tamanho das valvas variam entre as espécies, sendo características importantes para diferenciar esses animais.";

    }else if (e === 10) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Lula.glb";
        tituloEsquerda.textContent = "Características da lula";
        textoEsquerda.textContent = "Corpo alongado e concha interna: as lulas possuem corpo adaptado à natação e não apresentam concha externa. Em muitas espécies, existe uma estrutura interna fina chamada gládio, que auxilia na sustentação do corpo.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Podem mudar de cor: muitas espécies possuem células pigmentares chamadas cromatóforos, que permitem modificar rapidamente a coloração e os padrões da pele. Essa capacidade pode ser utilizada para camuflagem, comunicação e interação com outros animais.";

    }else if (e === 11) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Lula.glb";
        tituloEsquerda.textContent = "Características da lula";
        textoEsquerda.textContent = "Oito braços e dois tentáculos: apresentam oito braços mais curtos e dois tentáculos geralmente mais longos, utilizados para capturar presas. Essa organização permite diferenciá-las dos polvos, que possuem oito braços e não apresentam o mesmo par de tentáculos longos especializados.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "- Liberam tinta para se defender: muitas lulas possuem uma bolsa de tinta que libera um líquido escuro na água quando se sentem ameaçadas. Essa nuvem pode confundir o predador e facilitar a fuga.";

    }else if (e === 12) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Lula.glb";
        tituloEsquerda.textContent = "Características da lula";
        textoEsquerda.textContent = " Locomoção por jato de água: expulsam água pelo sifão, produzindo propulsão. Esse mecanismo permite deslocamentos rápidos e mudanças de direção.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Possuem três corações: apresentam dois corações branquiais, que bombeiam o sangue em direção às brânquias, e um coração sistêmico, que distribui o sangue pelo restante do corpo. Seu sangue contém hemocianina, uma proteína com cobre que pode apresentar coloração azulada quando oxigenada.";

    }else if (e === 13) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Lula.glb";
        tituloEsquerda.textContent = "Características da lula";
        textoEsquerda.textContent = " Bico e alimentação predadora: são carnívoras e capturam animais como peixes e crustáceos. Possuem um bico resistente que ajuda a cortar as presas e uma rádula que auxilia no processamento do alimento.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Algumas espécies produzem luz: determinadas lulas possuem órgãos luminosos chamados fotóforos, que produzem luz por meio de reações químicas ou com a participação de bactérias. A bioluminescência pode ajudar na camuflagem, na comunicação ou na atração de presas, dependendo da espécie.";

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
    if (etapa < 13) { 
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