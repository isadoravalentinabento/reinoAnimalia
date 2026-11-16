<?php
include "configinc.php";
include "validar.php";

$id_aluno = $_SESSION['id_usuario'] ?? 1;
$id_evolucao = (int)($_GET['id_evolucao'] ?? 1);
$id_turma = (int)($_GET['id_turma'] ?? 0);

// Perguntas com a explicação (justificativa) de cada alternativa
$quizzes = [
    1 => [ // Filo 1: Poríferos (id_evolucao = 1)
        [
            "id_pergunta" => 1,
            "enunciado" => "Como os poríferos obtêm seu alimento?",
            "alternativas" => [
                [
                    "id_alternativa" => 1, 
                    "texto" => "Caçando pequenos peixes", 
                    "correto" => 0,
                    "explicacao" => "Errada: Poríferos são animais sésseis (fixos) e não possuem tentáculos ou estruturas de caça."
                ],
                [
                    "id_alternativa" => 2, 
                    "texto" => "Por filtração da água através dos poros", 
                    "correto" => 1,
                    "explicacao" => "Correta: A água entra pelos poros (óstios), passa pelos canais internos onde os coanócitos filtram partículas orgânicas, e sai pelo ósculo."
                ],
                [
                    "id_alternativa" => 3, 
                    "texto" => "Por fotossíntese", 
                    "correto" => 0,
                    "explicacao" => "Errada: Poríferos são animais heterótrofos, não produzem seu próprio alimento por luz solar."
                ],
                [
                    "id_alternativa" => 4, 
                    "texto" => "Absorvendo nutrientes do solo", 
                    "correto" => 0,
                    "explicacao" => "Errada: Eles são exclusivamente aquáticos e não possuem raízes para absorver nutrientes do solo."
                ]
            ]
        ],
        [
            "id_pergunta" => 2,
            "enunciado" => "Qual célula é responsável pela movimentação da água e captura de alimento nas esponjas?",
            "alternativas" => [
                [
                    "id_alternativa" => 5, 
                    "texto" => "Cnidócito", 
                    "correto" => 0,
                    "explicacao" => "Errada: Cnidócitos são células urticantes exclusivas do filo dos Cnidários."
                ],
                [
                    "id_alternativa" => 6, 
                    "texto" => "Coanócito", 
                    "correto" => 1,
                    "explicacao" => "Correta: Os coanócitos possuem um flagelo que bate continuamente para criar a corrente de água e reter partículas de alimento."
                ],
                [
                    "id_alternativa" => 7, 
                    "texto" => "Pinacócito", 
                    "correto" => 0,
                    "explicacao" => "Errada: Os pinacócitos são células achatadas que formam o revestimento externo (pinacoderme), não a filtração."
                ],
                [
                    "id_alternativa" => 8, 
                    "texto" => "Neurônio", 
                    "correto" => 0,
                    "explicacao" => "Errada: Esponjas são os únicos animais que não possuem sistema nervoso nem neurônios."
                ]
            ]
        ]
    ],
    2 => [ // Filo 2: Cnidários (id_evolucao = 2)
        [
            "id_pergunta" => 3,
            "enunciado" => "Qual célula especializada os cnidários usam para defesa e captura de presas?",
            "alternativas" => [
                [
                    "id_alternativa" => 9,  
                    "texto" => "Coanócito", 
                    "correto" => 0,
                    "explicacao" => "Errada: Coanócitos são células flageladas típicas dos Poríferos."
                ],
                [
                    "id_alternativa" => 10, 
                    "texto" => "Amebócito", 
                    "correto" => 0,
                    "explicacao" => "Errada: Amebócitos atuam na distribuição de nutrientes e regeneração nas esponjas."
                ],
                [
                    "id_alternativa" => 11, 
                    "texto" => "Cnidócito", 
                    "correto" => 1,
                    "explicacao" => "Correta: Os cnidócitos disparam o nematocisto ao toque, injetando toxinas para paralisar presas ou afastar predadores."
                ],
                [
                    "id_alternativa" => 12, 
                    "texto" => "Osteócito", 
                    "correto" => 0,
                    "explicacao" => "Errada: Osteócitos são células ósseas presentes apenas em animais vertebrados."
                ]
            ]
        ]
    ]
];

