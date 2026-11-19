<?php
include "configinc.php";
include "validar.php";

$id_aluno = $_SESSION['id_usuario'] ?? 1;
$id_evolucao = (int)($_GET['id_evolucao'] ?? 1);
$id_turma = (int)($_GET['id_turma'] ?? 0);

$quizzes = [
    1 => [
        [
            "id_pergunta" => 1,
            "enunciado" => " Qual é uma das principais características dos poríferos?",
            "alternativas" => [
                [
                    "id_alternativa" => 1, 
                    "texto" => "Possuem órgãos e sistemas bem desenvolvidos", 
                    "correto" => 0,
                    "explicacao" => "Errada: "
                ],
                [
                    "id_alternativa" => 2, 
                    "texto" => "São unicelulares e vivem em colônias.", 
                    "correto" => 0,
                    "explicacao" => "errado:"
                ],
                [
                    "id_alternativa" => 3, 
                    "texto" => "São multicelulares e possuem o corpo com poros.", 
                    "correto" => 1,
                    "explicacao" => "Certa"
                ],
                [
                    "id_alternativa" => 4, 
                    "texto" => "Possuem corpo segmentado", 
                    "correto" => 0,
                    "explicacao" => "errada"
                ]
            ]
        ],
        [
            "id_pergunta" => 2,
            "enunciado" => "Como são chamados os poros presentes no corpo dos poríferos?",
            "alternativas" => [
                [
                    "id_alternativa" => 5, 
                    "texto" => "Cnidócitos.", 
                    "correto" => 0,
                    "explicacao" => "errada"
                ],
                [
                    "id_alternativa" => 6, 
                    "texto" => "Óstios", 
                    "correto" => 1,
                    "explicacao" => "correto"
                ],
                [
                    "id_alternativa" => 7, 
                    "texto" => "Tentáculos.", 
                    "correto" => 0,
                    "explicacao" => "errada"
                ],
                [
                    "id_alternativa" => 8, 
                    "texto" => "Espiráculos.", 
                    "correto" => 0,
                    "explicacao" => "Errada"
                ]
            ]
        ],
        [
            "id_pergunta" => 3,
            "enunciado" => "Como é a simetria corporal dos poríferos?",
            "alternativas" => [
                [
                    "id_alternativa" => 9, 
                    "texto" => "Sempre bilateral", 
                    "correto" => 0,
                    "explicacao" => "errada"
                ],
                [
                    "id_alternativa" => 10, 
                    "texto" => "Sempre radial.", 
                    "correto" => 0,
                    "explicacao" => "Errada"
                ],
                [
                    "id_alternativa" => 11, 
                    "texto" => "Assimétrica", 
                    "correto" => 1,
                    "explicacao" => "Certa"
                ],
                [
                    "id_alternativa" => 12, 
                    "texto" => "Sempre bilateral e radial ao mesmo tempo.", 
                    "correto" => 0,
                    "explicacao" => "errada"
                ]
            ]
        ],
        [
            "id_pergunta" => 4,
            "enunciado" => "Qual tipo de digestão ocorre nos poríferos?",
            "alternativas" => [
                [
                    "id_alternativa" => 13, 
                    "texto" => "Extracelular, realizada no estômago.", 
                    "correto" => 0,
                    "explicacao" => "Errada"
                ],
                [
                    "id_alternativa" => 14, 
                    "texto" => "Extracelular, realizada no intestino.", 
                    "correto" => 0,
                    "explicacao" => "Errada"
                ],
                [
                    "id_alternativa" => 15, 
                    "texto" => "Intracelular, realizada no interior das células.", 
                    "correto" => 1,
                    "explicacao" => "Certa"
                ],
                [
                    "id_alternativa" => 16, 
                    "texto" => "Mista, realizada no estômago e nas células.", 
                    "correto" => 0,
                    "explicacao" => "Errada"
                ]
            ]
        ],
        [
            "id_pergunta" => 5,
            "enunciado" => "Como os poríferos adultos vivem em relação ao substrato?",
            "alternativas" => [
                [
                    "id_alternativa" => 17, 
                    "texto" => " Nadam livremente durante toda a vida.", 
                    "correto" => 0,
                    "explicacao" => "Errada"
                ],
                [
                    "id_alternativa" => 18, 
                    "texto" => "São sésseis, permanecendo fixos a um substrato", 
                    "correto" => 1,
                    "explicacao" => "Certa"
                ],
                [
                    "id_alternativa" => 19, 
                    "texto" => "Caminham sobre o fundo marinho.", 
                    "correto" => 0,
                    "explicacao" => "errada"
                ],
                [
                    "id_alternativa" => 20, 
                    "texto" => "Vivem exclusivamente como parasitas.", 
                    "correto" => 0,
                    "explicacao" => "errada"
                ]
            ]
        ]
    ],
    3 => [ 
        [
            "id_pergunta" => 6,
            "enunciado" => "Qual alternativa apresenta características e exemplos corretos do filo Platyhelminthes?",
            "alternativas" => [
                [
                    "id_alternativa" => 21,  
                    "texto" => "Planárias são parasitas, e todas as espécies possuem sistema digestório completo.", 
                    "correto" => 0,
                    "explicacao" => "errada"
                ],
                [
                    "id_alternativa" => 22, 
                    "texto" => "Tênias são de vida livre, e os platelmintos possuem sistemas respiratório e circulatório.", 
                    "correto" => 0,
                    "explicacao" => "errada"
                ],
                [
                    "id_alternativa" => 23, 
                    "texto" => " Planárias são, em sua maioria, de vida livre; tênias são parasitas; e os platelmintos não possuem sistemas respiratório e circulatório.", 
                    "correto" => 1,
                    "explicacao" => "correto"
                ],
                [
                    "id_alternativa" => 24, 
                    "texto" => "Esquistossomos são de vida livre, e os platelmintos possuem cavidade corporal revestida por mesoderma.", 
                    "correto" => 0,
                    "explicacao" => "errado"
                ]
            ]
        ],
        [
            "id_pergunta" => 7,
            "enunciado" => "Como ocorrem a respiração e a circulação nos platelmintos?",
            "alternativas" => [
                [
                    "id_alternativa" => 25,
                    "texto" => "Por pulmões e sistema circulatório fechado.",
                    "correto" => 0,
                    "explicacao" => "errado"
                ],
                [
                    "id_alternativa" => 26,
                    "texto" => "Por brânquias e sistema circulatório aberto.",
                    "correto" => 0,
                    "explicacao" => "errado"
                ],
                [
                    "id_alternativa" => 27,
                    "texto" => "Por órgãos respiratórios e vasos sanguíneos",
                    "correto" => 0,
                    "explicacao" => "errado"
                ],
                [
                    "id_alternativa" => 28,
                    "texto" => "Não possuem sistemas respiratório e circulatório; as trocas gasosas ocorrem por difusão.",
                    "correto" => 1,
                    "explicacao" => "correto"
                ]
            ]
        ],
        [
            "id_pergunta" => 8,
            "enunciado" => "Por que muitos platelmintos parasitas apresentam ciclos de vida indiretos?",
            "alternativas" => [
                [
                    "id_alternativa" => 29,
                    "texto" => "Porque precisam passar por diferentes hospedeiros durante o desenvolvimento.",
                    "correto" => 1,
                    "explicacao" => "correto"
                ],
                [
                    "id_alternativa" => 30,
                    "texto" => "Porque não conseguem realizar reprodução sexuada.",
                    "correto" => 0,
                    "explicacao" => "errado"
                ],
                [
                    "id_alternativa" => 31,
                    "texto" => "Porque não possuem sistema nervoso.",
                    "correto" => 0,
                    "explicacao" => "errado"
                ],
                [
                    "id_alternativa" => 32,
                    "texto" => "Porque precisam se transformar em animais de vida livre.",
                    "correto" => 0,
                    "explicacao" => "errado"
                ]
            ]
        ],
        [
            "id_pergunta" => 9,
            "enunciado" => "Como é o sistema digestório dos platelmintos?",
            "alternativas" => [
                [
                    "id_alternativa" => 33,
                    "texto" => "É sempre completo, com boca e ânus.",
                    "correto" => 0,
                    "explicacao" => "errada"
                ],
                [
                    "id_alternativa" => 34,
                    "texto" => "É incompleto, com uma única abertura, podendo estar ausente em alguns grupos.",
                    "correto" => 1,
                    "explicacao" => "certa"
                ],
                [
                    "id_alternativa" => 35,
                    "texto" => "Está ausente em todos os representantes do filo.",
                    "correto" => 0,
                    "explicacao" => "errada"
                ],
                [
                    "id_alternativa" => 36,
                    "texto" => "Possui duas aberturas em todas as espécies.",
                    "correto" => 0,
                    "explicacao" => "errada"
                ]
            ]
        ],
        [
            "id_pergunta" => 10,
            "enunciado" => "Qual estrutura está relacionada à excreção dos platelmintos?",
            "alternativas" => [
                [
                    "id_alternativa" => 37,
                    "texto" => "Ocelos, responsáveis pela eliminação de resíduos.",
                    "correto" => 0,
                    "explicacao" => "errado"
                ],
                [
                    "id_alternativa" => 38,
                    "texto" => "Gânglios nervosos, que filtram substâncias do organismo.",
                    "correto" => 0,
                    "explicacao" => "errado"
                ],
                [
                    "id_alternativa" => 39,
                    "texto" => "Células-flama, que fazem parte dos protonefrídios.",
                    "correto" => 1,
                    "explicacao" => "certo"
                ],
                [
                    "id_alternativa" => 40,
                    "texto" => "Rabditos, que transportam os resíduos metabólicos.",
                    "correto" => 0,
                    "explicacao" => "errado"
                ]
            ]
        ]
    ],
    4 => [ 
            [
            "id_pergunta" => 11,
            "enunciado" => "Qual alternativa apresenta características corretas dos animais pseudocelomados?",
            "alternativas" => [
                [
                    "id_alternativa" => 41,
                    "texto" => " São diblásticos, possuem simetria radial e corpo segmentado.",
                    "correto" => 0,
                    "explicacao" => "errado"
                ],
                [
                    "id_alternativa" => 42,
                    "texto" => "São triblásticos, possuem simetria bilateral, corpo não segmentado e uma cavidade corporal chamada pseudocele.",
                    "correto" => 1,
                    "explicacao" => "certo"
                ],
                [
                    "id_alternativa" => 43,
                    "texto" => " São triblásticos, possuem simetria radial e não apresentam cavidade corporal.",
                    "correto" => 0,
                    "explicacao" => "errado"
                ],
                [
                    "id_alternativa" => 44,
                    "texto" => "São acelomados, possuem simetria bilateral e corpo segmentado.",
                    "correto" => 0,
                    "explicacao" => "errado"
                ]
            ]
        ],
        [
            "id_pergunta" => 12,
            "enunciado" => "Como é o sistema digestório da maioria dos pseudocelomados?",
            "alternativas" => [
                [
                    "id_alternativa" => 45,
                    "texto" => "Incompleto, com apenas uma abertura para entrada de alimentos e eliminação de resíduos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 46,
                    "texto" => "Ausente em todos os representantes desses filos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 47,
                    "texto" => "Completo, com boca, intestino e ânus, sendo ausente nos acantocéfalos.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 48,
                    "texto" => "Completo, mas sem boca, com absorção de nutrientes pela pele em todos os grupos.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 13,
            "enunciado" => "Como ocorrem a respiração e a circulação nos pseudocelomados?",
            "alternativas" => [
                [
                    "id_alternativa" => 49,
                    "texto" => "Possuem pulmões e sistema circulatório fechado.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 50,
                    "texto" => "Possuem brânquias e sistema circulatório aberto.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 51,
                    "texto" => "Possuem órgãos respiratórios, mas não apresentam sistema circulatório.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 52,
                    "texto" => "Não possuem sistemas respiratório e circulatório especializados.",
                    "correto" => 1,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 14,
            "enunciado" => "Qual alternativa descreve corretamente a reprodução da maioria dos pseudocelomados?",
            "alternativas" => [
                [
                    "id_alternativa" => 53,
                    "texto" => "Geralmente possuem sexos separados, e os machos frequentemente são menores que as fêmeas.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 54,
                    "texto" => "Todos são hermafroditas e realizam exclusivamente autofecundação",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 55,
                    "texto" => "Todos se reproduzem assexuadamente por brotamento.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 56,
                    "texto" => "Apresentam fecundação externa e não produzem ovos.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 15,
            "enunciado" => " Qual alternativa apresenta características corretas da organização corporal dos pseudocelomados?",
            "alternativas" => [
                [
                    "id_alternativa" => 57,
                    "texto" => "Possuem corpo segmentado, musculatura circular predominante e cílios em todos os grupos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 57,
                    "texto" => "Possuem corpo achatado dorsoventralmente e cavidade corporal ausente.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 58,
                    "texto" => " Possuem corpo geralmente vermiforme, cutícula espessada em muitos grupos e musculatura predominantemente longitudinal.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 59,
                    "texto" => "Possuem corpo dividido em cabeça, tórax e abdômen, com esqueleto interno.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ]
    ],
    7 => [ 
            [
            "id_pergunta" => 16,
            "enunciado" => " Qual alternativa apresenta características corretas do filo Mollusca?",
            "alternativas" => [
                [
                    "id_alternativa" => 60,
                    "texto" => "São animais segmentados, com esqueleto interno e corpo dividido em anéis.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 61,
                    "texto" => "São triblásticos, possuem corpo não segmentado e apresentam pé muscular, manto e, geralmente, concha.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 62,
                    "texto" => "São animais diblásticos, com simetria radial e tentáculos ao redor da boca.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 63,
                    "texto" => "São animais acelomados, com corpo achatado e ausência de sistemas circulatório e digestório.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 17,
            "enunciado" => "Qual é a função do manto nos moluscos?",
            "alternativas" => [
                [
                    "id_alternativa" => 64,
                    "texto" => "Realizar exclusivamente a digestão dos alimentos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 65,
                    "texto" => " Produzir células nervosas e controlar os movimentos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 66,
                    "texto" => "Secretar a concha e delimitar a cavidade do manto, onde podem estar localizadas estruturas respiratórias.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 67,
                    "texto" => "Bombear o sangue para todas as partes do corpo.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 18,
            "enunciado" => " Como funciona o sistema circulatório da maioria dos moluscos?",
            "alternativas" => [
                [
                    "id_alternativa" => 68,
                    "texto" => " É aberto, com coração, vasos e seios sanguíneos, sendo geralmente fechado nos cefalópodes.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 69,
                    "texto" => "É fechado em todos os grupos, com sangue circulando exclusivamente dentro de vasos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 70,
                    "texto" => "É ausente, e os nutrientes são distribuídos exclusivamente por difusão.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 71,
                    "texto" => " É aberto, mas não possui coração nem vasos sanguíneos.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 19,
            "enunciado" => " Qual estrutura da maioria dos moluscos é utilizada para raspar o alimento?",
            "alternativas" => [
                [
                    "id_alternativa" => 72,
                    "texto" => "Manto",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 73,
                    "texto" => "Metanefrídio.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 74,
                    "texto" => "Pé muscular.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 75,
                    "texto" => "Rádula.",
                    "correto" => 1,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 20,
            "enunciado" => "A rádula é uma estrutura presente na maioria dos moluscos e está relacionada à alimentação. Entretanto, os bivalves, como ostras e mexilhões, não possuem essa estrutura. Como esses animais obtêm seu alimento principalmente?",
            "alternativas" => [
                [
                    "id_alternativa" => 76,
                    "texto" => " Por meio da filtração de partículas suspensas na água.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 77,
                    "texto" => "Pela captura de presas utilizando tentáculos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 78,
                    "texto" => "Pela absorção de nutrientes diretamente pela concha.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 79,
                    "texto" => "Pela raspagem de algas sobre as rochas.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ]
    ],
    5 => [ 
            [
            "id_pergunta" => 21,
            "enunciado" => "Qual alternativa apresenta características corretas do filo Annelida?",
            "alternativas" => [
                [
                    "id_alternativa" => 80,
                    "texto" => "São animais diblásticos, com simetria radial e corpo formado por tentáculos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 81,
                    "texto" => "São triblásticos, apresentam simetria bilateral e corpo metamerizado, dividido em segmentos.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 82,
                    "texto" => "São acelomados, possuem corpo achatado e sistema digestório incompleto.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 83,
                    "texto" => "São animais com exoesqueleto de quitina e apêndices articulados.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 22,
            "enunciado" => "Qual alternativa apresenta características corretas do sistema circulatório dos anelídeos?",
            "alternativas" => [
                [
                    "id_alternativa" => 84,
                    "texto" => "É aberto, não apresenta vasos sanguíneos e transporta substâncias por difusão.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 85,
                    "texto" => " É fechado, apresenta organização segmentar e pode possuir pigmentos respiratórios.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 86,
                    "texto" => " É ausente, pois as trocas gasosas ocorrem exclusivamente pela pele.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 87,
                    "texto" => "É fechado, mas não apresenta pigmentos respiratórios em nenhuma espécie.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 23,
            "enunciado" => "As minhocas realizam trocas gasosas através da pele. Para que esse processo ocorra adequadamente, é necessário que:",
            "alternativas" => [
                [
                    "id_alternativa" => 88,
                    "texto" => "A pele permaneça úmida, permitindo a difusão dos gases respiratórios.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 89,
                    "texto" => "O corpo apresente pulmões para absorver o oxigênio atmosférico.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 90,
                    "texto" => "As cerdas produzam oxigênio para as células.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 91,
                    "texto" => "O celoma permaneça cheio de ar para transportar oxigênio.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 24,
            "enunciado" => "Qual é a função do fluido presente no celoma dos anelídeos?",
            "alternativas" => [
                [
                    "id_alternativa" => 91,
                    "texto" => "Realizar exclusivamente a digestão dos alimentos",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 92,
                    "texto" => "Transportar os impulsos nervosos entre os gânglios.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 93,
                    "texto" => "Promover a sustentação do corpo e atuar como um esqueleto hidrostático.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 94,
                    "texto" => "Produzir as cerdas utilizadas na locomoção.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 25,
            "enunciado" => "Sobre o sistema digestório dos anelídeos, assinale a alternativa correta.",
            "alternativas" => [
                [
                    "id_alternativa" => 95,
                    "texto" => "É incompleto, apresentando apenas uma abertura para entrada e saída de alimentos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 96,
                    "texto" => "É completo, mas apresenta organização segmentar, com um sistema digestório independente em cada metâmero.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 97,
                    "texto" => " É ausente, sendo a digestão realizada exclusivamente pelas células da pele.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 98,
                    "texto" => "É completo, apresentando boca e ânus, mas sem organização segmentar.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ]
    ],
    6 => [ 
            [
            "id_pergunta" => 26,
            "enunciado" => "Qual alternativa apresenta características corretas do filo Arthropoda?",
            "alternativas" => [
                [
                    "id_alternativa" => 99,
                    "texto" => "São animais com corpo não segmentado, ausência de apêndices articulados e sistema circulatório fechado.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 100,
                    "texto" => "São animais com simetria radial, corpo mole e sistema digestório incompleto.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 101,
                    "texto" => "São triblásticos, apresentam simetria bilateral, apêndices articulados e exoesqueleto de quitina.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 102,
                    "texto" => "São animais acelomados, com corpo achatado e ausência de sistemas circulatório e respiratório.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 27,
            "enunciado" => "Qual é a principal função do exoesqueleto dos artrópodes?",
            "alternativas" => [
                [
                    "id_alternativa" => 103,
                    "texto" => "Realizar as trocas gasosas e transportar nutrientes pelo organismo.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 104,
                    "texto" => "Proteger e sustentar o corpo, além de servir de ponto de inserção para os músculos.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 105,
                    "texto" => "Realizar a digestão e absorver os nutrientes dos alimentos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 106,
                    "texto" => " Produzir células reprodutivas e controlar o sistema nervoso.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 28,
            "enunciado" => "Os artrópodes precisam trocar seu exoesqueleto periodicamente para crescer. Esse processo é chamado de muda ou ecdise. Isso ocorre porque:",
            "alternativas" => [
                [
                    "id_alternativa" => 107,
                    "texto" => "O exoesqueleto é rígido e limita o crescimento contínuo do animal.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 108,
                    "texto" => "O exoesqueleto é formado exclusivamente por células vivas que se dividem durante o crescimento.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 109,
                    "texto" => " A troca do exoesqueleto permite que o animal transforme seu sistema circulatório aberto em fechado.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 120,
                    "texto" => " O exoesqueleto impede completamente a movimentação dos apêndices durante toda a vida.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 29,
            "enunciado" => "Como funciona o sistema circulatório dos artrópodes?",
            "alternativas" => [
                [
                    "id_alternativa" => 121,
                    "texto" => "É fechado, com o sangue circulando exclusivamente dentro dos vasos sanguíneos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 122,
                    "texto" => "É ausente, e todas as substâncias são transportadas exclusivamente pelo sistema digestório.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 123,
                    "texto" => "É fechado, com o coração localizado na região ventral do corpo.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 124,
                    "texto" => "É aberto, com coração dorsal e circulação da hemolinfa pela hemocele",
                    "correto" => 1,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 30,
            "enunciado" => "Os artrópodes apresentam diferentes estruturas respiratórias, dependendo do grupo e do ambiente em que vivem. Qual alternativa apresenta exemplos corretos dessas estruturas?",
            "alternativas" => [
                [
                    "id_alternativa" => 125,
                    "texto" => "Pulmões em todos os artrópodes, independentemente do ambiente.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 126,
                    "texto" => "Pele úmida exclusivamente, como ocorre nas minhocas.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 127,
                    "texto" => "Brânquias em muitos crustáceos, traqueias em muitos insetos e pulmões foliáceos em alguns aracnídeos.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 128,
                    "texto" => "Parapódios em insetos, brânquias em todos os aracnídeos e pulmões em todos os crustáceos.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ]
    ],
    8 => [ 
            [
            "id_pergunta" => 31,
            "enunciado" => "Qual alternativa apresenta características corretas do filo Echinodermata?",
            "alternativas" => [
                [
                    "id_alternativa" => 129,
                    "texto" => "São animais segmentados, com simetria bilateral na fase adulta e exoesqueleto de quitina.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 130,
                    "texto" => " São animais diblásticos, com simetria radial e tentáculos ao redor da boca.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 131,
                    "texto" => "São animais triblásticos, não segmentados, com endoesqueleto calcário e, geralmente, simetria radial pentâmera na fase adulta.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 132,
                    "texto" => "São animais acelomados, com corpo achatado e sistema digestório incompleto.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 32,
            "enunciado" => "O sistema hidrovascular é uma característica marcante dos equinodermos. Qual é uma de suas principais funções?",
            "alternativas" => [
                [
                    "id_alternativa" => 133,
                    "texto" => "Produzir células reprodutivas e controlar a fecundação.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 134,
                    "texto" => "Auxiliar na locomoção, na captura de alimentos e nas trocas gasosas por meio dos pés ambulacrais.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 135,
                    "texto" => "Realizar exclusivamente a digestão dos alimentos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 136,
                    "texto" => "Transportar o sangue por uma rede de vasos fechados.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 33,
            "enunciado" => "Os equinodermos apresentam endoesqueleto formado por ossículos calcários, que podem estar associados a espinhos. Esse esqueleto:",
            "alternativas" => [
                [
                    "id_alternativa" => 137,
                    "texto" => "É uma estrutura interna que contribui para a sustentação e a proteção do animal.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 138,
                    "texto" => "É um revestimento externo de quitina que precisa ser trocado durante o crescimento.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 139,
                    "texto" => "É formado exclusivamente por cartilagem e está presente apenas nas larvas.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 140,
                    "texto" => "É responsável diretamente pela produção de gametas.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 34,
            "enunciado" => "Diferentemente de muitos outros invertebrados, os equinodermos adultos geralmente apresentam simetria radial pentâmera. Isso significa que:",
            "alternativas" => [
                [
                    "id_alternativa" => 141,
                    "texto" => "O corpo é dividido em cabeça, tórax e abdômen.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 142,
                    "texto" => "O corpo apresenta dois lados simétricos, direito e esquerdo, em todas as fases da vida.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 143,
                    "texto" => "O corpo não apresenta nenhum tipo de simetria",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 144,
                    "texto" => "O corpo apresenta, geralmente, cinco partes ou regiões organizadas ao redor de um eixo central.",
                    "correto" => 2,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 35,
            "enunciado" => " As estrelas-do-mar podem regenerar partes perdidas do corpo. Essa capacidade está relacionada:",
            "alternativas" => [
                [
                    "id_alternativa" => 145,
                    "texto" => " À presença de exoesqueleto de quitina, que permite a formação de novos segmentos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 18,
                    "texto" => "À capacidade de realizar reprodução exclusivamente por brotamento.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 146,
                    "texto" => "À capacidade de regeneração de partes do corpo, embora a formação de um novo indivíduo completo dependa da espécie e das condições envolvidas.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 147,
                    "texto" => " À ausência de sistema nervoso e de órgãos internos.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ]
    ],
    2 => [ 
            [
            "id_pergunta" => 36,
            "enunciado" => "Qual alternativa apresenta características corretas do filo Cnidaria?",
            "alternativas" => [
                [
                    "id_alternativa" => 148,
                    "texto" => "São animais triblásticos, com simetria bilateral e corpo segmentado.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 149,
                    "texto" => "São animais diblásticos, com simetria radial e células especializadas chamadas cnidócitos.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 150,
                    "texto" => " São animais acelomados, com corpo achatado e sistema digestório completo.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 151,
                    "texto" => " São animais unicelulares, com organização corporal baseada em colônias.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 37,
            "enunciado" => "Como ocorre a digestão nos cnidários?",
            "alternativas" => [
                [
                    "id_alternativa" => 152,
                    "texto" => "É exclusivamente intracelular, realizada no interior dos cnidócitos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 153,
                    "texto" => " É exclusivamente extracelular, realizada em um tubo digestório completo.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 154,
                    "texto" => "É realizada por órgãos especializados, como estômago e intestino.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 155,
                    "texto" => " Inicia-se extracelularmente na cavidade gastrovascular e termina intracelularmente nas células da gastroderme.",
                    "correto" => 1,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 38,
            "enunciado" => " Os cnidários não possuem sistemas circulatório, respiratório e excretor especializados. Como realizam as trocas gasosas e a eliminação de resíduos metabólicos?",
            "alternativas" => [
                [
                    "id_alternativa" => 156,
                    "texto" => " Por meio de pulmões e estruturas especializadas de excreção.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 157,
                    "texto" => "Principalmente por difusão através da superfície corporal.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 158,
                    "texto" => "Por meio de um sistema circulatório aberto, que transporta os gases.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 159,
                    "texto" => "Por meio de brânquias conectadas à cavidade gastrovascular.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 39,
            "enunciado" => " Os cnidários podem apresentar reprodução sexuada e assexuada. Qual alternativa apresenta um exemplo de reprodução assexuada nesses animais?",
            "alternativas" => [
                [
                    "id_alternativa" => 160,
                    "texto" => "Produção de gametas masculinos e femininos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 161,
                    "texto" => "Fecundação dos gametas na água.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 162,
                    "texto" => "Formação de novos indivíduos por brotamento.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 163,
                    "texto" => "Desenvolvimento de uma larva a partir de um ovo fecundado.",
                    "correto" => 0,
                    "explicacao" => ""
                ]
            ]
        ],
        [
            "id_pergunta" => 40,
            "enunciado" => "Sobre o habitat dos cnidários, assinale a alternativa correta.",
            "alternativas" => [
                [
                    "id_alternativa" => 164,
                    "texto" => "São exclusivamente terrestres, vivendo em ambientes úmidos.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 165,
                    "texto" => "São exclusivamente aquáticos, sendo a maioria marinha e existindo poucas espécies de água doce.",
                    "correto" => 1,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 166,
                    "texto" => "São exclusivamente marinhos, não existindo espécies de água doce.",
                    "correto" => 0,
                    "explicacao" => ""
                ],
                [
                    "id_alternativa" => 167,
                    "texto" => "São encontrados principalmente em ambientes terrestres e de água doce.",
                    "correto" => 0,
                    "explicacao" => ""
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
    <link rel="stylesheet" href="css/quiz.css">
</head>
<body>
    <div class="quiz-box" id="quiz-container">
        <div class="quiz-header">
            <span class="quiz-subtitulo">Quiz de Evolução</span>
            <button type="button" class="btn-voltar-topo" onclick="window.location.href='SalaArvore.php?id=<?php echo $id_turma; ?>'">
                Voltar para a Árvore
            </button>
        </div>

        <h2 id="pergunta-texto" class="pergunta-titulo">Carregando pergunta...</h2>
        
        <div id="opcoes-container"></div>

        <div id="feedback-container" class="feedback-box">
            <h3 class="feedback-titulo">Entenda as alternativas:</h3>
            <div id="lista-explicacoes"></div>
            
            <div class="btn-proxima-wrapper">
                <button id="btn-proxima" class="btn-avancar">Próxima</button>
            </div>
        </div>
    </div>

<script>
const perguntas = <?php echo json_encode($perguntasAtuais); ?>;
const idAluno = <?php echo (int)$id_aluno; ?>;
const idEvolucao = <?php echo (int)$id_evolucao; ?>;
const idTurma = <?php echo (int)$id_turma; ?>;

let indiceAtual = 0;
let respostasAluno = [];
let respondeuAtual = false;

function mostrarPergunta() {
    respondeuAtual = false;
    const feedbackContainer = document.getElementById("feedback-container");
    if (feedbackContainer) {
        feedbackContainer.style.display = "none";
    }

    if (!perguntas || perguntas.length === 0) {
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

    respostasAluno.push({
        id_pergunta: pergunta.id_pergunta,
        id_alternativa: alternativaEscolhida.id_alternativa,
        correto: alternativaEscolhida.correto
    });

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

    const listaExp = document.getElementById("lista-explicacoes");
    listaExp.innerHTML = "";

    pergunta.alternativas.forEach((alt) => {
        const divExp = document.createElement("div");
        divExp.className = `feedback-item ${alt.correto === 1 ? 'certo' : 'errado'}`;
        divExp.innerHTML = `<strong>${alt.texto}:</strong> ${alt.explicacao}`;
        listaExp.appendChild(divExp);
    });

    const btnProxima = document.getElementById("btn-proxima");
    btnProxima.textContent = (indiceAtual === perguntas.length - 1) ? "Finalizar Quiz" : "Próxima";

    document.getElementById("feedback-container").style.display = "block";
}

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

    const paginaArvore = `SalaArvore.php?id=${idTurma}`;

    fetch("salvar_quiz.php", {
        method: "POST",
        body: dados
    })
    .then(res => res.json())
    .then(data => {
        const container = document.getElementById("quiz-container");
        
        if (data.sucesso === false) {
            container.innerHTML = `
                <h2 class="resultado-titulo-erro">Erro ao salvar no banco:</h2>
                <p>${data.erro}</p>
                <button class="btn-avancar" onclick="window.location.href='${paginaArvore}'">Voltar para a Árvore</button>
            `;
            return;
        }

        if (data.liberado) {
            container.innerHTML = `
                <h2 class="resultado-titulo-sucesso">Parabéns! Você atingiu ${porcentagem}% de acertos!</h2>
                <p>O próximo filo foi desbloqueado na sua árvore.</p>
                <div class="resultado-acoes">
                    <button class="btn-avancar" onclick="window.location.href='${paginaArvore}'">Voltar para a Árvore</button>
                </div>
            `;
        } else {
            const numeroFormatado = String(idEvolucao).padStart(2, '0');
            const paginaFilo = `Filo${numeroFormatado}.php?id=${idTurma}`;

            container.innerHTML = `
                <h2 class="resultado-titulo-erro">Você atingiu ${porcentagem}% de acertos.</h2>
                <p>Você precisa de pelo menos 70% para liberar o próximo filo.</p>
                
                <div class="resultado-acoes">
                    <button class="btn-avancar" onclick="window.location.href='${paginaFilo}'">
                        Recomeçar Filo (Revisar)
                    </button>

                    <button class="btn-avancar btn-secundario" onclick="location.reload()">
                        Refazer Apenas o Quiz
                    </button>

                    <button class="btn-avancar btn-outline" onclick="window.location.href='${paginaArvore}'">
                        Voltar para a Árvore
                    </button>
                </div>
            `;
        }
    })
    .catch(err => {
        console.error(err);
        alert("Erro de comunicação com salvar_quiz.php. Verifique o console (F12).");
    });
}

mostrarPergunta();
</script>
</body>
</html>