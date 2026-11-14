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
    <title>Filo - Cnidários</title>
    <link rel="stylesheet" href="css/filo02.css?v=4">
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
</head>
<body>
    <main id="main-container" class="area-intro">

        <button id="btn-voltar" class="btn-voltar-topo" style="display: none;">
            <img src="img/icons/left.png" alt="Voltar">
        </button>

        <div class="titulos">
            <h1>Conhecendo o Filo dos Cnidários</h1>
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
                src="Modelos3d/Coral.glb"
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

const mainContainer = document.getElementById("main-container");
const titulosContainer = document.querySelector(".titulos"); 

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

        modelo.src = "Modelos3d/Coral.glb";
        tituloEsquerda.textContent = "Características do Coral";
        textoEsquerda.textContent = "Organização colonial: muitos corais são formados por colônias de pequenos indivíduos chamados pólipos, que vivem conectados entre si. Esses indivíduos compartilham estruturas e contribuem para o funcionamento da colônia.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Formam ambientes de grande biodiversidade: os recifes de coral abrigam uma grande variedade de peixes, crustáceos, moluscos e outros organismos marinhos, oferecendo alimento, abrigo e proteção.";
    }else if (e === 3) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Coral.glb";
        tituloEsquerda.textContent = "Características do Coral";
        textoEsquerda.textContent = " Corpo em forma de pólipo: apresentam corpo cilíndrico, com a boca localizada na extremidade superior e rodeada por tentáculos. Esses tentáculos auxiliam na captura de alimentos.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Podem formar estruturas gigantescas: ao longo do tempo, o acúmulo de esqueletos calcários de diferentes gerações de corais pode originar grandes recifes.";
    } else if (e === 4) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Coral.glb";
        tituloEsquerda.textContent = "Características do Coral";
        textoEsquerda.textContent = "Esqueleto calcário: muitos corais produzem uma estrutura externa de carbonato de cálcio ao redor do corpo. Quando os pólipos morrem, seus esqueletos permanecem e podem servir de base para o desenvolvimento de novas gerações, contribuindo para a formação dos recifes.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Podem sofrer branqueamento: quando submetidos a condições ambientais desfavoráveis, como temperaturas elevadas, muitos corais perdem suas zooxantelas, ficando esbranquiçados. Esse processo pode comprometer sua sobrevivência.";
    }else if (e === 5) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Coral.glb";
        tituloEsquerda.textContent = "Características do Coral";
        textoEsquerda.textContent = "Fixação ao substrato: os pólipos geralmente permanecem fixos em superfícies, como rochas e estruturas calcárias. Essa característica permite o crescimento das colônias ao longo do tempo.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Existem diferentes tipos de recifes: podem ser classificados em recifes em franja, recifes em barreira e atóis, que apresentam diferentes formas e relações com a costa.";
    } else if (e === 6) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Coral.glb";
        tituloEsquerda.textContent = "Características do Coral";
        textoEsquerda.textContent = " Associação com zooxantelas: muitos corais vivem em associação com algas microscópicas chamadas zooxantelas, que permanecem em seus tecidos. Essas algas realizam fotossíntese e fornecem parte dos nutrientes utilizados pelos corais.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Contribuem para a proteção das regiões costeiras: os recifes ajudam a reduzir a força das ondas, diminuindo a erosão e protegendo áreas próximas à costa.";
    } else if (e === 7) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Coral.glb";
        tituloEsquerda.textContent = "Características do Coral";
        textoEsquerda.textContent = " Alimentação: capturam pequenos organismos e partículas alimentares por meio dos tentáculos. Nas espécies que possuem zooxantelas, parte da nutrição também depende dos produtos da fotossíntese dessas algas.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Possuem importância econômica: contribuem para atividades como pesca e turismo, além de apresentarem importância para pesquisas científicas e conservação ambiental.";
    } else if (e === 8) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Coral.glb";
        tituloEsquerda.textContent = "Características do Coral";
        textoEsquerda.textContent = "Reprodução: podem reproduzir-se por meio de processos sexuados e assexuados. A reprodução assexuada permite o crescimento e a expansão das colônias.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "São animais, não plantas: apesar de permanecerem fixos e apresentarem aparência semelhante à de vegetais, os corais são animais que possuem tecidos e células especializadas.";
    } else if (e === 9) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Coral.glb";
        tituloEsquerda.textContent = "Características do Coral";
        textoEsquerda.textContent = "Classificação: os corais pertencem à classe Anthozoa, do filo Cnidaria. Esse grupo apresenta exclusivamente a forma de pólipo, não possuindo fase medusa.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "";
    } else if (e === 10) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Anemona.glb";
        tituloEsquerda.textContent = "Características da anêmona do Mar";
        textoEsquerda.textContent = "Organização corporal em pólipo: apresentam corpo cilíndrico, com uma extremidade geralmente fixada ao substrato e outra contendo a boca, rodeada por tentáculos. Essa organização é característica da classe Anthozoa, à qual pertencem.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Mutualismo com o peixe-palhaço: essa associação beneficia ambos os animais. O peixe-palhaço encontra proteção entre os tentáculos da anêmona, enquanto ela recebe nutrientes provenientes dos restos de alimento e dos excrementos do peixe.";  
    }else if (e === 11) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Anemona.glb";
        tituloEsquerda.textContent = "Características da anêmona do Mar";
        textoEsquerda.textContent = " Vida solitária: a maioria das anêmonas-do-mar vive como indivíduos isolados, embora possam ser encontradas em agrupamentos, especialmente em decorrência da reprodução assexuada.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Associação com o caranguejo-eremita: algumas anêmonas vivem sobre as conchas utilizadas pelos caranguejos-eremitas. Quando o caranguejo troca de concha, transfere a anêmona para a nova, mantendo a associação. A anêmona oferece proteção contra predadores, enquanto o caranguejo facilita seu deslocamento e a obtenção de alimento.";  
    } else if (e === 12) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Anemona.glb";
        tituloEsquerda.textContent = "Características da anêmona do Mar";
        textoEsquerda.textContent = "Habitat marinho: vivem em ambientes marinhos, podendo ser encontradas em regiões entre marés, recifes, costões rochosos e ilhas oceânicas. Algumas espécies também habitam manguezais.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Formação de agrupamentos: embora geralmente sejam solitárias, algumas anêmonas podem formar agrupamentos por meio da reprodução assexuada, originando novos indivíduos próximos uns dos outros.";  
    }else if (e === 13) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Anemona.glb";
        tituloEsquerda.textContent = "Características da anêmona do Mar";
        textoEsquerda.textContent = "Corpo mole e sem esqueleto calcário: apresentam corpo flexível, sem o esqueleto calcário característico de muitos corais. Sua estrutura corporal permite a contração e a retração.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Deslocamento lento: apesar de permanecerem fixadas ao substrato durante grande parte da vida, algumas espécies conseguem se deslocar lentamente, buscando condições mais favoráveis à sobrevivência.";  
    }else if (e === 14) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Anemona.glb";
        tituloEsquerda.textContent = "Características da anêmona do Mar";
        textoEsquerda.textContent = "Tentáculos com cnidócitos: possuem tentáculos ao redor da boca, contendo células especializadas com estruturas urticantes. Essas estruturas liberam substâncias que ajudam a paralisar as presas e facilitam sua captura.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Diferentes estratégias reprodutivas: além da reprodução sexuada, podem se reproduzir assexuadamente por brotamento ou fissão, processos que permitem a formação de novos indivíduos.";  
    }else if (e === 15) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Anemona.glb";
        tituloEsquerda.textContent = "Características da anêmona do Mar";
        textoEsquerda.textContent = "Alimentação carnívora: alimentam-se principalmente de pequenos animais marinhos, como peixes e crustáceos. Utilizam os tentáculos para capturar as presas e conduzi-las até a boca.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Capacidade de retração: quando necessário, muitas anêmonas conseguem retrair seus tentáculos e contrair o corpo, adquirindo uma aparência semelhante a um pedaço de gelatina.";  
    }else if (e === 16) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Anemona.glb";
        tituloEsquerda.textContent = "Características da anêmona do Mar";
        textoEsquerda.textContent = "Fixação ao substrato: geralmente permanecem fixadas em rochas ou outras superfícies por meio de uma estrutura localizada na base do corpo. Entretanto, algumas espécies conseguem deslocar-se lentamente em busca de condições mais favoráveis.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Também são presas: apesar de serem predadoras, as anêmonas podem servir de alimento para outros animais, como lesmas marinhas, estrelas-do-mar e alguns peixes.";  
    }else if (e === 17) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Anemona.glb";
        tituloEsquerda.textContent = "Características da anêmona do Mar";
        textoEsquerda.textContent = "Reprodução sexuada e assexuada: podem reproduzir-se por meio da formação de gametas ou por processos assexuados, como brotamento e fissão, que permitem originar novos indivíduos.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "";  
    }else if (e === 18) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/aguaviva.glb";
        tituloEsquerda.textContent = "Características da água-viva";
        textoEsquerda.textContent = "Sistema digestório: possuem uma cavidade gastrovascular com uma única abertura, utilizada tanto para a entrada de alimentos quanto para a eliminação de resíduos.";
        tituloDireita.textContent = "Características";
        textoDireita.textContent = "Alimentação: são predominantemente carnívoras, capturando pequenos organismos aquáticos, como plâncton e outras presas."; 
    }else if (e === 19) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/aguaviva.glb";
        tituloEsquerda.textContent = "Características da água-viva";
        textoEsquerda.textContent = "Locomoção: deslocam-se por meio de contrações rítmicas do corpo, que impulsionam a água e permitem seu movimento. Também podem ser transportadas pelas correntes marinhas.";
        tituloDireita.textContent = "Características";
        textoDireita.textContent = "Sistema nervoso: não possuem cérebro, apresentando uma rede nervosa difusa e estruturas sensoriais capazes de detectar estímulos, como luz e substâncias químicas.";
    }else if (e === 20) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/aguaviva.glb";
        tituloEsquerda.textContent = "Características da água-viva";
        textoEsquerda.textContent = "Ausência de sistemas especializados: não possuem sistemas circulatório, respiratório ou excretor, realizando trocas de substâncias diretamente com o ambiente.";
        tituloDireita.textContent = "Características";
        textoDireita.textContent = "Reprodução: apresentam reprodução sexuada e, em muitos grupos, alternância entre uma fase de pólipo, geralmente séssil e assexuada, e uma fase de medusa, geralmente livre e sexuada.";
    }else if (e === 21) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/aguaviva.glb";
        tituloEsquerda.textContent = "Características da água-viva";
        textoEsquerda.textContent = "Classificação: são animais invertebrados pertencentes ao filo Cnidaria, sendo a forma medusoide característica de diferentes grupos desse filo.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Corpo composto principalmente por água: aproximadamente 95% do corpo das águas-vivas é formado por água, contribuindo para sua aparência gelatinosa.";
    }else if (e === 22) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/aguaviva.glb";
        tituloEsquerda.textContent = "Características da água-viva";
        textoEsquerda.textContent = "Habitat: vivem principalmente em ambientes marinhos, ocupando diferentes profundidades e regiões dos oceanos.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Existem há centenas de milhões de anos: fósseis indicam que esses animais já existiam há aproximadamente 500 a 600 milhões de anos, sendo organismos muito antigos na história evolutiva.";
    }else if (e === 23) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/aguaviva.glb";
        tituloEsquerda.textContent = "Características da água-viva";
        textoEsquerda.textContent = "Simetria radial: apresentam o corpo organizado ao redor de um eixo central, permitindo perceber estímulos provenientes de diferentes direções.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Algumas produzem luz: determinadas espécies apresentam bioluminescência, capacidade de produzir luz própria. Essa característica pode auxiliar na defesa contra predadores, na atração de presas e na reprodução.";
    }else if (e === 24) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/aguaviva.glb";
        tituloEsquerda.textContent = "Características da água-viva";
        textoEsquerda.textContent = "Organização corporal: são animais diblásticos, com duas camadas de tecidos, a epiderme e a gastroderme, separadas por uma camada gelatinosa chamada mesogleia.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Podem causar queimaduras mesmo depois de mortas: os tentáculos de águas-vivas encalhadas podem continuar apresentando células urticantes capazes de provocar irritações ao entrar em contato com a pele.";
    }else if (e === 25) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/aguaviva.glb";
        tituloEsquerda.textContent = "Características da água-viva";
        textoEsquerda.textContent = "Formato do corpo: possuem corpo semelhante a um sino ou guarda-chuva, com a boca localizada na parte inferior e tentáculos ao redor da região oral.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Existe uma espécie gigante: a água-viva-juba-de-leão (Cyanea capillata) é considerada uma das maiores águas-vivas conhecidas, podendo apresentar tentáculos muito longos.";
    }else if (e === 26) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/aguaviva.glb";
        tituloEsquerda.textContent = "Características da água-viva";
        textoEsquerda.textContent = "Tentáculos e cnidócitos: apresentam tentáculos com células especializadas chamadas cnidócitos, que liberam estruturas urticantes utilizadas na captura de presas e na defesa.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Uma das águas-vivas mais perigosas: a vespa-do-mar (Chironex fleckeri) é conhecida por possuir veneno extremamente potente, sendo considerada uma das espécies mais perigosas para os seres humanos.";
    }else if (e === 27) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/hidra.glb";
        tituloEsquerda.textContent = "Características da hidra";
        textoEsquerda.textContent = "Habitat: vive exclusivamente em ambientes de água doce, como lagos, lagoas e riachos de correnteza lenta, geralmente fixada em plantas aquáticas, pedras ou outros objetos submersos.";
        tituloDireita.textContent = "Características";
        textoDireita.textContent = "Organização corporal: apresenta corpo cilíndrico e alongado, formado por duas camadas celulares, a epiderme e a gastroderme, separadas pela mesogleia.";
    }else if (e === 28) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/hidra.glb";
        tituloEsquerda.textContent = "Características da hidra";
        textoEsquerda.textContent = " Simetria radial: possui corpo organizado ao redor de um eixo central, característica comum aos cnidários.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Regeneração extraordinária: quando dividida em partes, cada fragmento suficientemente viável pode reorganizar seus tecidos e desenvolver uma nova hidra completa, incluindo estruturas como tentáculos e disco basal.";
    }else if (e === 29) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/hidra.glb";
        tituloEsquerda.textContent = "Características da hidra";
        textoEsquerda.textContent = "Tamanho: é um animal pequeno, geralmente com poucos milímetros de comprimento, podendo atingir aproximadamente 20 mm quando estendido.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Associada à ideia de imortalidade biológica: algumas espécies de hidra apresentam ausência aparente de envelhecimento em condições adequadas, sendo estudadas para compreender os mecanismos de renovação celular. Isso não significa que sejam invulneráveis ou incapazes de morrer.";
    }else if (e === 30) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/hidra.glb";
        tituloEsquerda.textContent = "Características da hidra";
        textoEsquerda.textContent = "Região basal: apresenta um disco basal que permite sua fixação ao substrato por meio de uma secreção adesiva.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "A hidra-verde possui uma associação com algas: a espécie Hydra viridissima abriga algas verdes do gênero Chlorella em seus tecidos. As algas realizam fotossíntese e fornecem nutrientes, enquanto a hidra oferece proteção e condições para sua sobrevivência.";
    }else if (e === 31) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/hidra.glb";
        tituloEsquerda.textContent = "Características da hidra";
        textoEsquerda.textContent = "Tentáculos e cnidócitos: possui tentáculos ao redor da abertura oral, utilizados na captura de alimentos e na defesa. Neles estão os cnidócitos, células urticantes que liberam nematocistos capazes de imobilizar pequenas presas.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Consegue realizar movimentos semelhantes a cambalhotas: pode se curvar, prender os tentáculos ao substrato e deslocar o disco basal, realizando movimentos conhecidos como cambalhotas.";
    }else if (e === 32) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/hidra.glb";
        tituloEsquerda.textContent = "Características da hidra";
        textoEsquerda.textContent = " Sistema digestório: possui cavidade gastrovascular com uma única abertura, utilizada tanto para a ingestão de alimentos quanto para a eliminação de resíduos.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Pode sobreviver a condições ambientais desfavoráveis por meio de ovos resistentes: os ovos produzidos na reprodução sexuada apresentam envoltório resistente, podendo suportar condições como congelamento e dessecação.";
    }else if (e === 33) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/hidra.glb";
        tituloEsquerda.textContent = "Características da hidra";
        textoEsquerda.textContent = " Alimentação: é carnívora e se alimenta principalmente de pequenos organismos aquáticos, como microcrustáceos, larvas de insetos e vermes.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Seu nome vem da mitologia grega: recebeu o nome da Hidra de Lerna, criatura mitológica que regenerava suas cabeças. A associação está relacionada à extraordinária capacidade de regeneração do animal.";
    }else if (e === 34) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/hidra.glb";
        tituloEsquerda.textContent = "Características da hidra";
        textoEsquerda.textContent = " Locomoção: embora geralmente permaneça fixada, consegue se deslocar lentamente por movimentos de flexão do corpo, utilizando os tentáculos e o disco basal para mudar de posição.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Pode ser utilizada como indicador ambiental: devido à sua sensibilidade a determinadas condições de poluição, a hidra pode ser utilizada em pesquisas para avaliar efeitos de contaminantes na água..";
    }else if (e === 35) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/hidra.glb";
        tituloEsquerda.textContent = "Características da hidra";
        textoEsquerda.textContent = "Reprodução: apresenta reprodução assexuada por brotamento e reprodução sexuada. Não possui fase medusa, permanecendo exclusivamente na forma de pólipo.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Pode capturar presas maiores que seu próprio corpo: apresenta grande capacidade de expansão corporal, permitindo envolver e digerir organismos relativamente grandes em comparação ao seu tamanho.";
    } else if (e === 36) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/CaravelaPortuguesa.glb";
        tituloEsquerda.textContent = "Características da caravela";
        textoEsquerda.textContent = "Organização corporal: é formada por uma colônia de zooides geneticamente idênticos, especializados em diferentes funções, que dependem uns dos outros para sobreviver.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Origem do nome: recebeu esse nome porque seu pneumatóforo lembra as velas dos navios.";
    }else if (e === 37) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/CaravelaPortuguesa.glb";
        tituloEsquerda.textContent = "Características da caravela";
        textoEsquerda.textContent = " Pneumatóforo: possui uma bolsa preenchida por gás que permite sua flutuação na superfície do mar. Essa estrutura funciona como uma espécie de vela, sendo conduzida pelos ventos e pelas correntes marítimas.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Não é uma água-viva: apesar da aparência semelhante, pertence ao grupo dos sifonóforos. É formada por vários indivíduos unidos, que funcionam juntos como uma única unidade.";
    }else if (e === 38) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/CaravelaPortuguesa.glb";
        tituloEsquerda.textContent = "Características da caravela";
        textoEsquerda.textContent = "Tentáculos e cnidócitos: apresenta longos tentáculos com dactilozoóides, utilizados na captura de presas e na defesa. Neles estão os cnidócitos, células que possuem nematocistos capazes de liberar veneno e paralisar pequenos animais.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Tentáculos muito longos: podem atingir aproximadamente 50 metros de comprimento, embora normalmente sejam menores.";
    }else if (e === 39) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/CaravelaPortuguesa.glb";
        tituloEsquerda.textContent = "Características da caravela";
        textoEsquerda.textContent = " Alimentação: é carnívora, alimentando-se principalmente de pequenos peixes e organismos planctônicos. Os gastrozooides realizam a digestão das presas, distribuindo os nutrientes pela colônia.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Perigo mesmo após a morte: Seus tentáculos podem continuar causando lesões mesmo quando a caravela está morta ou encalhada na praia, pois as células urticantes permanecem ativas por algum tempo.";
    }else if (e === 40) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/CaravelaPortuguesa.glb";
        tituloEsquerda.textContent = "Características da caravela";
        textoEsquerda.textContent = " Habitat: vive em águas marinhas tropicais e subtropicais, geralmente flutuando na superfície dos oceanos, onde é transportada pelos ventos e pelas correntes.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Predadores naturais: apesar do veneno, possui predadores, como tartarugas marinhas e alguns organismos especializados em consumi-la.";
    }else if (e === 41) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/CaravelaPortuguesa.glb";
        tituloEsquerda.textContent = "Características da caravela";
        textoEsquerda.textContent = "Reprodução: apresenta colônias masculinas e femininas, responsáveis pela produção de gametas. A fecundação ocorre provavelmente na água";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Grandes agrupamentos: pode formar concentrações de numerosas caravelas.";
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
    if (etapa < 41) { 
        etapa++;
        carregarEtapa(etapa);
        salvarProgressoNoBanco(etapa);
    } else {
        alert("Aqui futuramente iremos para o quiz!");
        etapa = 42;
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