$perguntasAtuais = $quizzes[$id_evolucao] ?? [];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Quiz do Filo</title>
    <link rel="stylesheet" href="css/filo01.css">
    <style>
        /* Libera rolagem caso as explicações deixem a caixa alta */
        body {
            overflow-y: auto !important;
            height: auto !important;
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }
        .quiz-box {
            max-width: 850px;
            margin: 30px auto;
            background: rgba(4, 12, 53, 0.94);
            padding: 35px 45px;
            border-radius: 25px;
            border: 2px solid rgba(175, 229, 243, 0.3);
            color: white;
            box-shadow: 0 8px 25px rgba(0,0,0,0.6);
            position: relative;
            z-index: 9999; /* Garante que nada fique por cima bloqueando o clique */
        }
        .opcao-btn {
            display: block;
            width: 100%;
            text-align: left;
            padding: 15px 20px;
            margin: 12px 0;
            background: rgba(12, 27, 104, 0.8);
            color: white;
            border: 2px solid rgba(175, 229, 243, 0.5);
            border-radius: 15px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.2s;
            position: relative;
            z-index: 10000;
        }
        .opcao-btn:hover:not(:disabled) {
            background: #afe5f3;
            color: #040C35;
        }
        .opcao-btn:disabled {
            cursor: default;
            opacity: 0.9;
        }
        /* Cores de feedback ao responder */
        .opcao-correta {
            background: rgba(25, 135, 84, 0.85) !important;
            border-color: #75b798 !important;
            color: white !important;
        }
        .opcao-errada {
            background: rgba(220, 53, 69, 0.85) !important;
            border-color: #ea868f !important;
            color: white !important;
        }
        /* Área onde aparecem as explicações embaixo */
        .feedback-box {
            margin-top: 25px;
            padding: 20px;
            background: rgba(2, 6, 30, 0.85);
            border-radius: 18px;
            border: 1px solid rgba(175, 229, 243, 0.3);
            display: none; /* Fica oculto até o aluno clicar */
        }
        .feedback-item {
            margin-bottom: 12px;
            padding-left: 12px;
            border-left: 4px solid #afe5f3;
            font-size: 15px;
            line-height: 1.4;
        }
        .feedback-item.certo {
            border-left-color: #4ade80;
            color: #dcfce7;
        }
        .feedback-item.errado {
            border-left-color: #f87171;
            color: #fee2e2;
        }
        .btn-proxima-wrapper {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="quiz-box" id="quiz-container">
        <h2 id="pergunta-texto" style="color: #afe5f3; margin-top: 0;">Carregando pergunta...</h2>
        
        <div id="opcoes-container"></div>

        <!-- Bloco de justificativas que aparece após o clique -->
        <div id="feedback-container" class="feedback-box">
            <h3 style="color: #afe5f3; margin-top: 0; font-size: 18px;">Entenda as alternativas:</h3>
            <div id="lista-explicacoes"></div>
            
            <div class="btn-proxima-wrapper">
                <button id="btn-proxima" class="btn-avancar" style="margin-left: 0;">Próxima</button>
            </div>

          
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <span style="color: #afe5f3; font-size: 14px;">Quiz de Evolução</span>
                <button type="button" onclick="window.location.href='MenuArvore.php?id=<?php echo $id_turma; ?>'" style="background: transparent; border: 1px solid #afe5f3; color: #afe5f3; padding: 6px 15px; border-radius: 15px; cursor: pointer;">Voltar para a Árvore</button>
            </div>
        </div>
    </div>

<script>
const perguntas = <?php echo json_encode($perguntasAtuais); ?>;
const idAluno = <?php echo $id_aluno; ?>;
const idEvolucao = <?php echo $id_evolucao; ?>;
const idTurma = <?php echo $id_turma; ?>;

let indiceAtual = 0;
let respostasAluno = [];
let respondeuAtual = false;

function mostrarPergunta() {
    respondeuAtual = false;
    document.getElementById("feedback-container").style.display = "none";

    if (perguntas.length === 0) {
        document.getElementById("pergunta-texto").textContent = "Nenhuma pergunta cadastrada para este filo ainda.";
        return;
    }

    if (indiceAtual >= perguntas.length) {
        finalizarQuiz();
        return;
    }

    const q = perguntas[indiceAtual];
    document.getElementById("pergunta-texto").textContent = `${indiceAtual + 1}. ${q.enunciado}`;
    
    const opcoesDiv = document.getElementById("opcoes-container");
    opcoesDiv.innerHTML = "";

    q.alternativas.forEach((alt, idx) => {
        const btn = document.createElement("button");
        btn.type = "button";
        btn.className = "opcao-btn";
        btn.textContent = alt.texto;
        btn.dataset.index = idx;
        
        btn.addEventListener("click", function() {
            if (!respondeuAtual) {
                selecionarAlternativa(q, alt, btn);
            }
        });
        
        opcoesDiv.appendChild(btn);
    });
}

function selecionarAlternativa(pergunta, alternativaEscolhida, botaoClicado) {
    respondeuAtual = true;

    // Salva a escolha do aluno
    respostasAluno.push({
        id_pergunta: pergunta.id_pergunta,
        id_alternativa: alternativaEscolhida.id_alternativa,
        correto: alternativaEscolhida.correto
    });

    // Trava todos os botões e pinta a certa de verde e a escolhida errada de vermelho
    const todosBotoes = document.querySelectorAll(".opcao-btn");
    todosBotoes.forEach((btn, idx) => {
        btn.disabled = true;
        const altData = pergunta.alternativas[idx];
        
        if (altData.correto === 1) {
            btn.classList.add("opcao-correta");
        } else if (btn === botaoClicado && altData.correto === 0) {
            btn.classList.add("opcao-errada");
        }
    });

    // Monta as explicações de todas as alternativas embaixo
    const listaExp = document.getElementById("lista-explicacoes");
    listaExp.innerHTML = "";

    pergunta.alternativas.forEach((alt) => {
        const divExp = document.createElement("div");
        divExp.className = `feedback-item ${alt.correto === 1 ? 'certo' : 'errado'}`;
        divExp.innerHTML = `<strong>${alt.texto}:</strong> ${alt.explicacao}`;
        listaExp.appendChild(divExp);
    });

    // Muda o texto do botão se for a última pergunta
    const btnProxima = document.getElementById("btn-proxima");
    btnProxima.textContent = (indiceAtual === perguntas.length - 1) ? "Finalizar Quiz" : "Próxima";

    // Exibe a caixa de explicações
    document.getElementById("feedback-container").style.display = "block";
}

// Botão para avançar para a próxima pergunta após ler a explicação
document.getElementById("btn-proxima").addEventListener("click", function() {
    indiceAtual++;
    mostrarPergunta();
});

function finalizarQuiz() {
    const acertos = respostasAluno.filter(r => r.correto === 1).length;
    const porcentagem = Math.round((acertos / perguntas.length) * 100);
    
    let dados = new FormData();
    dados.append("id_aluno", idAluno);
    dados.append("id_evolucao", idEvolucao);
    dados.append("id_turma", idTurma);
    dados.append("porcentagem", porcentagem);
    dados.append("respostas", JSON.stringify(respostasAluno));

    fetch("salvar_quiz.php", {
        method: "POST",
        body: dados
    })
    .then(res => res.json())
    .then(data => {
        const container = document.getElementById("quiz-container");
        if (data.liberado) {
            container.innerHTML = `
                <h2 style="color: #afe5f3;">Parabéns! Você atingiu ${porcentagem}% de acertos!</h2>
                <p>O próximo filo foi desbloqueado na sua árvore.</p>
                <button class="btn-avancar" style="margin-left:0;" onclick="window.location.href='MenuArvore.php?id=${idTurma}'">Voltar para a Árvore</button>
            `;
        } else {
            container.innerHTML = `
                <h2 style="color: #ff8a8a;">Você atingiu ${porcentagem}% de acertos.</h2>
                <p>Você precisa de pelo menos 70% para liberar o próximo filo.</p>
                <button class="btn-avancar" style="margin-left:0;" onclick="location.reload()">Tentar Novamente</button>
            `;
        }
    });
}

mostrarPergunta();
</script>
</body>
</html>