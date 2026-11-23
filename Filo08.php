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
$id_evolucao = 8;

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
            <h1>Conhecendo o Filo dos Echinodermata</h1>
            <h2>Características do filo:</h2>
        </div>
        
       <section id="intro-etapa-0" class="introducao-filo">
            <div class="bloco-introducao">
                <ul>
                    <li><strong>Simetria radial pentâmera nos adultos:</strong> geralmente, o corpo dos equinodermos adultos apresenta cinco regiões organizadas ao redor de um eixo central. Essa organização pode ser observada nas estrelas-do-mar e nos ouriços-do-mar. Entretanto, suas larvas apresentam simetria bilateral.</li>
                    <li><strong>Ausência de cabeça definida:</strong> não possuem cabeça nem cérebro centralizado como o dos vertebrados. Seu sistema nervoso é formado principalmente por um anel nervoso ao redor da boca e nervos radiais que se estendem pelo corpo.</li>
                    <li><strong>Endoesqueleto calcário:</strong> possuem um esqueleto interno formado por pequenas placas ou estruturas calcárias localizadas na derme. Em muitas espécies, esse esqueleto apresenta espinhos que ajudam na proteção e sustentação do corpo.</li>
                    <li><strong>Sistema hidrovascular:</strong> apresentam um sistema característico preenchido por líquido, também chamado de sistema ambulacrário. Ele movimenta os pés ambulacrais, que participam da locomoção, da alimentação e das trocas gasosas. A água geralmente entra nesse sistema por uma estrutura chamada madreporito.</li>
                    <li><strong>Pés ambulacrais:</strong> são pequenas estruturas tubulares que podem se estender e retrair por meio de alterações na pressão do líquido interno. Em muitas espécies, possuem extremidades que ajudam na fixação a superfícies e na captura de alimentos.</li>
                    <li><strong>Locomoção variada:</strong>  muitas espécies se deslocam com o auxílio dos pés ambulacrais. Nas estrelas-do-mar, eles ficam distribuídos na parte inferior dos braços; nos ouriços-do-mar, atuam em conjunto com os espinhos.</li>
                    <li><strong>Sistema digestório geralmente completo:</strong> a maioria possui boca e ânus, embora existam exceções, como os ofiúros, que não apresentam ânus. A alimentação varia entre os grupos: algumas espécies são predadoras, outras raspam algas e outras se alimentam de partículas orgânicas.</li>
                </ul>
            </div>
        </section>

        <section id="intro-etapa-1" class="introducao-filo" style="display: none;">
            <div class="bloco-introducao">
                <ul>
                    <li><strong>Celoma desenvolvido:</strong> possuem uma cavidade corporal interna revestida por tecido de origem mesodérmica, onde ficam diversos órgãos. O líquido celomático também participa do transporte de substâncias e da defesa do organismo.</li>
                    <li><strong>Circulação pouco desenvolvida:</strong>  não possuem um sistema circulatório bem definido. O transporte de substâncias ocorre principalmente pelos líquidos presentes no corpo.</li>
                    <li><strong>Respiração por diferentes estruturas:</strong> as trocas gasosas podem ocorrer pelos pés ambulacrais, por brânquias dérmicas ou por outras estruturas específicas. Nas holotúrias, por exemplo, existem estruturas respiratórias internas chamadas árvores respiratórias.</li>
                    <li><strong>Ausência de órgãos excretores especializados:</strong> não possuem rins ou estruturas excretoras equivalentes. A eliminação de resíduos metabólicos ocorre principalmente por difusão através de superfícies corporais.</li>
                    <li><strong>Reprodução principalmente sexuada:</strong> a maioria apresenta sexos separados e libera gametas na água, onde geralmente ocorre a fecundação externa. Existem exceções, incluindo espécies capazes de reprodução assexuada.</li>
                    <li><strong>Desenvolvimento com fase larval:</strong>  muitas espécies passam por larvas de simetria bilateral, que posteriormente sofrem metamorfose e adquirem a organização corporal característica dos adultos.</li>
                    <li><strong>Capacidade de regeneração:</strong>  diversas espécies conseguem regenerar partes perdidas do corpo. Essa capacidade varia conforme o grupo e a espécie e não significa que qualquer fragmento possa originar um novo indivíduo.</li>
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

        modelo.src = "Modelos3d/EstrelaDoMar.glb";
        tituloEsquerda.textContent = "Características da estrela do mar";
        textoEsquerda.textContent = "Simetria radial geralmente pentâmera: as estrelas-do-mar adultas geralmente apresentam cinco braços organizados ao redor de um disco central. Entretanto, algumas espécies possuem mais de cinco braços, como as que apresentam dez ou mais.";
        tituloDireita.textContent = "Curiosidade";
        textoDireita.textContent = "Podem projetar o estômago para fora: algumas espécies colocam parte do estômago sobre a presa e liberam enzimas digestivas, iniciando a digestão antes de recolher o alimento.";

    }else if (e === 3) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/EstrelaDoMar.glb";
        tituloEsquerda.textContent = "Características:";
        textoEsquerda.textContent = " Corpo sem cabeça definida: não possuem cabeça nem cérebro centralizado. Seu sistema nervoso é formado por um anel ao redor da boca e nervos radiais que percorrem os braços, permitindo coordenar os movimentos e perceber estímulos do ambiente";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Possuem grande capacidade de regeneração: muitas espécies conseguem regenerar braços perdidos. Em algumas, um braço que mantenha parte suficiente do disco central pode originar um novo indivíduo, mas isso não acontece com todas as espécies.";

    }else if (e === 4) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/EstrelaDoMar.glb";
        tituloEsquerda.textContent = "Características da  estrela do mar";
        textoEsquerda.textContent = "Endoesqueleto com placas calcárias: possuem pequenas placas de carbonato de cálcio sob a pele, que ajudam a sustentar e proteger o corpo. Em algumas espécies, a superfície apresenta espinhos.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Não possuem sangue como o dos vertebrados: o transporte de substâncias depende principalmente dos fluidos corporais, incluindo o líquido do sistema hidrovascular e do celoma.";

    }else if (e === 5) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/EstrelaDoMar.glb";
        tituloEsquerda.textContent = "Características da  estrela do mar";
        textoEsquerda.textContent = "Pés ambulacrais para locomoção: apresentam centenas de pequenas estruturas tubulares na parte inferior dos braços, que fazem parte do sistema hidrovascular. Elas auxiliam no deslocamento, na fixação em superfícies e na captura de alimentos.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Movimentam-se sem pernas convencionais: deslocam-se utilizando os pés ambulacrais, que se estendem e se fixam às superfícies por meio de mecanismos de pressão e adesão.";

    }else if (e === 6) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/EstrelaDoMar.glb";
        tituloEsquerda.textContent = "Características da estrela do mar";
        textoEsquerda.textContent = "Alimentação variada: muitas espécies são carnívoras e alimentam-se de moluscos, como mexilhões e ostras. Outras consomem pequenos organismos ou matéria orgânica disponível no ambiente. ";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Desempenham um papel ecológico importante: algumas espécies controlam populações de moluscos e outros animais, contribuindo para o equilíbrio dos ecossistemas marinhos.";

    }else if (e === 7) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/EstrelaDoMar.glb";
        tituloEsquerda.textContent = "Características da estrela do mar";
        textoEsquerda.textContent = "Clitelo relacionado à reprodução: apresentam uma região mais espessa do corpo, chamada clitelo, que participa da reprodução e secreta o material utilizado na formação do casulo onde os ovos se desenvolvem.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Ajudam na decomposição da matéria orgânica: ao ingerirem restos de organismos e processarem esse material, contribuem para a reciclagem de nutrientes e para o funcionamento dos ecossistemas terrestres";

    }else if (e === 8) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/EstrelaDoMar.glb";
        tituloEsquerda.textContent = "Características da estrela do mar";
        textoEsquerda.textContent = "Clitelo relacionado à reprodução: apresentam uma região mais espessa do corpo, chamada clitelo, que participa da reprodução e secreta o material utilizado na formação do casulo onde os ovos se desenvolvem.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Ajudam na decomposição da matéria orgânica: ao ingerirem restos de organismos e processarem esse material, contribuem para a reciclagem de nutrientes e para o funcionamento dos ecossistemas terrestres";

    }else if (e === 9) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/EstrelaDoMar.glb";
        tituloEsquerda.textContent = "Características da estrela do mar";
        textoEsquerda.textContent = "Clitelo relacionado à reprodução: apresentam uma região mais espessa do corpo, chamada clitelo, que participa da reprodução e secreta o material utilizado na formação do casulo onde os ovos se desenvolvem.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Ajudam na decomposição da matéria orgânica: ao ingerirem restos de organismos e processarem esse material, contribuem para a reciclagem de nutrientes e para o funcionamento dos ecossistemas terrestres";

    }else if (e === 10) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/EstrelaDoMar.glb";
        tituloEsquerda.textContent = "Características da estrela do mar";
        textoEsquerda.textContent = "Clitelo relacionado à reprodução: apresentam uma região mais espessa do corpo, chamada clitelo, que participa da reprodução e secreta o material utilizado na formação do casulo onde os ovos se desenvolvem.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Ajudam na decomposição da matéria orgânica: ao ingerirem restos de organismos e processarem esse material, contribuem para a reciclagem de nutrientes e para o funcionamento dos ecossistemas terrestres";

    }else if (e === 11) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/EstrelaDoMar.glb";
        tituloEsquerda.textContent = "Características da estrela do mar";
        textoEsquerda.textContent = " Sistema digestório adaptado à alimentação: possuem a boca na parte inferior do corpo e, geralmente, o ânus na região superior. Algumas espécies conseguem projetar o estômago para fora do corpo durante a alimentação.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Desempenham um papel ecológico importante: algumas espécies controlam populações de moluscos e outros animais, contribuindo para o equilíbrio dos ecossistemas marinhos.";

    }else if (e === 12) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/OuricoDoMar.glb";
        tituloEsquerda.textContent = "Características do ouriço do mar";
        textoEsquerda.textContent = "Corpo arredondado e sem braços: diferentemente das estrelas-do-mar, os ouriços-do-mar apresentam corpo geralmente globoso ou achatado, protegido por uma carapaça interna rígida formada por placas calcárias.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Possuem dentes que crescem continuamente: os dentes da lanterna de Aristóteles desgastam-se durante a alimentação e crescem para compensar esse desgaste.";

    }else if (e === 13) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/OuricoDoMar.glb";
        tituloEsquerda.textContent = "Características do ouriço do mar";
        textoEsquerda.textContent = " Simetria radial geralmente pentâmera: o corpo adulto apresenta cinco regiões organizadas ao redor de um eixo central. Essa organização pode ser observada na disposição de estruturas e áreas ambulacrais.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = " Os espinhos também ajudam na movimentação: além de proteger o corpo, seus movimentos podem auxiliar o ouriço a se deslocar e a se posicionar no ambiente.";

    }else if (e === 14) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/OuricoDoMar.glb";
        tituloEsquerda.textContent = "Características do ouriço do mar";
        textoEsquerda.textContent = " Espinhos móveis: possuem espinhos ligados ao esqueleto por articulações, utilizados principalmente na proteção e também na locomoção. O tamanho e a forma variam conforme a espécie.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Podem apresentar cores variadas: existem espécies de diferentes cores, como roxo, preto, verde e vermelho. A coloração varia conforme a espécie.";

    }else if (e === 15) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/OuricoDoMar.glb";
        tituloEsquerda.textContent = "Características do ouriço do mar";
        textoEsquerda.textContent = "Pés ambulacrais: apresentam estruturas tubulares que se projetam por pequenas aberturas da carapaça. Elas ajudam na movimentação, na fixação em superfícies, na percepção do ambiente e nas trocas gasosas.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Algumas espécies possuem espinhos que podem machucar: o contato com os espinhos pode causar ferimentos, e determinadas espécies apresentam estruturas defensivas adicionais. Por isso, não é recomendado tocá-los.";

    }else if (e === 16) {
        mainContainer.className = "area-3d";
        conteudoEsquerda.style.display = "block";
        conteudoModelo.style.display = "block";
        conteudoDireita.style.display = "block";
        titulosContainer.style.display = "none"; 

        modelo.src = "Modelos3d/OuricoDoMar.glb";
        tituloEsquerda.textContent = "Características do ouriço do mar";
        textoEsquerda.textContent = " Alimentação principalmente baseada em algas: muitas espécies raspam algas e outros materiais das rochas. Outras podem consumir diferentes organismos e matéria orgânica, dependendo da espécie.  Estrutura mastigadora especializada: muitas espécies possuem a lanterna de Aristóteles, um conjunto de peças calcárias com dentes que ajuda a raspar e triturar o alimento.";
        tituloDireita.textContent = "Curiosidades";
        textoDireita.textContent = "Contribuem para o equilíbrio dos ambientes marinhos: ao se alimentarem de algas, podem influenciar a cobertura de algas nas rochas e a organização das comunidades marinhas. Quando suas populações aumentam excessivamente, algumas espécies podem alterar bastante esses ambientes.";

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
    if (etapa < 16) { 
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