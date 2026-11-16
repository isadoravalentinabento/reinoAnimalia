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
            <h1>Conhecendo o Filo dos Artópodes</h1>
            <h2>Características do filo:</h2>
        </div>
        
       <section id="intro-etapa-0" class="introducao-filo">
            <div class="bloco-introducao">
                <ul>
                    <li><strong>Simetria bilateral:</strong> apresentam um corpo que pode ser dividido em duas metades aproximadamente equivalentes por um plano longitudinal. Essa organização é comum aos artrópodes, como formigas, aranhas, caranguejos e lacraias.</li>
                    <li><strong>Corpo segmentado:</strong> o corpo é formado por segmentos que, ao longo da evolução, se agruparam em regiões especializadas. Nos insetos, é dividido em cabeça, tórax e abdômen; nos aracnídeos e em muitos crustáceos, geralmente apresenta cefalotórax e abdômen; já nos miriápodes, como lacraias e piolhos-de-cobra, apresenta cabeça e tronco alongado.</li>
                    <li><strong>Apêndices articulados:</strong> possuem estruturas articuladas, como patas, antenas e peças bucais, que permitem movimentos variados. Esses apêndices podem desempenhar funções de locomoção, alimentação, percepção de estímulos, defesa e reprodução. A quantidade e o formato variam conforme o grupo.</li>
                    <li><strong>Exoesqueleto de quitina:</strong> o corpo é revestido por um esqueleto externo resistente, composto principalmente por quitina e proteínas. Nos crustáceos, o exoesqueleto frequentemente também contém sais de cálcio, que aumentam sua rigidez. Essa estrutura protege o corpo, oferece sustentação e serve de ponto de fixação para os músculos.</li>
                    <li><strong>Muda ou ecdise:</strong> como o exoesqueleto rígido não cresce continuamente junto com o corpo, os artrópodes precisam trocá-lo em determinados momentos. Durante esse processo, o animal abandona o exoesqueleto antigo e forma outro, permitindo o crescimento. Enquanto o novo revestimento ainda está endurecendo, o corpo fica mais vulnerável.</li>
                    <li><strong>Sistema muscular desenvolvido:</strong> os músculos ficam ligados à parte interna do exoesqueleto e permitem movimentos precisos e variados. Essa organização possibilita atividades como caminhar, saltar, nadar e, em muitos insetos, voar.</li>
                    <li><strong>Sistema digestório completo:</strong> possuem boca e ânus, com um tubo digestório que permite a passagem do alimento em um único sentido. As peças bucais variam de acordo com a alimentação: alguns artrópodes trituram alimentos sólidos, enquanto outros apresentam estruturas adaptadas para sugar líquidos ou capturar presas.</li>
                </ul>
            </div>
        </section>

        <section id="intro-etapa-1" class="introducao-filo" style="display: none;">
            <div class="bloco-introducao">
                <ul>
                    <li><strong>Sistema circulatório aberto:</strong> possuem um coração que bombeia a hemolinfa, líquido circulatório que percorre parte do corpo e banha diretamente os tecidos em espaços chamados lacunas ou seios. Diferentemente da circulação fechada, o líquido não permanece exclusivamente dentro de vasos sanguíneos.</li>
                    <li><strong>Respiração variada:</strong> as estruturas respiratórias dependem do grupo e do ambiente. Muitos crustáceos respiram por brânquias; os insetos utilizam traqueias, que conduzem o ar diretamente aos tecidos; e diversos aracnídeos apresentam traqueias ou pulmões foliáceos. Em espécies muito pequenas, também pode ocorrer troca gasosa pela superfície corporal. </li>
                    <li><strong>Sistema excretor: </strong>  os órgãos responsáveis pela eliminação de resíduos variam entre os grupos. Muitos insetos e aracnídeos possuem túbulos de Malpighi, enquanto diversos crustáceos apresentam glândulas antenais, também chamadas glândulas verdes. Essas estruturas eliminam resíduos metabólicos e participam do equilíbrio de água e sais no organismo.</li>
                    <li><strong>Sistema nervoso e órgãos sensoriais:</strong> apresentam um cérebro formado por gânglios nervosos e um cordão nervoso ventral, responsáveis pela coordenação das funções corporais. Muitos possuem antenas e pelos sensoriais que detectam estímulos do ambiente. Dependendo do grupo, também apresentam olhos simples ou olhos compostos, formados por numerosas unidades visuais.</li>
                    <li><strong>Reprodução sexuada:</strong> geralmente apresentam sexos separados, com indivíduos machos e fêmeas. A fecundação pode ser interna ou, em alguns grupos, externa. A maioria põe ovos, mas existem espécies com outras formas de desenvolvimento e reprodução.</li>
                    <li><strong>Desenvolvimento e metamorfose:</strong> muitos artrópodes passam por mudanças corporais durante o desenvolvimento. Nos insetos, a metamorfose pode ser incompleta, como nos gafanhotos, ou completa, como nas borboletas, que passam pelas fases de ovo, larva, pupa e adulto. Entretanto, nem todos os artrópodes apresentam metamorfose.</li>
                    <li><strong>Grande diversidade de espécies:</strong>  os artrópodes constituem o filo animal com maior diversidade conhecida de espécies. Ocupam ambientes terrestres, aquáticos e aéreos e desempenham funções ecológicas importantes, como polinização, decomposição da matéria orgânica, participação nas cadeias alimentares e controle de populações de outros organismos.</li>
                    <li><strong>Insetos:</strong> possuem três pares de patas, um par de antenas e corpo geralmente dividido em cabeça, tórax e abdômen. Exemplos: abelhas, formigas, besouros e borboletas.</li>
                    <li><strong>Aracnídeos:</strong> possuem quatro pares de patas nos adultos, não apresentam antenas e geralmente têm o corpo dividido em cefalotórax e abdômen. Exemplos: aranhas, escorpiões, carrapatos e ácaros.</li>
                    <li><strong>Crustáceos:</strong> em geral, possuem dois pares de antenas e apresentam principalmente respiração por brânquias. A maioria vive em ambientes aquáticos, mas existem espécies terrestres, como o tatuzinho-de-jardim. Exemplos: camarões, caranguejos e lagostas.</li>
                    <li><strong>Quilópodes</strong> apresentam corpo alongado, um par de patas por segmento do tronco e um par de antenas. São representados pelas lacraias e centopeias.</li>
                    <li><strong>Diplópodes:</strong> possuem corpo alongado e, na maioria dos segmentos do tronco, dois pares de patas. São representados pelos piolhos-de-cobra, também chamados de embuás.</li>
                    <li><strong> </strong> </li>
                    <li><strong> </strong> </li>

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

        modelo.src = "Modelos3d/Aranha.glb";
        tituloEsquerda.textContent = "Características da Aranha";
        textoEsquerda.textContent = " Corpo dividido em cefalotórax e abdômen: as aranhas apresentam o corpo dividido em duas regiões principais. O cefalotórax reúne a cabeça e o tórax, enquanto o abdômen contém diversos órgãos internos.  Quatro pares de pernas: possuem oito pernas articuladas, característica dos aracnídeos. Essas estruturas permitem caminhar, escalar superfícies e capturar presas.";
        tituloDireita.textContent = "Características";
        textoDireita.textContent = "Nem todas constroem teias para caçar: algumas espécies capturam presas utilizando teias, enquanto outras perseguem suas vítimas ou esperam escondidas para atacá-las.";

    }else if (e === 3) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Aranha.glb";
        tituloEsquerda.textContent = "Características:";
        textoEsquerda.textContent = "Ausência de antenas e asas: diferentemente dos insetos, as aranhas não possuem antenas nem asas. Também apresentam quelíceras, estruturas próximas à boca que ajudam na alimentação e que, em muitas espécies, estão associadas à inoculação de veneno.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " A seda possui diferentes funções: além de capturar alimentos, pode ser utilizada para construir abrigos, proteger ovos e auxiliar no deslocamento de algumas espécies.";

    }else if (e === 4) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Aranha.glb";
        tituloEsquerda.textContent = "Características da Aranha";
        textoEsquerda.textContent = " Produção de seda: possuem estruturas chamadas fiandeiras, localizadas na extremidade do abdômen, que produzem fios de seda. Esse material é utilizado na construção de teias, na proteção dos ovos e em outras atividades.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Possuem diferentes tipos de olhos: muitas aranhas apresentam oito olhos simples, mas a quantidade varia entre as espécies. A visão também varia, sendo bastante desenvolvida em algumas aranhas caçadoras.";

    }else if (e === 5) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Aranha.glb";
        tituloEsquerda.textContent = "Características da Aranha";
        textoEsquerda.textContent = " Alimentação carnívora: alimentam-se principalmente de insetos e outros pequenos animais. Muitas utilizam veneno para imobilizar as presas e liberam substâncias digestivas que ajudam a liquefazer os tecidos antes de ingerir o alimento.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Ajudam a controlar populações de insetos: por serem predadoras, contribuem para o equilíbrio ecológico, limitando a quantidade de determinados animais no ambiente.";

    }else if (e === 6) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Aranha.glb";
        tituloEsquerda.textContent = "Características da Aranha";
        textoEsquerda.textContent = "Respiração por estruturas especializadas: dependendo da espécie, as trocas gasosas ocorrem por meio de pulmões foliáceos, traqueias ou uma combinação dessas estruturas";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Realizam a ecdise: para crescer, precisam trocar o exoesqueleto rígido por outro maior. Durante esse processo, ficam mais vulneráveis até que o novo revestimento endureça.";

    }else if (e === 7) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Caranguejo.glb";
        tituloEsquerda.textContent = "Características do caranguejo";
        textoEsquerda.textContent = "Corpo dividido em cefalotórax e abdômen: nos caranguejos, a cabeça e o tórax são unidos e protegidos por uma carapaça. O abdômen é reduzido e fica dobrado sob o cefalotórax, deixando o corpo mais compacto.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Muitos caminham de lado: a disposição das pernas e suas articulações favorecem esse tipo de deslocamento em diversas espécies, embora nem todos se movimentem exclusivamente dessa maneira.";

    }else if (e === 8) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Caranguejo.glb";
        tituloEsquerda.textContent = "Características do caranguejo";
        textoEsquerda.textContent = "Cinco pares de apêndices torácicos: a maioria possui dez apêndices utilizados principalmente na locomoção. O primeiro par geralmente forma as pinças, enquanto os outros quatro pares são usados para caminhar.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Precisam trocar o exoesqueleto para crescer: durante a ecdise, abandonam a cobertura antiga e formam outra. Nesse período, o corpo fica mais vulnerável até o endurecimento do novo exoesqueleto.";

    }else if (e === 9) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Caranguejo.glb";
        tituloEsquerda.textContent = "Características do caranguejo";
        textoEsquerda.textContent = "Dois pares de antenas: como outros crustáceos, possuem quatro antenas no total, organizadas em dois pares. Essas estruturas auxiliam na percepção de estímulos químicos e táteis do ambiente.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Podem regenerar apêndices perdidos: algumas espécies conseguem recuperar pernas ou pinças ao longo de mudas posteriores, embora a regeneração possa ocorrer gradualmente.";

    }else if (e === 10) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Caranguejo.glb";
        tituloEsquerda.textContent = "Características do caranguejo";
        textoEsquerda.textContent = " Exoesqueleto reforçado: a cobertura externa contém quitina e frequentemente sais de cálcio, formando uma estrutura rígida que protege o corpo e oferece sustentação.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "As pinças possuem diferentes funções: são utilizadas na alimentação, na defesa, na disputa por território e, em algumas espécies, em comportamentos de comunicação.";

    }else if (e === 11) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Caranguejo.glb";
        tituloEsquerda.textContent = "Características do caranguejo";
        textoEsquerda.textContent = "Respiração por brânquias: a maioria realiza trocas gasosas por meio de brânquias. Mesmo espécies adaptadas a ambientes terrestres geralmente precisam manter essas estruturas úmidas. Alimentação variada: dependendo da espécie, podem consumir algas, pequenos animais, restos de organismos e outros materiais disponíveis no ambiente.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Vivem em diferentes ambientes: existem caranguejos marinhos, de água doce e espécies adaptadas à vida terrestre. Suas adaptações variam conforme o ambiente em que vivem.";
    }else if (e === 12) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/PiolhoDeCobra.glb";
        tituloEsquerda.textContent = "Características do Piolho de Cobra";
        textoEsquerda.textContent = " Corpo alongado e dividido em segmentos: os piolhos-de-cobra pertencem à classe Diplopoda e apresentam numerosos segmentos corporais, geralmente formando um corpo cilíndrico. Essa organização permite a movimentação coordenada das numerosas pernas.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Contribuem para a formação do solo: ao fragmentarem restos vegetais e ingerirem matéria orgânica, ajudam na decomposição e na reciclagem de nutrientes nos ecossistemas terrestres.";
    }
    else if (e === 13) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/PiolhoDeCobra.glb";
        tituloEsquerda.textContent = "Características do Piolho de Cobra";
        textoEsquerda.textContent = " Dois pares de pernas na maioria dos segmentos: apresentam, em geral, dois pares de pernas por segmento aparente do tronco. Essa característica ajuda a diferenciá-los das lacraias, que possuem apenas um par por segmento.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Podem se enrolar como defesa: muitas espécies curvam o corpo ou formam uma espiral quando ameaçadas, protegendo as partes mais vulneráveis.";
    }else if (e === 14) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/PiolhoDeCobra.glb";
        tituloEsquerda.textContent = "Características do Piolho de Cobra";
        textoEsquerda.textContent = "Um par de antenas: utilizam as antenas para perceber estímulos do ambiente, auxiliando na orientação e na busca por alimento.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Algumas espécies liberam substâncias defensivas: determinados piolhos-de-cobra produzem secreções que podem ter cheiro forte ou causar irritação, ajudando a afastar predadores.";
    }else if (e === 15) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/PiolhoDeCobra.glb";
        tituloEsquerda.textContent = "Características do Piolho de Cobra";
        textoEsquerda.textContent = "Exoesqueleto resistente: possuem uma cobertura externa que protege o corpo contra lesões e contribui para a sustentação. Para crescer, precisam realizar a ecdise, trocando o exoesqueleto.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Não são iguais às lacraias: apesar da semelhança, os piolhos-de-cobra geralmente se alimentam de matéria orgânica em decomposição, enquanto as lacraias são predadoras.";
    }else if (e === 16) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/PiolhoDeCobra.glb";
        tituloEsquerda.textContent = "Características do Piolho de Cobra";
        textoEsquerda.textContent = " Alimentação principalmente detritívora: alimentam-se sobretudo de folhas mortas, madeira em decomposição e outros materiais orgânicos. Dessa forma, participam do processamento da matéria orgânica presente no solo. - Respiração por traqueias: realizam as trocas gasosas por meio de um sistema de tubos internos que conduz o ar diretamente aos tecidos do corpo.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Preferem ambientes úmidos: a umidade ajuda a reduzir a perda de água, por isso são frequentemente encontrados sob pedras, folhas e troncos em decomposição.";
    }else if (e === 17) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Lacraia.glb";
        tituloEsquerda.textContent = "Características da lacraia";
        textoEsquerda.textContent = "Corpo alongado e achatado: as lacraias pertencem à classe Chilopoda e apresentam corpo dividido em vários segmentos, geralmente com um par de pernas em cada segmento do tronco.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "São caçadoras ágeis: muitas espécies possuem movimentos rápidos e utilizam suas antenas para explorar o ambiente e localizar presas.";
    }else if (e === 18) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Lacraia.glb";
        tituloEsquerda.textContent = "Características da lacraia";
        textoEsquerda.textContent = " Um par de pernas por segmento: essa característica permite diferenciá-las dos piolhos-de-cobra, que normalmente apresentam dois pares de pernas na maioria dos segmentos do tronco";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Podem apresentar hábitos noturnos: diversas lacraias são mais ativas durante a noite, permanecendo escondidas durante o dia em locais úmidos e protegidos.";
    }else if (e === 19) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Lacraia.glb";
        tituloEsquerda.textContent = "Características da lacraia";
        textoEsquerda.textContent = "Primeiro par de apêndices transformado em forcípulas: próximo à cabeça, o primeiro par de apêndices forma estruturas semelhantes a pinças, ligadas a glândulas de veneno. Elas são utilizadas para capturar e imobilizar as presas.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " O veneno é utilizado na captura de presas: sua principal função é auxiliar na imobilização dos animais que servem de alimento. A mordida também pode causar dor e inchaço em seres humanos.";
    }else if (e === 20) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Lacraia.glb";
        tituloEsquerda.textContent = "Características da lacraia";
        textoEsquerda.textContent = "Antenas e órgãos sensoriais: possuem um par de antenas que auxilia na percepção do ambiente e na localização de alimento, especialmente em locais escuros.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " A quantidade de pernas varia: o número de pares de pernas depende da espécie, mas é sempre ímpar nas lacraias, ao contrário dos piolhos-de-cobra, que geralmente apresentam dois pares na maioria dos segmentos do tronco.";
    }else if (e === 21) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Lacraia.glb";
        tituloEsquerda.textContent = "Características da lacria";
        textoEsquerda.textContent = " Alimentação carnívora: são predadoras e alimentam-se de insetos, aranhas e outros pequenos animais. Utilizam as forcípulas para inocular veneno e facilitar a captura das presas. Respiração por traqueias: o ar entra por pequenas aberturas no corpo, chamadas espiráculos, e é conduzido por tubos até os tecidos.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Participam do equilíbrio ecológico: por se alimentarem de outros invertebrados, ajudam a regular populações de pequenos animais nos ambientes em que vivem.";
    }else if (e === 22) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Abelha.glb";
        tituloEsquerda.textContent = "Características da abelha";
        textoEsquerda.textContent = "Corpo dividido em três regiões: como os demais insetos, possuem cabeça, tórax e abdômen. A cabeça concentra estruturas sensoriais e alimentares, o tórax contém as pernas e as asas, e o abdômen abriga diversos órgãos internos.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "São importantes polinizadoras: ao transportarem pólen entre flores, contribuem para a reprodução de numerosas plantas e para a produção de alimentos, como frutas e sementes.";
    }else if (e === 22) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Abelha.glb";
        tituloEsquerda.textContent = "Características da abelha";
        textoEsquerda.textContent = "Três pares de pernas e um par de antenas: possuem seis pernas articuladas e duas antenas utilizadas para perceber estímulos do ambiente, como odores e movimentos.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Comunicam a localização de alimentos: abelhas melíferas podem realizar movimentos conhecidos como dança das abelhas, transmitindo informações sobre a direção e a distância de fontes de alimento.";
    }else if (e === 22) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Abelha.glb";
        tituloEsquerda.textContent = "Características da abelha";
        textoEsquerda.textContent = " Asas para o voo: geralmente apresentam dois pares de asas membranosas, responsáveis pelo deslocamento entre as flores e outros locais. Em algumas castas, como as operárias, estruturas das pernas ajudam no transporte do pólen";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Nem todas produzem mel: embora a produção de mel seja conhecida em algumas espécies, muitas abelhas não produzem quantidades armazenadas desse alimento e apresentam outros comportamentos de alimentação e reprodução.";
    }else if (e === 22) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Abelha.glb";
        tituloEsquerda.textContent = "Características da abelha";
        textoEsquerda.textContent = "Corpo adaptado à polinização: muitas espécies possuem pelos que facilitam a retenção dos grãos de pólen. Ao visitar diferentes flores em busca de alimento, podem transportar o pólen de uma flor para outra.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Existem diferentes formas de organização: algumas espécies vivem em sociedades complexas, enquanto outras constroem ninhos individuais e cuidam de sua própria prole.";
    }else if (e === 22) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Abelha.glb";
        tituloEsquerda.textContent = "Características da abelha";
        textoEsquerda.textContent = " Alimentação baseada em néctar e pólen: o néctar fornece principalmente energia, enquanto o pólen é uma importante fonte de proteínas e outros nutrientes, especialmente para o desenvolvimento das larvas. Organização social em algumas espécies: determinadas abelhas vivem em colônias com divisão de tarefas entre rainha, operárias e zangões. Entretanto, muitas espécies são solitárias e não formam colônias organizadas dessa maneira.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " A rainha não realiza todas as tarefas da colônia: nas colônias de abelhas melíferas, sua principal função é a reprodução, enquanto as operárias realizam atividades como cuidar das larvas, coletar alimentos e defender o ninho.";
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
    if (etapa < 22) { 
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