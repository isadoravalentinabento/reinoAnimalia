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
                    "explicacao" => "Os poríferos não possuem órgãos nem sistemas especializados. Apresentam uma organização corporal simples, com diferentes tipos de células que desempenham funções essenciais. "
                ],
                [
                    "id_alternativa" => 2, 
                    "texto" => "São unicelulares e vivem em colônias.", 
                    "correto" => 0,
                    "explicacao" => "Os poríferos são multicelulares, ou seja, formados por várias células que desempenham diferentes funções no organismo."
                ],
                [
                    "id_alternativa" => 3, 
                    "texto" => "São multicelulares e possuem o corpo com poros.", 
                    "correto" => 1,
                    "explicacao" => "Os poríferos são animais multicelulares que apresentam numerosos poros na superfície do corpo, por onde a água entra e circula, sendo fundamental para sua alimentação, respiração e eliminação de resíduos."
                ],
                [
                    "id_alternativa" => 4, 
                    "texto" => "Possuem corpo segmentado", 
                    "correto" => 0,
                    "explicacao" => "Os poríferos não apresentam corpo dividido em segmentos. Seu corpo possui uma organização simples, com poros, canais internos e aberturas por onde a água circula."
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
                    "explicacao" => "Os cnidócitos são células especializadas na defesa e captura de presas, características dos cnidários, e não dos poríferos."
                ],
                [
                    "id_alternativa" => 6, 
                    "texto" => "Óstios", 
                    "correto" => 1,
                    "explicacao" => "Os óstios são os poros por onde a água entra no corpo das esponjas, permitindo a circulação necessária para sua alimentação, respiração e eliminação de resíduos."
                ],
                [
                    "id_alternativa" => 7, 
                    "texto" => "Tentáculos.", 
                    "correto" => 0,
                    "explicacao" => "Tentáculos são estruturas presentes em diversos grupos de animais, geralmente relacionadas à captura de alimentos ou à percepção de estímulos. As esponjas não possuem tentáculos."
                ],
                [
                    "id_alternativa" => 8, 
                    "texto" => "Espiráculos.", 
                    "correto" => 0,
                    "explicacao" => "Os espiráculos são aberturas relacionadas à respiração de alguns animais, como os insetos. Nos poríferos, a entrada de água ocorre pelos óstios."
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
                    "explicacao" => "A simetria bilateral ocorre quando o corpo pode ser dividido em duas metades semelhantes por um único plano. Essa característica não ocorre nos poríferos."
                ],
                [
                    "id_alternativa" => 10, 
                    "texto" => "Sempre radial.", 
                    "correto" => 0,
                    "explicacao" => "A simetria radial permite dividir o corpo em partes semelhantes a partir de diferentes planos que passam pelo eixo central. Algumas esponjas apresentam essa simetria, mas não todas."
                ],
                [
                    "id_alternativa" => 11, 
                    "texto" => "Assimétrica", 
                    "correto" => 1,
                    "explicacao" => "A maioria dos poríferos é assimétrica, ou seja, não apresenta um padrão definido de divisão do corpo em partes equivalentes. Algumas espécies, entretanto, podem apresentar simetria radial."
                ],
                [
                    "id_alternativa" => 12, 
                    "texto" => "Sempre bilateral e radial ao mesmo tempo.", 
                    "correto" => 0,
                    "explicacao" => "A simetria bilateral e a radial são diferentes formas de organização corporal. A maioria dos poríferos é assimétrica (não possui simetria) e nenhum deles apresenta simetria bilateral."
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
                    "explicacao" => "Os poríferos não possuem estômago nem sistema digestório. Portanto, não realizam digestão extracelular nesse órgão."
                ],
                [
                    "id_alternativa" => 14, 
                    "texto" => "Extracelular, realizada no intestino.", 
                    "correto" => 0,
                    "explicacao" => "Os poríferos não possuem intestino. A digestão ocorre no interior das células, e não em uma cavidade digestória ou órgão."
                ],
                [
                    "id_alternativa" => 15, 
                    "texto" => "Intracelular, realizada no interior das células.", 
                    "correto" => 1,
                    "explicacao" => "Os poríferos realizam digestão intracelular. Os coanócitos capturam partículas alimentares, e outras células, como os amebócitos, também participam do processamento e da distribuição dos nutrientes pelo corpo."
                ],
                [
                    "id_alternativa" => 16, 
                    "texto" => "Mista, realizada no estômago e nas células.", 
                    "correto" => 0,
                    "explicacao" => "A digestão mista envolve etapas extracelulares e intracelulares, mas os poríferos não possuem estômago e realizam a digestão exclusivamente de forma intracelular."
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
                    "explicacao" => "Os poríferos adultos não nadam livremente. Eles permanecem fixados a um substrato, embora muitas espécies possuam larvas móveis durante uma fase do desenvolvimento."
                ],
                [
                    "id_alternativa" => 18, 
                    "texto" => "São sésseis, permanecendo fixos a um substrato", 
                    "correto" => 1,
                    "explicacao" => "Os poríferos adultos são animais sésseis, ou seja, vivem fixos em locais como rochas, corais e outros substratos submersos, sem se deslocarem de um lugar para outro."
                ],
                [
                    "id_alternativa" => 19, 
                    "texto" => "Caminham sobre o fundo marinho.", 
                    "correto" => 0,
                    "explicacao" => "Os poríferos não possuem estruturas de locomoção que permitam caminhar. Seu modo de vida adulto é séssil."
                ],
                [
                    "id_alternativa" => 20, 
                    "texto" => "Vivem exclusivamente como parasitas.", 
                    "correto" => 0,
                    "explicacao" => "Os poríferos não são animais parasitas. São organismos aquáticos que, em sua maioria, vivem fixos e obtêm alimento filtrando partículas presentes na água."
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
                    "explicacao" => "A maioria das planárias é de vida livre, e não parasita. Além disso, os platelmintos que possuem sistema digestório geralmente apresentam sistema incompleto, com apenas uma abertura, e as tênias não possuem sistema digestório."
                ],
                [
                    "id_alternativa" => 22, 
                    "texto" => "Tênias são de vida livre, e os platelmintos possuem sistemas respiratório e circulatório.", 
                    "correto" => 0,
                    "explicacao" => "As tênias são parasitas que vivem no interior de hospedeiros. Os platelmintos não possuem sistemas respiratório e circulatório especializados, realizando trocas gasosas por difusão através da superfície corporal."
                ],
                [
                    "id_alternativa" => 23, 
                    "texto" => " Planárias são, em sua maioria, de vida livre; tênias são parasitas; e os platelmintos não possuem sistemas respiratório e circulatório.", 
                    "correto" => 1,
                    "explicacao" => "As planárias são, em sua maioria, organismos de vida livre, enquanto as tênias são parasitas. Os platelmintos não possuem sistemas respiratório e circulatório especializados, e as trocas gasosas ocorrem por difusão através do corpo."
                ],
                [
                    "id_alternativa" => 24, 
                    "texto" => "Esquistossomos são de vida livre, e os platelmintos possuem cavidade corporal revestida por mesoderma.", 
                    "correto" => 0,
                    "explicacao" => "Os esquistossomos são parasitas, e os platelmintos são acelomados, ou seja, não possuem cavidade corporal revestida por mesoderma, característica chamada de celoma."
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
                    "explicacao" => "Os platelmintos não possuem pulmões nem sistema circulatório fechado. As trocas gasosas ocorrem diretamente através da superfície corporal, por difusão."
                ],
                [
                    "id_alternativa" => 26,
                    "texto" => "Por brânquias e sistema circulatório aberto.",
                    "correto" => 0,
                    "explicacao" => "Os platelmintos não possuem brânquias nem sistema circulatório aberto. A respiração ocorre por difusão através da superfície do corpo, sem órgãos respiratórios especializados."
                ],
                [
                    "id_alternativa" => 27,
                    "texto" => "Por órgãos respiratórios e vasos sanguíneos",
                    "correto" => 0,
                    "explicacao" => "Os platelmintos não possuem órgãos respiratórios especializados nem vasos sanguíneos. Como não apresentam sistema circulatório, os nutrientes são distribuídos pelo organismo sem a participação desse sistema."
                ],
                [
                    "id_alternativa" => 28,
                    "texto" => "Não possuem sistemas respiratório e circulatório; as trocas gasosas ocorrem por difusão.",
                    "correto" => 1,
                    "explicacao" => "Os platelmintos não possuem sistemas respiratório e circulatório especializados. O oxigênio e o gás carbônico são trocados por difusão através da superfície corporal, e os nutrientes são distribuídos sem a participação de um sistema circulatório."
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
                    "explicacao" => "Muitos platelmintos parasitas apresentam ciclos de vida indiretos, passando por diferentes hospedeiros durante seu desenvolvimento. Esses hospedeiros podem abrigar diferentes fases do ciclo de vida do parasita, até que ele alcance a fase adulta ou complete seu desenvolvimento."
                ],
                [
                    "id_alternativa" => 30,
                    "texto" => "Porque não conseguem realizar reprodução sexuada.",
                    "correto" => 0,
                    "explicacao" => "Muitos platelmintos realizam reprodução sexuada, e diversas espécies são hermafroditas, possuindo estruturas reprodutoras masculinas e femininas no mesmo indivíduo. O ciclo indireto está relacionado à necessidade de diferentes hospedeiros durante o desenvolvimento, e não à incapacidade de reprodução sexuada."
                ],
                [
                    "id_alternativa" => 31,
                    "texto" => "Porque não possuem sistema nervoso.",
                    "correto" => 0,
                    "explicacao" => "Os platelmintos possuem sistema nervoso relativamente simples, geralmente formado por gânglios nervosos na região anterior do corpo e cordões nervosos longitudinais. A presença de diferentes hospedeiros nos ciclos de vida não está relacionada à ausência de sistema nervoso."
                ],
                [
                    "id_alternativa" => 32,
                    "texto" => "Porque precisam se transformar em animais de vida livre.",
                    "correto" => 0,
                    "explicacao" => "Os platelmintos parasitas não precisam necessariamente se transformar em animais de vida livre para completar seu ciclo de vida. Muitas espécies passam por diferentes fases de desenvolvimento dentro de hospedeiros, podendo permanecer parasitas durante todo o ciclo."
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
                    "explicacao" => "Os platelmintos não possuem sistema digestório completo. Na maioria das espécies que apresentam esse sistema, ele é incompleto, possuindo boca, mas não ânus. Os resíduos não digeridos são eliminados pela mesma abertura."
                ],
                [
                    "id_alternativa" => 34,
                    "texto" => "É incompleto, com uma única abertura, podendo estar ausente em alguns grupos.",
                    "correto" => 1,
                    "explicacao" => "A maioria dos platelmintos que possui sistema digestório apresenta uma única abertura, que funciona como boca e por onde também são eliminados os resíduos não digeridos. Nas tênias, o sistema digestório é ausente, e os nutrientes são absorvidos diretamente pela superfície corporal."
                ],
                [
                    "id_alternativa" => 35,
                    "texto" => "Está ausente em todos os representantes do filo.",
                    "correto" => 0,
                    "explicacao" => "O sistema digestório não está ausente em todos os platelmintos. As planárias, por exemplo, possuem sistema digestório incompleto, com boca e faringe, enquanto as tênias não possuem sistema digestório."
                ],
                [
                    "id_alternativa" => 36,
                    "texto" => "Possui duas aberturas em todas as espécies.",
                    "correto" => 0,
                    "explicacao" => "Os platelmintos não apresentam sistema digestório completo com duas aberturas em todas as espécies. Na maioria dos que possuem sistema digestório, existe apenas uma abertura, e nas tênias esse sistema é ausente."
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
                    "explicacao" => "Os ocelos são estruturas relacionadas à percepção da luz, presentes em algumas planárias. Eles não participam da excreção, mas ajudam o animal a perceber a intensidade e a direção da luz."
                ],
                [
                    "id_alternativa" => 38,
                    "texto" => "Gânglios nervosos, que filtram substâncias do organismo.",
                    "correto" => 0,
                    "explicacao" => "Os gânglios nervosos fazem parte do sistema nervoso e estão relacionados ao processamento de estímulos e à coordenação das respostas do organismo. Não são estruturas responsáveis pela excreção."
                ],
                [
                    "id_alternativa" => 39,
                    "texto" => "Células-flama, que fazem parte dos protonefrídios.",
                    "correto" => 1,
                    "explicacao" => "As células-flama fazem parte do sistema excretor dos platelmintos, compondo os protonefrídios. Essas estruturas participam da eliminação de resíduos metabólicos e da regulação da quantidade de água no organismo."
                ],
                [
                    "id_alternativa" => 40,
                    "texto" => "Faringe, responsável pela eliminação de resíduos.",
                    "correto" => 0,
                    "explicacao" => "A faringe é uma estrutura relacionada à alimentação, permitindo a ingestão de alimentos. Nas planárias, ela pode se projetar para fora do corpo para capturar e ingerir o alimento, não sendo responsável pela excreção."
                ]
            ]
        ]
    ],
    4 => [ 
            [
            "id_pergunta" => 11,
            "enunciado" => "Qual alternativa apresenta características corretas dos animais nematódeos?",
            "alternativas" => [
                [
                    "id_alternativa" => 41,
                    "texto" => " São diblásticos, possuem simetria radial e corpo segmentado.",
                    "correto" => 0,
                    "explicacao" => "Os nematódeos são triblásticos, possuem simetria bilateral e corpo não segmentado. Além disso, não apresentam simetria radial, nem corpo dividido em segmentos."
                ],
                [
                    "id_alternativa" => 42,
                    "texto" => "São triblásticos, possuem simetria bilateral, corpo não segmentado e uma cavidade corporal chamada pseudocele.",
                    "correto" => 1,
                    "explicacao" => "Os nematódeos apresentam três folhetos germinativos, simetria bilateral e corpo cilíndrico não segmentado. Também possuem uma cavidade corporal chamada pseudoceloma, preenchida por líquido, que auxilia na sustentação e na distribuição de substâncias."
                ],
                [
                    "id_alternativa" => 43,
                    "texto" => " São triblásticos, possuem simetria radial e não apresentam cavidade corporal.",
                    "correto" => 0,
                    "explicacao" => "Os nematódeos possuem simetria bilateral, e não radial. Além disso, apresentam pseudoceloma, uma cavidade corporal que fica entre a parede do corpo e o tubo digestório."
                ],
                [
                    "id_alternativa" => 44,
                    "texto" => "São acelomados, possuem simetria bilateral e corpo segmentado.",
                    "correto" => 0,
                    "explicacao" => "Os nematódeos são nematódeos, pois possuem uma cavidade corporal chamada pseudoceloma. Também apresentam corpo não segmentado, diferentemente dos animais que possuem o corpo dividido em segmentos."
                ]
            ]
        ],
        [
            "id_pergunta" => 12,
            "enunciado" => "Como é o sistema digestório da maioria dos nematódeos?",
            "alternativas" => [
                [
                    "id_alternativa" => 45,
                    "texto" => "Incompleto, com apenas uma abertura para entrada de alimentos e eliminação de resíduos.",
                    "correto" => 0,
                    "explicacao" => "Os nematódeos possuem sistema digestório completo, com duas aberturas: boca e ânus. Dessa forma, o alimento entra por uma abertura e os resíduos são eliminados por outra."
                ],
                [
                    "id_alternativa" => 46,
                    "texto" => "Ausente em todos os representantes desses filos.",
                    "correto" => 0,
                    "explicacao" => "Os nematódeos possuem sistema digestório completo e especializado, formado por boca, faringe e intestino, além de uma abertura para eliminação dos resíduos."
                ],
                [
                    "id_alternativa" => 47,
                    "texto" => "Completo, com boca, intestino e ânus.",
                    "correto" => 1,
                    "explicacao" => "Os nematódeos possuem sistema digestório completo, com boca e ânus, permitindo que o alimento percorra o tubo digestório em um único sentido. A ressalva sobre os acantocéfalos se refere a outro grupo de animais nematódeos, que não possui sistema digestório."
                ],
                [
                    "id_alternativa" => 48,
                    "texto" => "Completo, mas sem boca, com absorção de nutrientes pela pele em todos os grupos.",
                    "correto" => 0,
                    "explicacao" => "Os nematódeos possuem boca, por onde o alimento entra, e intestino, onde ocorre a digestão e a absorção de nutrientes. A absorção diretamente pela superfície corporal é característica de outros grupos, como as tênias, e não dos nematódeos."
                ]
            ]
        ],
        [
            "id_pergunta" => 13,
            "enunciado" => "Como ocorrem a respiração e a circulação nos nematódeos?",
            "alternativas" => [
                [
                    "id_alternativa" => 49,
                    "texto" => "Possuem pulmões e sistema circulatório fechado.",
                    "correto" => 0,
                    "explicacao" => "Os nematódeos não possuem pulmões nem sistema circulatório fechado. As trocas gasosas ocorrem por difusão através da superfície corporal."
                ],
                [
                    "id_alternativa" => 50,
                    "texto" => "Possuem brânquias e sistema circulatório aberto.",
                    "correto" => 0,
                    "explicacao" => "Os nematódeos não possuem brânquias nem sistema circulatório aberto. Não apresentam órgãos respiratórios ou circulatórios especializados."
                ],
                [
                    "id_alternativa" => 51,
                    "texto" => "Possuem órgãos respiratórios, mas não apresentam sistema circulatório.",
                    "correto" => 0,
                    "explicacao" => "Os nematódeos não possuem órgãos respiratórios especializados. As trocas gasosas ocorrem por difusão através da superfície corporal, e o líquido presente no pseudoceloma auxilia na distribuição de substâncias pelo organismo."
                ],
                [
                    "id_alternativa" => 52,
                    "texto" => "Não possuem sistemas respiratório e circulatório especializados.",
                    "correto" => 1,
                    "explicacao" => "Os nematódeos não possuem sistemas respiratório e circulatório especializados. O oxigênio e o gás carbônico são trocados por difusão através da superfície corporal, enquanto o líquido do pseudoceloma auxilia no transporte de substâncias."
                ]
            ]
        ],
        [
            "id_pergunta" => 14,
            "enunciado" => "Qual alternativa descreve corretamente a reprodução da maioria dos nematódeos?",
            "alternativas" => [
                [
                    "id_alternativa" => 53,
                    "texto" => "Geralmente possuem sexos separados, e os machos frequentemente são menores que as fêmeas.",
                    "correto" => 1,
                    "explicacao" => "A maioria dos nematódeos apresenta sexos separados, ou seja, existem indivíduos machos e fêmeas. Em muitas espécies, os machos são menores que as fêmeas, característica relacionada ao dimorfismo sexual."
                ],
                [
                    "id_alternativa" => 54,
                    "texto" => "Todos são hermafroditas e realizam exclusivamente autofecundação",
                    "correto" => 0,
                    "explicacao" => "A maioria dos nematódeos apresenta sexos separados, e não são todos hermafroditas. A reprodução geralmente ocorre de forma sexuada, com participação de indivíduos machos e fêmeas."
                ],
                [
                    "id_alternativa" => 55,
                    "texto" => "Todos se reproduzem assexuadamente por brotamento.",
                    "correto" => 0,
                    "explicacao" => "Os nematódeos geralmente apresentam reprodução sexuada, com machos e fêmeas. O brotamento não é a forma de reprodução característica desse grupo."
                ],
                [
                    "id_alternativa" => 56,
                    "texto" => "Apresentam fecundação externa e não produzem ovos.",
                    "correto" => 0,
                    "explicacao" => "A maioria dos nematódeos apresenta fecundação interna e produz ovos. O desenvolvimento pode envolver diferentes fases, dependendo da espécie."
                ]
            ]
        ],
        [
            "id_pergunta" => 15,
            "enunciado" => " Qual alternativa apresenta características corretas da organização corporal dos nematódeos?",
            "alternativas" => [
                [
                    "id_alternativa" => 57,
                    "texto" => "Possuem corpo segmentado, musculatura circular predominante e cílios em todos os grupos.",
                    "correto" => 0,
                    "explicacao" => "Os nematódeos possuem corpo não segmentado e musculatura predominantemente longitudinal, que permite movimentos de flexão e ondulação. Não apresentam cílios distribuídos por todo o corpo como característica geral."
                ],
                [
                    "id_alternativa" => 57,
                    "texto" => "Possuem corpo achatado dorsoventralmente e cavidade corporal ausente.",
                    "correto" => 0,
                    "explicacao" => "Os nematódeos possuem corpo cilíndrico e alongado, e não achatado dorsoventralmente. Além disso, apresentam pseudoceloma, uma cavidade corporal preenchida por líquido."
                ],
                [
                    "id_alternativa" => 58,
                    "texto" => " Possuem corpo geralmente vermiforme, cutícula espessada em muitos grupos e musculatura predominantemente longitudinal.",
                    "correto" => 1,
                    "explicacao" => "Os nematódeos possuem corpo alongado, cilíndrico e não segmentado, revestido por uma cutícula resistente. Sua musculatura é predominantemente longitudinal, permitindo movimentos de ondulação e flexão."
                ],
                [
                    "id_alternativa" => 59,
                    "texto" => "Possuem corpo dividido em cabeça, tórax e abdômen, com esqueleto interno.",
                    "correto" => 0,
                    "explicacao" => "Os nematódeos não possuem corpo dividido em cabeça, tórax e abdômen, nem esqueleto interno. Apresentam corpo cilíndrico e alongado, com uma cutícula externa resistente e pseudoceloma, que também auxilia na sustentação corporal."
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
                    "explicacao" => "Os moluscos possuem corpo mole e não segmentado, geralmente protegido por uma concha. Seu corpo é organizado em pé muscular, massa visceral e manto, e não dividido em anéis."
                ],
                [
                    "id_alternativa" => 61,
                    "texto" => "São triblásticos, possuem corpo não segmentado e apresentam pé muscular, manto e, geralmente, concha.",
                    "correto" => 1,
                    "explicacao" => "Os moluscos são animais triblásticos, geralmente com simetria bilateral e corpo não segmentado. Apresentam três regiões principais: pé muscular, massa visceral e manto. A maioria possui concha, que pode ser externa, interna, reduzida ou ausente, dependendo da espécie."
                ],
                [
                    "id_alternativa" => 62,
                    "texto" => "São animais diblásticos, com simetria radial e tentáculos ao redor da boca.",
                    "correto" => 0,
                    "explicacao" => "Os moluscos são triblásticos e geralmente apresentam simetria bilateral. A simetria radial e os tentáculos ao redor da boca são características relacionadas a outros grupos de animais, como os cnidários."
                ],
                [
                    "id_alternativa" => 63,
                    "texto" => "São animais acelomados, com corpo achatado e ausência de sistemas circulatório e digestório.",
                    "correto" => 0,
                    "explicacao" => "Os moluscos não possuem corpo achatado como característica geral e apresentam sistema digestório completo. A maioria também possui sistema circulatório, que geralmente é aberto, sendo fechado nos cefalópodes."
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
                    "explicacao" => "O manto não é responsável pela digestão. Ele recobre a massa visceral e, nas espécies que possuem concha, produz as substâncias que formam essa estrutura."
                ],
                [
                    "id_alternativa" => 65,
                    "texto" => " Produzir células nervosas e controlar os movimentos.",
                    "correto" => 0,
                    "explicacao" => "O manto não é responsável pela produção de células nervosas nem pelo controle dos movimentos. Essas funções estão relacionadas ao sistema nervoso, enquanto o manto recobre a massa visceral e participa da formação da concha."
                ],
                [
                    "id_alternativa" => 66,
                    "texto" => "Secretar a concha e delimitar a cavidade do manto, onde podem estar localizadas estruturas respiratórias.",
                    "correto" => 1,
                    "explicacao" => "O manto recobre a massa visceral e secreta as substâncias que formam a concha nos moluscos que a possuem. Entre o manto e o corpo existe a cavidade do manto, onde geralmente se encontram as brânquias nos moluscos aquáticos."
                ],
                [
                    "id_alternativa" => 67,
                    "texto" => "Bombear o sangue para todas as partes do corpo.",
                    "correto" => 0,
                    "explicacao" => "O manto não bombeia o sangue. Essa função é realizada pelo coração, que impulsiona o líquido circulatório pelo corpo do animal."
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
                    "explicacao" => "Na maioria dos moluscos, o sistema circulatório é aberto, ou seja, a hemolinfa sai dos vasos e circula por espaços entre os tecidos. Os cefalópodes, como polvos e lulas, são uma exceção, pois possuem sistema circulatório fechado, no qual o sangue permanece dentro dos vasos."
                ],
                [
                    "id_alternativa" => 69,
                    "texto" => "É fechado em todos os grupos, com sangue circulando exclusivamente dentro de vasos.",
                    "correto" => 0,
                    "explicacao" => "A maioria dos moluscos possui sistema circulatório aberto, no qual a hemolinfa circula por espaços entre os tecidos. O sistema fechado é uma característica dos cefalópodes, como polvos e lulas."
                ],
                [
                    "id_alternativa" => 70,
                    "texto" => "É ausente, e os nutrientes são distribuídos exclusivamente por difusão.",
                    "correto" => 0,
                    "explicacao" => "Os moluscos possuem sistema circulatório, geralmente aberto, com um coração que impulsiona a hemolinfa pelo corpo. Portanto, a distribuição de substâncias não ocorre exclusivamente por difusão."
                ],
                [
                    "id_alternativa" => 71,
                    "texto" => " É aberto, mas não possui coração nem vasos sanguíneos.",
                    "correto" => 0,
                    "explicacao" => "O sistema circulatório aberto dos moluscos possui coração e vasos. A hemolinfa circula por vasos e também por espaços entre os tecidos, retornando ao coração."
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
                    "explicacao" => "O manto recobre a massa visceral e pode secretar a concha. Não é a estrutura utilizada para raspar alimentos, função relacionada à rádula."
                ],
                [
                    "id_alternativa" => 73,
                    "texto" => "Metanefrídio.",
                    "correto" => 0,
                    "explicacao" => "Os metanefrídios são órgãos relacionados à excreção, responsáveis pela eliminação de resíduos metabólicos e pela filtragem de líquidos corporais. Não participam diretamente da raspagem dos alimentos."
                ],
                [
                    "id_alternativa" => 74,
                    "texto" => "Pé muscular.",
                    "correto" => 0,
                    "explicacao" => "O pé muscular está relacionado principalmente à locomoção, escavação ou fixação ao substrato. Nos caracóis, por exemplo, ele permite o deslocamento sobre as superfícies, mas não é responsável por raspar os alimentos."
                ],
                [
                    "id_alternativa" => 75,
                    "texto" => "Rádula.",
                    "correto" => 1,
                    "explicacao" => "A rádula é uma estrutura semelhante a uma língua com pequenos dentes, utilizada para raspar ou fragmentar alimentos. Está presente na maioria dos moluscos, como os caracóis, mas é ausente nos bivalves, como ostras e mexilhões."
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
                    "explicacao" => "Os bivalves, como ostras e mexilhões, alimentam-se principalmente por filtração, retirando da água partículas orgânicas e organismos microscópicos que servem de alimento. Suas brânquias participam tanto da alimentação quanto das trocas gasosas."
                ],
                [
                    "id_alternativa" => 77,
                    "texto" => "Pela captura de presas utilizando tentáculos.",
                    "correto" => 0,
                    "explicacao" => "Os bivalves não possuem tentáculos especializados na captura de presas como os cefalópodes. Sua alimentação ocorre principalmente por filtração da água, retirando partículas alimentares suspensas."
                ],
                [
                    "id_alternativa" => 78,
                    "texto" => "Pela absorção de nutrientes diretamente pela concha.",
                    "correto" => 0,
                    "explicacao" => "A concha possui função principalmente de proteção e sustentação, não sendo responsável pela absorção de nutrientes. Os bivalves obtêm alimento filtrando partículas presentes na água."
                ],
                [
                    "id_alternativa" => 79,
                    "texto" => "Pela raspagem de algas sobre as rochas.",
                    "correto" => 0,
                    "explicacao" => "A raspagem de alimentos sobre superfícies é uma forma de alimentação relacionada à rádula, estrutura ausente nos bivalves. Ostras e mexilhões obtêm seu alimento principalmente por filtração."
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
                    "explicacao" => "Os anelídeos são triblásticos, apresentam simetria bilateral e corpo segmentado em anéis. Não possuem corpo formado por tentáculos."
                ],
                [
                    "id_alternativa" => 81,
                    "texto" => "São triblásticos, apresentam simetria bilateral e corpo metamerizado, dividido em segmentos.",
                    "correto" => 1,
                    "explicacao" => "Os anelídeos possuem três folhetos embrionários, simetria bilateral e corpo dividido em segmentos chamados metâmeros, característica denominada metameria."
                ],
                [
                    "id_alternativa" => 82,
                    "texto" => "São acelomados, possuem corpo achatado e sistema digestório incompleto.",
                    "correto" => 0,
                    "explicacao" => "Os anelídeos são celomados, possuem corpo alongado e sistema digestório completo, com boca e ânus."
                ],
                [
                    "id_alternativa" => 83,
                    "texto" => "São animais com exoesqueleto de quitina e apêndices articulados.",
                    "correto" => 0,
                    "explicacao" => "Essas características são típicas dos artrópodes. Os anelídeos possuem corpo mole, sem exoesqueleto rígido e sem apêndices articulados."
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
                    "explicacao" => "Os anelídeos possuem sistema circulatório fechado, no qual o sangue circula dentro de vasos sanguíneos."
                ],
                [
                    "id_alternativa" => 85,
                    "texto" => " É fechado, apresenta organização segmentar e pode possuir pigmentos respiratórios.",
                    "correto" => 1,
                    "explicacao" => "O sangue circula dentro dos vasos, e muitos anelídeos possuem pigmentos respiratórios, como a hemoglobina, que auxilia no transporte de oxigênio. Algumas estruturas do sistema circulatório apresentam organização relacionada aos segmentos corporais."
                ],
                [
                    "id_alternativa" => 86,
                    "texto" => " É ausente, pois as trocas gasosas ocorrem exclusivamente pela pele.",
                    "correto" => 0,
                    "explicacao" => "Os anelídeos possuem sistema circulatório. Além disso, nem todos realizam respiração exclusivamente pela pele, pois alguns possuem brânquias."
                ],
                [
                    "id_alternativa" => 87,
                    "texto" => "É fechado, mas não apresenta pigmentos respiratórios em nenhuma espécie.",
                    "correto" => 0,
                    "explicacao" => "Muitos anelídeos apresentam pigmentos respiratórios, como a hemoglobina, que auxilia no transporte de oxigênio pelo sangue."
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
                    "explicacao" => "As minhocas realizam respiração cutânea, e a umidade da pele é necessária para que os gases respiratórios possam ser difundidos através da superfície corporal."
                ],
                [
                    "id_alternativa" => 89,
                    "texto" => "O corpo apresente pulmões para absorver o oxigênio atmosférico.",
                    "correto" => 0,
                    "explicacao" => "As minhocas não possuem pulmões. As trocas gasosas ocorrem diretamente pela pele."
                ],
                [
                    "id_alternativa" => 90,
                    "texto" => "As cerdas produzem oxigênio para as células.",
                    "correto" => 0,
                    "explicacao" => "As cerdas auxiliam na fixação e na locomoção pelo solo, não produzem oxigênio."
                ],
                [
                    "id_alternativa" => 91,
                    "texto" => "O celoma permaneça cheio de ar para transportar oxigênio.",
                    "correto" => 0,
                    "explicacao" => "O celoma é preenchido por líquido, que auxilia na sustentação do corpo e no funcionamento do esqueleto hidrostático, não sendo uma cavidade preenchida por ar."
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
                    "explicacao" => "A digestão ocorre no sistema digestório. O fluido celomático não é responsável exclusivamente pela digestão."
                ],
                [
                    "id_alternativa" => 92,
                    "texto" => "Transportar os impulsos nervosos entre os gânglios.",
                    "correto" => 0,
                    "explicacao" => "Os impulsos nervosos são transmitidos pelo sistema nervoso, formado por gânglios e cordão nervoso ventral."
                ],
                [
                    "id_alternativa" => 93,
                    "texto" => "Promover a sustentação do corpo e atuar como um esqueleto hidrostático.",
                    "correto" => 1,
                    "explicacao" => "O líquido presente no celoma exerce pressão contra a parede corporal, proporcionando sustentação e permitindo que a contração muscular contribua para os movimentos."
                ],
                [
                    "id_alternativa" => 94,
                    "texto" => "Produzir as cerdas utilizadas na locomoção.",
                    "correto" => 0,
                    "explicacao" => "As cerdas são estruturas formadas por quitina que auxiliam na fixação e no deslocamento. O fluido celomático não é responsável por sua produção."
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
                    "explicacao" => "Os anelídeos possuem sistema digestório completo, com duas aberturas: boca e ânus."
                ],
                [
                    "id_alternativa" => 96,
                    "texto" => "É completo, mas apresenta organização segmentar, com um sistema digestório independente em cada metâmero.",
                    "correto" => 0,
                    "explicacao" => "Embora o corpo seja segmentado, os anelídeos não possuem um sistema digestório independente em cada segmento. O sistema digestório é um tubo que percorre o corpo."
                ],
                [
                    "id_alternativa" => 97,
                    "texto" => " É ausente, sendo a digestão realizada exclusivamente pelas células da pele.",
                    "correto" => 0,
                    "explicacao" => "Os anelídeos possuem sistema digestório completo e a digestão ocorre ao longo desse sistema."
                ],
                [
                    "id_alternativa" => 98,
                    "texto" => "É completo, apresentando boca e ânus, mas sem organização segmentar.",
                    "correto" => 0,
                    "explicacao" => "O sistema digestório possui boca e ânus, permitindo que o alimento percorra o tubo digestório em um único sentido. Apesar do corpo ser segmentado, o sistema digestório não é dividido em sistemas independentes em cada metâmero."
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
                    "explicacao" => "Os artrópodes apresentam corpo segmentado, apêndices articulados e sistema circulatório aberto."
                ],
                [
                    "id_alternativa" => 100,
                    "texto" => "São animais com simetria radial, corpo mole e sistema digestório incompleto.",
                    "correto" => 0,
                    "explicacao" => "Os artrópodes possuem simetria bilateral, exoesqueleto e sistema digestório completo, com boca e ânus."
                ],
                [
                    "id_alternativa" => 101,
                    "texto" => "São triblásticos, apresentam simetria bilateral, apêndices articulados e exoesqueleto de quitina.",
                    "correto" => 1,
                    "explicacao" => "Os artrópodes possuem três folhetos embrionários, simetria bilateral, apêndices articulados e exoesqueleto formado principalmente por quitina e proteínas, que protege e sustenta o corpo."
                ],
                [
                    "id_alternativa" => 102,
                    "texto" => "São animais acelomados, com corpo achatado e ausência de sistemas circulatório e respiratório.",
                    "correto" => 0,
                    "explicacao" => "Os artrópodes possuem sistemas circulatório e respiratório, que variam conforme o grupo, além de corpo segmentado e exoesqueleto."
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
                    "explicacao" => "As trocas gasosas são realizadas por estruturas respiratórias, como brânquias, traqueias e pulmões foliáceos. O transporte de substâncias está relacionado ao sistema circulatório."
                ],
                [
                    "id_alternativa" => 104,
                    "texto" => "Proteger e sustentar o corpo, além de servir de ponto de inserção para os músculos.",
                    "correto" => 1,
                    "explicacao" => "O exoesqueleto é uma estrutura externa resistente que protege o corpo, oferece sustentação e permite a fixação dos músculos, auxiliando nos movimentos."
                ],
                [
                    "id_alternativa" => 105,
                    "texto" => "Realizar a digestão e absorver os nutrientes dos alimentos.",
                    "correto" => 0,
                    "explicacao" => "A digestão e a absorção de nutrientes ocorrem no sistema digestório, não no exoesqueleto."
                ],
                [
                    "id_alternativa" => 106,
                    "texto" => " Produzir células reprodutivas e controlar o sistema nervoso.",
                    "correto" => 0,
                    "explicacao" => "A produção de células reprodutivas está relacionada ao sistema reprodutor, enquanto o sistema nervoso coordena as funções corporais. O exoesqueleto possui função principalmente de proteção, sustentação e fixação muscular."
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
                    "explicacao" => "Como o exoesqueleto não cresce continuamente junto com o corpo, os artrópodes precisam abandoná-lo e formar outro maior, permitindo o crescimento."
                ],
                [
                    "id_alternativa" => 108,
                    "texto" => "O exoesqueleto é formado exclusivamente por células vivas que se dividem durante o crescimento.",
                    "correto" => 0,
                    "explicacao" => "O exoesqueleto é composto principalmente por quitina e proteínas, não sendo uma estrutura formada por células vivas."
                ],
                [
                    "id_alternativa" => 109,
                    "texto" => " A troca do exoesqueleto permite que o animal transforme seu sistema circulatório aberto em fechado.",
                    "correto" => 0,
                    "explicacao" => "A ecdise está relacionada ao crescimento do animal e não modifica o tipo de sistema circulatório."
                ],
                [
                    "id_alternativa" => 120,
                    "texto" => " O exoesqueleto impede completamente a movimentação dos apêndices durante toda a vida.",
                    "correto" => 0,
                    "explicacao" => "Os apêndices articulados permitem movimentos variados. O exoesqueleto não impede a movimentação, mas limita o crescimento, tornando necessária a muda."
                ]
            ]
        ],
        [
            "id_pergunta" => 29,
            "enunciado" => "Qual característica diferencia o sistema circulatório dos artrópodes daquele encontrado em animais com circulação fechada?",
            "alternativas" => [
                [
                    "id_alternativa" => 121,
                    "texto" => "O sangue permanece exclusivamente dentro dos vasos sanguíneos durante todo o percurso.",
                    "correto" => 0,
                    "explicacao" => "Essa característica corresponde ao sistema circulatório fechado. Nos artrópodes, a hemolinfa circula por espaços do corpo e banha diretamente os tecidos."
                ],
                [
                    "id_alternativa" => 122,
                    "texto" => "Não existe líquido circulatório responsável pelo transporte de substâncias.",
                    "correto" => 0,
                    "explicacao" => "Os artrópodes possuem hemolinfa, um líquido circulatório responsável pelo transporte de diversas substâncias pelo organismo."
                ],
                [
                    "id_alternativa" => 123,
                    "texto" => "A hemolinfa circula por espaços do corpo e banha diretamente os tecidos.",
                    "correto" => 0,
                    "explicacao" => "Os artrópodes possuem sistema circulatório aberto, no qual a hemolinfa circula por espaços internos do corpo e entra em contato direto com os tecidos, diferentemente dos animais com circulação fechada, em que o sangue permanece dentro dos vasos."
                ],
                [
                    "id_alternativa" => 124,
                    "texto" => "O transporte de substâncias ocorre exclusivamente por difusão através da pele.",
                    "correto" => 1,
                    "explicacao" => "Os artrópodes possuem sistema circulatório, no qual a hemolinfa participa do transporte de substâncias. A difusão através da superfície corporal pode ocorrer nas trocas gasosas de algumas espécies pequenas, mas não é o único mecanismo de transporte de substâncias pelo organismo."
                ]
            ]
        ],
        [
            "id_pergunta" => 30,
            "enunciado" => "Sobre a respiração dos artrópodes, assinale a alternativa correta",
            "alternativas" => [
                [
                    "id_alternativa" => 125,
                    "texto" => "Todos os artrópodes realizam respiração exclusivamente pela superfície corporal.",
                    "correto" => 0,
                    "explicacao" => "As estruturas respiratórias variam conforme o grupo. Muitos crustáceos possuem brânquias, os insetos apresentam traqueias e diversos aracnídeos possuem traqueias ou pulmões foliáceos."
                ],
                [
                    "id_alternativa" => 126,
                    "texto" => "Os artrópodes apresentam o mesmo tipo de estrutura respiratória, independentemente do grupo.",
                    "correto" => 0,
                    "explicacao" => "Os artrópodes apresentam diferentes estruturas respiratórias de acordo com o grupo e o ambiente em que vivem, não possuindo todos o mesmo tipo de respiração."
                ],
                [
                    "id_alternativa" => 127,
                    "texto" => "As estruturas respiratórias variam conforme o grupo, podendo incluir brânquias, traqueias e pulmões foliáceos. ",
                    "correto" => 1,
                    "explicacao" => "A respiração dos artrópodes é variada. Muitos crustáceos respiram por brânquias, os insetos utilizam traqueias e diversos aracnídeos apresentam traqueias ou pulmões foliáceos."
                ],
                [
                    "id_alternativa" => 128,
                    "texto" => "Os artrópodes não realizam trocas gasosas, pois o exoesqueleto impede a entrada de oxigênio.",
                    "correto" => 0,
                    "explicacao" => "Os artrópodes realizam trocas gasosas por estruturas respiratórias especializadas ou, em algumas espécies pequenas, pela superfície corporal. O exoesqueleto não impede a respiração, pois existem estruturas adaptadas para permitir essas trocas gasosas."
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
                    "explicacao" => "Os equinodermos não apresentam corpo segmentado nem exoesqueleto de quitina. Os adultos geralmente possuem simetria radial pentâmera e endoesqueleto calcário."
                ],
                [
                    "id_alternativa" => 130,
                    "texto" => " São animais diblásticos, com simetria radial e tentáculos ao redor da boca.",
                    "correto" => 0,
                    "explicacao" => "Os equinodermos são triblásticos, ou seja, apresentam três folhetos embrionários. Além disso, não possuem tentáculos ao redor da boca como característica geral do filo."
                ],
                [
                    "id_alternativa" => 131,
                    "texto" => "São animais triblásticos, não segmentados, com endoesqueleto calcário e, geralmente, simetria radial pentâmera na fase adulta.",
                    "correto" => 1,
                    "explicacao" => "Os equinodermos apresentam três folhetos embrionários, corpo não segmentado, endoesqueleto calcário e, geralmente, simetria radial pentâmera nos adultos. Suas larvas, entretanto, apresentam simetria bilateral."
                ],
                [
                    "id_alternativa" => 132,
                    "texto" => "São animais acelomados, com corpo achatado e sistema digestório incompleto.",
                    "correto" => 0,
                    "explicacao" => "Os equinodermos são celomados, possuem celoma desenvolvido e não apresentam corpo achatado como característica geral. A maioria possui sistema digestório completo, com boca e ânus, embora existam exceções."
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
                    "explicacao" => "A produção de gametas está relacionada ao sistema reprodutor. O sistema hidrovascular atua principalmente na movimentação dos pés ambulacrais, alimentação e trocas gasosas."
                ],
                [
                    "id_alternativa" => 134,
                    "texto" => "Auxiliar na locomoção, na captura de alimentos e nas trocas gasosas por meio dos pés ambulacrais.",
                    "correto" => 1,
                    "explicacao" => "O sistema hidrovascular movimenta os pés ambulacrais, que participam da locomoção, fixação, captura de alimentos e trocas gasosas."
                ],
                [
                    "id_alternativa" => 135,
                    "texto" => "Realizar exclusivamente a digestão dos alimentos.",
                    "correto" => 0,
                    "explicacao" => "A digestão é realizada pelo sistema digestório. O sistema hidrovascular possui outras funções, incluindo a movimentação dos pés ambulacrais e a participação nas trocas gasosas."
                ],
                [
                    "id_alternativa" => 136,
                    "texto" => "Transportar o sangue por uma rede de vasos fechados.",
                    "correto" => 0,
                    "explicacao" => "Os equinodermos não possuem um sistema circulatório bem definido, muito menos uma rede de vasos fechados responsável pelo transporte sanguíneo. O transporte de substâncias ocorre principalmente pelos líquidos corporais."
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
                    "explicacao" => "O endoesqueleto calcário fica localizado internamente, sob a pele, e contribui para a sustentação e proteção do corpo. Em algumas espécies, apresenta espinhos."
                ],
                [
                    "id_alternativa" => 138,
                    "texto" => "É um revestimento externo de quitina que precisa ser trocado durante o crescimento.",
                    "correto" => 0,
                    "explicacao" => "Os equinodermos possuem endoesqueleto calcário, não exoesqueleto de quitina. A troca periódica do exoesqueleto, chamada ecdise, é característica de artrópodes."
                ],
                [
                    "id_alternativa" => 139,
                    "texto" => "É formado exclusivamente por cartilagem e está presente apenas nas larvas.",
                    "correto" => 0,
                    "explicacao" => "O esqueleto dos equinodermos é formado por estruturas calcárias e está presente nos adultos, contribuindo para sua sustentação e proteção."
                ],
                [
                    "id_alternativa" => 140,
                    "texto" => "É responsável diretamente pela produção de gametas.",
                    "correto" => 0,
                    "explicacao" => "O endoesqueleto está relacionado principalmente à sustentação e proteção. A produção de gametas ocorre nas estruturas reprodutoras do animal."
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
                    "explicacao" => "Essa divisão corporal não é característica dos equinodermos. Eles não possuem cabeça definida e apresentam organização corporal geralmente radial nos adultos."
                ],
                [
                    "id_alternativa" => 142,
                    "texto" => "O corpo apresenta dois lados simétricos, direito e esquerdo, em todas as fases da vida.",
                    "correto" => 0,
                    "explicacao" => "Os equinodermos adultos geralmente apresentam simetria radial pentâmera, enquanto suas larvas possuem simetria bilateral."
                ],
                [
                    "id_alternativa" => 143,
                    "texto" => "O corpo não apresenta nenhum tipo de simetria",
                    "correto" => 0,
                    "explicacao" => "Os equinodermos apresentam simetria corporal. Nos adultos, geralmente é radial pentâmera, enquanto nas larvas é bilateral."
                ],
                [
                    "id_alternativa" => 144,
                    "texto" => "O corpo apresenta, geralmente, cinco partes ou regiões organizadas ao redor de um eixo central.",
                    "correto" => 2,
                    "explicacao" => "A simetria radial pentâmera caracteriza a organização do corpo adulto em cinco regiões ao redor de um eixo central, como pode ser observado nas estrelas-do-mar e nos ouriços-do-mar."
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
                    "explicacao" => "As estrelas-do-mar possuem endoesqueleto calcário, não exoesqueleto de quitina. Além disso, sua regeneração não está relacionada à formação de segmentos corporais."
                ],
                [
                    "id_alternativa" => 18,
                    "texto" => "À capacidade de realizar reprodução exclusivamente por brotamento.",
                    "correto" => 0,
                    "explicacao" => "A reprodução das estrelas-do-mar não ocorre exclusivamente por brotamento. A maioria dos equinodermos apresenta reprodução sexuada, e algumas espécies também podem realizar reprodução assexuada."
                ],
                [
                    "id_alternativa" => 146,
                    "texto" => "À capacidade de regeneração de partes do corpo, embora a formação de um novo indivíduo completo dependa da espécie e das condições envolvidas.",
                    "correto" => 1,
                    "explicacao" => "As estrelas-do-mar apresentam capacidade de regenerar partes perdidas do corpo. Entretanto, a formação de um novo indivíduo a partir de um fragmento depende da espécie e de fatores como a presença de parte do disco central."
                ],
                [
                    "id_alternativa" => 147,
                    "texto" => " À ausência de sistema nervoso e de órgãos internos.",
                    "correto" => 0,
                    "explicacao" => "As estrelas-do-mar possuem sistema nervoso formado por um anel nervoso e nervos radiais, além de diversos órgãos internos. A regeneração não ocorre devido à ausência dessas estruturas."
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
                    "explicacao" => "Os cnidários são diblásticos, apresentam simetria radial e não possuem corpo segmentado."
                ],
                [
                    "id_alternativa" => 149,
                    "texto" => "São animais diblásticos, com simetria radial e células especializadas chamadas cnidócitos.",
                    "correto" => 1,
                    "explicacao" => "Os cnidários apresentam dois folhetos embrionários, simetria radial e cnidócitos, células especializadas utilizadas principalmente na defesa e na captura de presas."
                ],
                [
                    "id_alternativa" => 150,
                    "texto" => " São animais acelomados, com corpo achatado e sistema digestório completo.",
                    "correto" => 0,
                    "explicacao" => "Os cnidários não apresentam corpo achatado como característica geral nem sistema digestório completo. Possuem cavidade gastrovascular com uma única abertura, que funciona como boca e saída de resíduos."
                ],
                [
                    "id_alternativa" => 151,
                    "texto" => " São animais unicelulares, com organização corporal baseada em colônias.",
                    "correto" => 0,
                    "explicacao" => "Os cnidários são animais multicelulares que apresentam organização corporal em tecidos. Algumas espécies formam colônias, mas isso não significa que sejam unicelulares."
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
                    "explicacao" => "A digestão dos cnidários não ocorre exclusivamente dentro dos cnidócitos. Ela inicia-se extracelularmente na cavidade gastrovascular e termina intracelularmente nas células da gastroderme."
                ],
                [
                    "id_alternativa" => 153,
                    "texto" => " É exclusivamente extracelular, realizada em um tubo digestório completo.",
                    "correto" => 0,
                    "explicacao" => "A digestão inicia-se extracelularmente, mas é finalizada intracelularmente. Além disso, os cnidários não possuem tubo digestório completo, apresentando cavidade gastrovascular com apenas uma abertura."
                ],
                [
                    "id_alternativa" => 154,
                    "texto" => "É realizada por órgãos especializados, como estômago e intestino.",
                    "correto" => 0,
                    "explicacao" => "Os cnidários não possuem órgãos digestórios complexos como estômago e intestino. A digestão ocorre na cavidade gastrovascular e nas células da gastroderme."
                ],
                [
                    "id_alternativa" => 155,
                    "texto" => " Inicia-se extracelularmente na cavidade gastrovascular e termina intracelularmente nas células da gastroderme.",
                    "correto" => 1,
                    "explicacao" => "A digestão dos cnidários começa na cavidade gastrovascular, onde enzimas realizam a digestão extracelular. Depois, as células da gastroderme absorvem partículas e finalizam a digestão intracelularmente."
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
                    "explicacao" => "Os cnidários não possuem pulmões nem órgãos excretores especializados. As trocas gasosas e a eliminação de resíduos ocorrem principalmente por difusão através da superfície corporal."
                ],
                [
                    "id_alternativa" => 157,
                    "texto" => "Principalmente por difusão através da superfície corporal.",
                    "correto" => 1,
                    "explicacao" => "Como não possuem sistemas respiratório e excretor especializados, realizam as trocas gasosas e a eliminação de resíduos metabólicos principalmente por difusão através da superfície corporal."
                ],
                [
                    "id_alternativa" => 158,
                    "texto" => "Por meio de um sistema circulatório aberto, que transporta os gases.",
                    "correto" => 0,
                    "explicacao" => "Os cnidários não possuem sistema circulatório, seja aberto ou fechado. O transporte de substâncias ocorre principalmente por difusão e pela distribuição de nutrientes na cavidade gastrovascular."
                ],
                [
                    "id_alternativa" => 159,
                    "texto" => "Por meio de brânquias conectadas à cavidade gastrovascular.",
                    "correto" => 0,
                    "explicacao" => "Os cnidários não possuem brânquias especializadas. As trocas gasosas ocorrem principalmente por difusão através da superfície corporal."
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
                    "explicacao" => "A produção de gametas está relacionada à reprodução sexuada, pois envolve células reprodutivas que podem participar da fecundação."
                ],
                [
                    "id_alternativa" => 161,
                    "texto" => "Fecundação dos gametas na água.",
                    "correto" => 0,
                    "explicacao" => "A fecundação consiste na união dos gametas, sendo um processo relacionado à reprodução sexuada.    "
                ],
                [
                    "id_alternativa" => 162,
                    "texto" => "Formação de novos indivíduos por brotamento.",
                    "correto" => 1,
                    "explicacao" => "O brotamento é uma forma de reprodução assexuada na qual um novo indivíduo se desenvolve a partir de uma estrutura formada no corpo do organismo original. É observado em cnidários, como as hidras."
                ],
                [
                    "id_alternativa" => 163,
                    "texto" => "Desenvolvimento de uma larva a partir de um ovo fecundado.",
                    "correto" => 0,
                    "explicacao" => "O desenvolvimento de uma larva a partir de um ovo fecundado ocorre após a reprodução sexuada, envolvendo a fecundação dos gametas."
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
                    "explicacao" => "Os cnidários são exclusivamente aquáticos, não possuindo representantes terrestres."
                ],
                [
                    "id_alternativa" => 165,
                    "texto" => "São exclusivamente aquáticos, sendo a maioria marinha e existindo poucas espécies de água doce.",
                    "correto" => 1,
                    "explicacao" => "Os cnidários vivem exclusivamente em ambientes aquáticos. A maioria das espécies é marinha, mas existem algumas de água doce, como as hidras."
                ],
                [
                    "id_alternativa" => 166,
                    "texto" => "São exclusivamente marinhos, não existindo espécies de água doce.",
                    "correto" => 0,
                    "explicacao" => "Embora a maioria dos cnidários seja marinha, existem espécies de água doce, como as hidras."
                ],
                [
                    "id_alternativa" => 167,
                    "texto" => "São encontrados principalmente em ambientes terrestres e de água doce.",
                    "correto" => 0,
                    "explicacao" => "Os cnidários são exclusivamente aquáticos, e a maioria vive em ambientes marinhos. Existem poucas espécies de água doce, mas não são principalmente terrestres."
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