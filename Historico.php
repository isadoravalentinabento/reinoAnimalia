<?php
include "validar.php";
include "configinc.php";

if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
    $id_turma = (int)$_GET['id'];
    $_SESSION['id_turma_atual'] = $id_turma;
} else {
    $id_turma = (int)($_SESSION['id_turma_atual'] ?? 0);
}

$id_aluno = (int)($_SESSION['id_usuario'] ?? 0);

if (file_exists("MenuArvore.php")) {
    include "MenuArvore.php";
}

$conexao = new PDO(dsn, usuario, senha);

$sql = "SELECT id_evolucao, MAX(etapa) AS etapa_atual
        FROM progresso
        WHERE id_aluno = :id_aluno AND id_turma = :id_turma
        GROUP BY id_evolucao
        ORDER BY id_evolucao ASC";

$comando = $conexao->prepare($sql);
$comando->bindValue(':id_aluno', $id_aluno);
$comando->bindValue(':id_turma', $id_turma);
$comando->execute();
$registros = $comando->fetchAll(PDO::FETCH_ASSOC);

$progressoAluno = [];
foreach ($registros as $reg) {
    $progressoAluno[(int)$reg['id_evolucao']] = (int)$reg['etapa_atual'];
}

$conteudosFilos = [
    1 => [
        'nome' => '1º Filo — Poríferos',
        'modelo_3d' => 'Estrutura corporal assimétrica com poros inalantes (óstios), átrio central e ósculo superior para saída de água.',
        'caracteristicas' => 'Animais aquáticos (maioria marinhos), sésseis na fase adulta, sem tecidos verdadeiros (parazoários), sem sistema digestório, nervoso ou circulatório. Digestão exclusivamente intracelular realizada pelos coanócitos.',
        'curiosidades' => 'Possuem altíssima capacidade de regeneração: se uma esponja for passada por uma peneira e suas células forem separadas, elas conseguem se reorganizar e formar um novo indivíduo.'
    ],
    2 => [
        'nome' => '2º Filo — Cnidários',
        'modelo_3d' => 'Duas formas morfológicas principais: pólipo (séssil, como anêmonas e corais) e medusa (livre-natante, como as águas-vivas), com simetria radial.',
        'caracteristicas' => 'Primeiros animais a apresentarem tecidos verdadeiros e sistema digestório (incompleto, com apenas uma abertura). Diblásticos, com sistema nervoso difuso e células urticantes chamadas cnidócitos.',
        'curiosidades' => 'A vespa-do-mar (Chironex fleckeri), uma cubomedusa australiana, possui um dos venenos mais potentes do reino animal, capaz de causar parada cardíaca em poucos minutos.'
    ],
    3 => [
        'nome' => '3º Filo — Platelmintos',
        'modelo_3d' => 'Corpo achatado dorsoventralmente com cefalização evidente nas planárias (ocelos e aurículas) ou escólex com ventosas e ganchos nas tênias.',
        'caracteristicas' => 'Triblásticos, acelomados e com simetria bilateral. Sistema digestório incompleto (ausente nas tênias) e excreção feita por células-flama (protonefrídios).',
        'curiosidades' => 'As planárias terrestres e aquáticas possuem células-tronco chamadas neoblastos que permitem regenerar até mesmo a cabeça inteira se forem cortadas.'
    ],
    4 => [
        'nome' => '4º Filo — Nematelmintos',
        'modelo_3d' => 'Corpo cilíndrico, alongado e não segmentado, afilado nas duas extremidades e revestido por uma cutícula resistente.',
        'caracteristicas' => 'Triblásticos, pseudocelomados e com simetria bilateral. São os primeiros animais na escala evolutiva a apresentarem sistema digestório completo (boca e ânus).',
        'curiosidades' => 'O nematoide Caenorhabditis elegans foi o primeiro organismo multicelular a ter seu genoma completamente sequenciado e é amplamente usado em pesquisas sobre envelhecimento e câncer.'
    ],
    5 => [
        'nome' => '5º Filo — Anelídeos',
        'modelo_3d' => 'Corpo cilíndrico dividido em anéis repetidos (metameria), com presença de clitelo (nos oligoquetas) e cerdas locomotoras.',
        'caracteristicas' => 'Triblásticos, celomados e com simetria bilateral. Possuem sistema circulatório fechado (com hemoglobina dissolvida no plasma), respiração cutânea ou branquial e excreção por metanefrídios.',
        'curiosidades' => 'As minhocas não possuem pulmões; elas respiram através da pele úmida. Se a pele secar completamente, o animal morre asfixiado.'
    ],
    6 => [
        'nome' => '6º Filo — Artrópodes',
        'modelo_3d' => 'Corpo segmentado (cabeça, tórax e abdome ou cefalotórax e abdome), apêndices articulados e exoesqueleto rígido de quitina.',
        'caracteristicas' => 'Maior filo do reino animal. Triblásticos, celomados, sistema digestório completo, circulação aberta (lacunar) e crescimento por meio de mudas (ecdises).',
        'curiosidades' => 'Para crescer, os artrópodes precisam abandonar o exoesqueleto antigo (muda) e produzir um novo, ficando temporariamente vulneráveis a predadores até a nova carapaça endurecer.'
    ],
    7 => [
        'nome' => '7º Filo — Moluscos',
        'modelo_3d' => 'Corpo mole dividido em três regiões básicas: cabeça, pé muscular e massa visceral, frequentemente protegido por uma concha calcária secretada pelo manto.',
        'caracteristicas' => 'Triblásticos, celomados, não segmentados, com sistema digestório completo e presença de rádula (estrutura raspadora semelhante a uma língua com dentes, ausente nos bivalves).',
        'curiosidades' => 'Os polvos possuem três corações, sangue azul (devido à proteína hemocianina rica em cobre) e a maior parte de seus neurônios fica distribuída nos tentáculos.'
    ],
    8 => [
        'nome' => '8º Filo — Equinodermos',
        'modelo_3d' => 'Simetria pentarradial na fase adulta, endoesqueleto calcário com espinhos e sistema ambulacrário (hidrovascular) com pés ambulacrais.',
        'caracteristicas' => 'Exclusivamente marinhos, triblásticos, celomados e deuterostômios (assim como os cordados, sendo os invertebrados mais próximos evolutivamente dos vertebrados).',
        'curiosidades' => 'Os pepinos-do-mar podem expelir parte de suas próprias vísceras quando ameaçados para distrair predadores, regenerando os órgãos internos semanas depois.'
    ]
];


