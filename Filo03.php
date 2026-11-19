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
$id_evolucao = 3;

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
            <h1>Conhecendo o Filo dos platelmintos</h1>
            <h2>Características do filo:</h2>
        </div>
        
        <section id="intro-etapa-0" class="introducao-filo">
            <div class="bloco-introducao">
                <ul>
                    <li><strong>Corpo achatado:</strong> apresentam o corpo achatado no sentido dorsoventral, isto é, de cima para baixo. Essa forma facilita as trocas de substâncias por difusão através da superfície corporal.</li>
                    <li><strong>Simetria bilateral:</strong> o corpo pode ser dividido longitudinalmente em duas metades semelhantes, direita e esquerda. Essa característica está relacionada à organização do corpo e à movimentação direcionada.</li>
                    <li><strong>Triblásticos:</strong> durante o desenvolvimento embrionário, formam três folhetos germinativos: ectoderme, mesoderme e endoderme. Esses folhetos dão origem aos diferentes tecidos e estruturas do animal.</li>
                    <li><strong>Acelomados:</strong> não possuem celoma, que é uma cavidade corporal revestida por tecido de origem mesodérmica. O espaço entre a parede do corpo e os órgãos é preenchido por tecidos.</li>
                    <li><strong>Habitat:</strong> podem viver em ambientes aquáticos de água doce ou salgada e em locais terrestres úmidos. Algumas espécies são de vida livre, como as planárias, enquanto outras são parasitas, como as tênias e os esquistossomos.</li>
                    <li><strong>Organização corporal:</strong> apresentam órgãos e sistemas relativamente simples, mas não possuem todos os sistemas encontrados em animais mais complexos. O nível de desenvolvimento varia conforme a espécie e seu modo de vida.</li>
                </ul>
            </div>
        </section>

        <section id="intro-etapa-1" class="introducao-filo" style="display: none;">
            <div class="bloco-introducao">
                <ul>
                    <li><strong>Sistema digestório</strong> na maioria dos platelmintos que possuem esse sistema, ele é incompleto, com boca, mas sem ânus. Assim, a entrada do alimento e a eliminação dos resíduos não digeridos ocorrem pela mesma abertura. Nas tênias, o sistema digestório é ausente, e os nutrientes são absorvidos diretamente pela superfície corporal.</li>
                    <li><strong>Sistema circulatório e respiratório</strong> não possuem sistemas circulatório e respiratório especializados. As trocas gasosas ocorrem por difusão através da superfície do corpo, e os nutrientes são distribuídos sem a participação de um sistema circulatório.</li>
                    <li><strong>Sistema excretor:</strong> apresentam estruturas chamadas protonefrídios, que incluem células especializadas conhecidas como células-flama. Essas estruturas participam da eliminação de resíduos e da regulação da quantidade de água no organismo</li>
                    <li><strong> Sistema nervoso</strong> possuem um sistema nervoso relativamente simples, geralmente formado por gânglios nervosos na região anterior do corpo e cordões nervosos longitudinais. Esse sistema permite receber estímulos e coordenar respostas.</li>
                    <li><strong>Reprodução sexuada:</strong>muitas espécies são hermafroditas, ou seja, apresentam estruturas reprodutoras masculinas e femininas no mesmo indivíduo. Entretanto, existem espécies com sexos separados, como o Schistosoma mansoni, causador da esquistossomose. </li>
                    <li><strong>Reprodução assexuada</strong> ocorre em algumas espécies, especialmente em determinadas planárias, por divisão do corpo seguida de regeneração das partes. Essa capacidade varia entre as espécies e não é uma característica universal de todos os platelmintos.</li>
                    <li><strong> Desenvolvimento</strong>pode ser direto, sem fase larval, ou indireto, com fases larvais. Muitas espécies parasitas apresentam ciclos de vida complexos, que podem envolver mais de um hospedeiro.  </li>
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

        modelo.src = "Modelos3d/planaria.glb";
        tituloEsquerda.textContent = "Características da Planaria";
        textoEsquerda.textContent = "Corpo achatado e alongado: as planárias possuem corpo achatado de cima para baixo, característica típica dos platelmintos. Seu tamanho e formato variam conforme a espécie.";
        tituloDireita.textContent = "Características";
        textoDireita.textContent = "Habitat: podem viver em água doce, água salgada ou ambientes terrestres úmidos. Muitas planárias de água doce são encontradas sob pedras, troncos e plantas aquáticas.";

    }else if (e === 3) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/planaria.glb";
        tituloEsquerda.textContent = "Características da Planaria";
        textoEsquerda.textContent = "Locomoção por cílios: a superfície inferior do corpo possui células com pequenos cílios, que ajudam no deslocamento sobre superfícies. A contração dos músculos também contribui para seus movimentos.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Grande capacidade de regeneração: algumas espécies conseguem reconstruir partes do corpo perdidas e, em determinadas condições, fragmentos podem formar novos indivíduos. Isso acontece graças à presença de células-tronco chamadas neoblastos, capazes de originar diferentes tipos celulares. Essa capacidade varia entre as espécies.";

    }else if (e === 4) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/planaria.glb";
        tituloEsquerda.textContent = "Características da Planaria";
        textoEsquerda.textContent = "Alimentação: muitas espécies são predadoras e alimentam-se de pequenos animais e outros organismos. Algumas também consomem matéria orgânica de animais mortos.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Reprodução assexuada: algumas planárias dividem o próprio corpo em partes, e cada fragmento pode regenerar as estruturas que faltam, originando novos indivíduos. Esse processo é chamado de fissão.";

    }else if (e === 5) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/planaria.glb";
        tituloEsquerda.textContent = "Características da Planaria";
        textoEsquerda.textContent = " Sistema digestório incompleto: possuem boca localizada na região ventral, isto é, na parte inferior do corpo. A boca está ligada a uma faringe muscular que pode se projetar para fora para capturar e ingerir o alimento. Não possuem ânus; os resíduos não digeridos são eliminados pela boca.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Também realizam reprodução sexuada: muitas planárias são hermafroditas, ou seja, possuem estruturas reprodutoras masculinas e femininas. Em diversas espécies, dois indivíduos trocam espermatozoides durante a reprodução.";

    }else if (e === 6) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/planaria.glb";
        tituloEsquerda.textContent = "Características da Planaria";
        textoEsquerda.textContent = " Percepção da luz: apresentam estruturas chamadas ocelos, geralmente dois pontos escuros na região anterior do corpo. Eles detectam a intensidade e a direção da luz, mas não formam imagens como os olhos humanos.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Reagem à luz: algumas planárias de água doce evitam áreas iluminadas e procuram locais escuros e protegidos. Essa resposta ajuda a explicar por que podem ser encontradas sob pedras e troncos. O comportamento varia conforme a espécie e as condições ambientais.";

    }else if (e === 7) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/planaria.glb";
        tituloEsquerda.textContent = "Características da Planaria";
        textoEsquerda.textContent = "Sistema nervoso: possuem gânglios nervosos na região anterior e cordões nervosos que percorrem o corpo. Essa organização permite coordenar movimentos e responder a estímulos ambientais.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "São estudadas pela ciência: a capacidade de regeneração das planárias desperta interesse científico, especialmente nos estudos sobre células-tronco, formação de tecidos e mecanismos de regeneração. Pesquisas com esses animais ajudam a compreender como os organismos reconstroem partes do corpo.";

    }else if (e === 8) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Tenia.glb";
        tituloEsquerda.textContent = "Características da Tenia";
        textoEsquerda.textContent = " Corpo alongado e achatado: as tênias possuem corpo achatado, estreito e semelhante a uma fita. Seu comprimento varia conforme a espécie; algumas podem atingir vários metros. Corpo dividido em proglótides: o corpo é formado por segmentos chamados proglótides, que contêm estruturas reprodutoras. Elas se desenvolvem a partir da região próxima à cabeça e amadurecem à medida que se afastam dela.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "São conhecidas como solitárias: esse nome popular está relacionado ao fato de que, frequentemente, apenas uma tênia adulta se estabelece no intestino do hospedeiro. Entretanto, pode haver mais de um indivíduo.";

    }else if (e === 9) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Tenia.glb";
        tituloEsquerda.textContent = "Características da Tenia";
        textoEsquerda.textContent = "Escólex (região de fixação): é a região anterior do corpo, popularmente chamada de cabeça. Possui estruturas que permitem a fixação na parede do intestino do hospedeiro, como ventosas. Na Taenia solium, também há uma estrutura com ganchos; na Taenia saginata, esses ganchos estão ausentes.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Podem atingir vários metros: a Taenia solium geralmente mede cerca de 3 a 5 metros, enquanto a Taenia saginata pode atingir aproximadamente 6 a 7 metros. O tamanho varia de acordo com o indivíduo e as condições de desenvolvimento.";

    }else if (e === 10) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Tenia.glb";
        tituloEsquerda.textContent = "Características da Tenia";
        textoEsquerda.textContent = "Ausência de sistema digestório: as tênias não possuem boca nem tubo digestório. Como vivem no intestino do hospedeiro, absorvem os nutrientes já digeridos diretamente pela superfície do corpo.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Cada proglótide funciona como uma unidade reprodutiva: os segmentos maduros possuem órgãos reprodutores, e os segmentos grávidos podem conter milhares de ovos. Isso contribui para a capacidade de reprodução e disseminação desses parasitas.";

    }else if (e === 10) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Tenia.glb";
        tituloEsquerda.textContent = "Características da Tenia";
        textoEsquerda.textContent = " Vida parasitária: são endoparasitas, ou seja, vivem no interior de outros organismos e obtêm deles os nutrientes necessários à sobrevivência. Na fase adulta, as espécies que causam teníase vivem principalmente no intestino delgado humano.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Possuem ciclos de vida com mais de um hospedeiro: a Taenia solium tem os suínos como hospedeiros intermediários, enquanto a Taenia saginata tem os bovinos. Os seres humanos podem abrigar a forma adulta dessas duas espécies.";

    }else if (e === 11) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Tenia.glb";
        tituloEsquerda.textContent = "Características da Tenia";
        textoEsquerda.textContent = " Reprodução: são hermafroditas, pois cada proglótide madura possui estruturas reprodutoras masculinas e femininas. A fecundação pode ocorrer entre proglótides, e também pode ocorrer autofecundação.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Teníase e cisticercose são diferentes: a teníase ocorre quando uma pessoa ingere carne bovina ou suína contaminada com larvas da tênia e insuficientemente cozida. Já a cisticercose humana ocorre quando há ingestão de ovos de Taenia solium, que podem originar larvas nos tecidos. Portanto, são formas diferentes de infecção.";

    }else if (e === 12) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/Tenia.glb";
        tituloEsquerda.textContent = "Características da Tenia";
        textoEsquerda.textContent = "Crescimento contínuo: a região chamada colo, localizada logo após o escólex, produz novas proglótides. À medida que o animal cresce, os segmentos mais antigos amadurecem e os que estão na extremidade posterior podem se desprender.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "A prevenção está relacionada à higiene e à segurança alimentar: saneamento básico, lavagem adequada das mãos, inspeção sanitária das carnes e consumo de carne bem cozida ajudam a prevenir infecções. A higiene e o saneamento também são importantes para interromper a disseminação dos ovos no ambiente.";

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
    if (etapa < 12) { 
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