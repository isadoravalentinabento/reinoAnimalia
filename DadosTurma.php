<?php
include "validar.php";
include "configinc.php";

if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
    $id_turma = (int)$_GET['id'];
    $_SESSION['id_turma_atual'] = $id_turma;
} else {
    $id_turma = (int)($_SESSION['id_turma_atual'] ?? 0);
}

$_GET['id'] = $id_turma;

if ($_SESSION['tipo_usuario'] == 1) {
    include "ProfMenu.php";
} else {
    include "AlunoMenu.php";
}

include "TurmaMenu.php";

$conexao = new PDO(dsn, usuario, senha);

// Calcula a média de porcentagem da turma em cada filo
$sql = "SELECT 
            p.id_evolucao,
            ROUND(AVG(p.porcentagem)) AS media_porcentagem
        FROM progresso p
        WHERE p.id_turma = :id_turma
        GROUP BY p.id_evolucao";

$comando = $conexao->prepare($sql);
$comando->bindValue(':id_turma', $id_turma);
$comando->execute();

$resultados = $comando->fetchAll(PDO::FETCH_ASSOC);

$mediasPorFilo = [];
foreach ($resultados as $row) {
    $mediasPorFilo[(int)$row['id_evolucao']] = (int)$row['media_porcentagem'];
}

$filos = [
    1 => 'Poríferos',
    2 => 'Cnidários',
    3 => 'Platelmintos',
    4 => 'Nematelmintos',
    5 => 'Anelídeos',
    6 => 'Artrópodes',
    7 => 'Moluscos',
    8 => 'Equinodermos'
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
    <link rel="stylesheet" href="css/dadosturma.css?v=5">
</head>
<body>
    <br>

    <div class="lista-filos">
        <?php foreach ($filos as $id => $nomeFilo): 
            $porcentagem = $mediasPorFilo[$id] ?? 0;
        ?>
            <div class="filo-item">
                <span class="filo-nome"><?= $id ?>º Filo — <?= $nomeFilo ?></span>
                <span class="filo-porcentagem"><?= $porcentagem ?>%</span>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>