$filosLidos = [];
foreach ($conteudosFilos as $id => $dados) {
    $etapa = $progressoAluno[$id] ?? 0;
    if ($etapa > 0) {
        $dados['id'] = $id;
        $dados['etapa'] = $etapa;
        $filosLidos[] = $dados;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Leituras</title>
    <link rel="stylesheet" href="css/Historico.css?v=2">
</head>
<body>

    <div class="livro-wrapper">
        <div class="livro-container">

            <button type="button" class="btn-fechar-livro" onclick="window.location.href='SalaArvore.php?id=<?= $id_turma ?>'" title="Fechar Histórico">
                ✕
            </button>

            <div class="pagina pagina-esquerda" id="pagina-esquerda"></div>


            <div class="dobra-livro"></div>


            <div class="pagina pagina-direita" id="pagina-direita"></div>

        </div>

        <?php if (count($filosLidos) > 1): ?>
            <div class="livro-paginacao">
                <button type="button" class="btn-folhear" id="btn-anterior" onclick="mudarPagina(-1)">Filo Anterior</button>
                <span id="indicador-pagina">1 / <?= count($filosLidos) ?></span>
                <button type="button" class="btn-folhear" id="btn-proximo" onclick="mudarPagina(1)">Próximo Filo </button>
            </div>
        <?php endif; ?>
    </div>

    <script>
        const filosLidos = <?= json_encode($filosLidos); ?>;
        let indiceAtual = 0;

        function renderizarLivro() {
            const pagEsq = document.getElementById("pagina-esquerda");
            const pagDir = document.getElementById("pagina-direita");

            if (!filosLidos || filosLidos.length === 0) {
                pagEsq.innerHTML = `
                    <h3 class="livro-titulo">Diário de Estudos</h3>
                    <p class="livro-texto">Você ainda não realizou leituras na árvore filogenética desta sala.</p>
                `;
                pagDir.innerHTML = `
                    <h3 class="livro-titulo">Como desbloquear?</h3>
                    <p class="livro-texto">Feche este livro no <strong>X</strong>, clique em <strong>Poríferos</strong> na árvore e avance pelas etapas para registar aqui as suas descobertas!</p>
                `;
                return;
            }

            const item = filosLidos[indiceAtual];
            const etapa = item.etapa;

            let htmlEsq = `<h3 class="livro-titulo">${item.nome}</h3>`;

            if (etapa >= 1) {
                htmlEsq += `
                    <div class="secao-livro">
                        <span class="secao-subtitulo">Visualização 3D</span>
                        <p class="livro-texto">${item.modelo_3d}</p>
                    </div>
                `;
            }

            if (etapa >= 2) {
                htmlEsq += `
                    <div class="secao-livro">
                        <span class="secao-subtitulo">Características Gerais</span>
                        <p class="livro-texto">${item.caracteristicas}</p>
                    </div>
                `;
            }

            let htmlDir = `<h3 class="livro-titulo">Curiosidades & Notas</h3>`;

            if (etapa >= 3) {
                htmlDir += `
                    <div class="secao-livro">
                        <span class="secao-subtitulo">Você Sabia?</span>
                        <p class="livro-texto">${item.curiosidades}</p>
                    </div>
                `;
            } else {
                htmlDir += `
                    <div class="secao-livro">
                        <p class="livro-texto"><em>Continue a leitura deste filo na árvore para desbloquear as curiosidades desta página!</em></p>
                    </div>
                `;
            }

            pagEsq.innerHTML = htmlEsq;
            pagDir.innerHTML = htmlDir;

            // Atualiza botões e indicador de página
            const indicador = document.getElementById("indicador-pagina");
            const btnAnt = document.getElementById("btn-anterior");
            const btnProx = document.getElementById("btn-proximo");

            if (indicador) {
                indicador.textContent = `${indiceAtual + 1} / ${filosLidos.length}`;
            }
            if (btnAnt) btnAnt.disabled = (indiceAtual === 0);
            if (btnProx) btnProx.disabled = (indiceAtual === filosLidos.length - 1);
        }

        function mudarPagina(direcao) {
            const novoIndice = indiceAtual + direcao;
            if (novoIndice >= 0 && novoIndice < filosLidos.length) {
                indiceAtual = novoIndice;
                renderizarLivro();
            }
        }

        renderizarLivro();
    </script>

</body>
</html>