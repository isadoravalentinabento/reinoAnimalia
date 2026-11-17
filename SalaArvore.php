<?php
include "configinc.php";
include "validar.php";

$id_turma = $_GET['id'] ?? 0;

include "MenuArvore.php";

$conexao = new PDO(dsn, usuario, senha);
$sql = "SELECT nome_turma FROM turma WHERE id_turma = :id_turma";
$comando = $conexao->prepare($sql);
$comando->bindValue(':id_turma', $id_turma);
$comando->execute();
$turma = $comando->fetch();

$id_aluno = $_SESSION['id_usuario'] ?? 1;
$sqlProgresso = "SELECT id_evolucao, etapa, porcentagem 
                 FROM progresso 
                 WHERE id_aluno = :id_aluno AND id_turma = :id_turma";
$stmt = $conexao->prepare($sqlProgresso);
$stmt->execute([
    ':id_aluno' => $id_aluno,
    ':id_turma' => (int)$id_turma
]);

$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

$statusFilos = [];
foreach ($registros as $reg) {
    $statusFilos[(int)$reg['id_evolucao']] = [
        'liberado' => true,
        'porcentagem' => (int)$reg['porcentagem']
    ];
}

if (!isset($statusFilos[1])) {
    $statusFilos[1] = ['liberado' => true, 'porcentagem' => 0];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>árvore</title>
    <link rel="stylesheet" href="css/SalaArvore.css?v=9">
</head>

<body>
<div class="sala" id="sala-arvore">

    <img src="img/FundoArvore.png" usemap="#image-map" class="arvore" id="arvore" alt="Árvore Filogenética">

    <map name="image-map" id="image-map">
        <area data-filo="8" shape="rect" coords="682,24,1027,97" href="Filo08.php?id=<?=$id_turma?>" title="Equinodermos" alt="Equinodermos">
        <area data-filo="7" shape="rect" coords="671,161,901,225" href="Filo07.php?id=<?=$id_turma?>" title="Molusco" alt="Molusco">
        <area data-filo="6" shape="rect" coords="774,290,1050,345" href="Filo06.php?id=<?=$id_turma?>" title="Artropodes" alt="Artropodes">
        <area data-filo="5" shape="rect" coords="729,407,968,470" href="Filo05.php?id=<?=$id_turma?>" title="Anelideos" alt="Anelideos">
        <area data-filo="4" shape="rect" coords="626,536,977,606" href="Filo04.php?id=<?=$id_turma?>" title="Nematelmintos" alt="Nematelmintos">
        <area data-filo="3" shape="rect" coords="768,658,1059,732" href="Filo03.php?id=<?=$id_turma?>" title="Platelmintos" alt="Platelmintos">
        <area data-filo="2" shape="rect" coords="1116,778,1349,853" href="Filo02.php?id=<?=$id_turma?>" title="Cnidarios" alt="Cnidarios">
        <area data-filo="1" shape="rect" coords="1119,907,1346,989" href="Filo01.php?id=<?=$id_turma?>" title="Poriferos" alt="Poriferos">
    </map>

</div>
<br><br>

<script src="js/mapArvore.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/image-map-resizer/1.0.10/js/imageMapResizer.min.js"></script>
<script>
const statusFilos = <?php echo json_encode($statusFilos); ?>;
const idTurma = <?php echo (int)$id_turma; ?>;


const coordenadasOriginais = {
    8: [682, 24, 1027, 97],    
    7: [671, 161, 901, 225],   
    6: [774, 290, 1050, 345],  
    5: [729, 407, 968, 470],   
    4: [626, 536, 977, 606],   
    3: [768, 658, 1059, 732],  
    2: [1116, 778, 1349, 853], 
    1: [1119, 907, 1346, 989]  
};

function desenharBadgesArvore() {
    const sala = document.getElementById("sala-arvore");
    const img = document.getElementById("arvore");
    if (!sala || !img || !img.naturalWidth) return;


    document.querySelectorAll(".badge-filo, .zona-clique-filo").forEach(el => el.remove());

    
    const escalaX = img.clientWidth / img.naturalWidth;
    const escalaY = img.clientHeight / img.naturalHeight;

    const rectImg = img.getBoundingClientRect();
    const rectSala = sala.getBoundingClientRect();
    const offsetLeft = rectImg.left - rectSala.left;
    const offsetTop = rectImg.top - rectSala.top;

    const areas = document.querySelectorAll("#image-map area");

    areas.forEach(area => {
        const idFilo = Number(area.dataset.filo);
        const orig = coordenadasOriginais[idFilo];
        if (!orig) return;

        const x1 = orig[0] * escalaX;
        const y1 = orig[1] * escalaY;
        const x2 = orig[2] * escalaX;
        const y2 = orig[3] * escalaY;

        area.coords = `${Math.round(x1)},${Math.round(y1)},${Math.round(x2)},${Math.round(y2)}`;

        const info = statusFilos[idFilo];
        const liberado = info && info.liberado === true;
        const porcentagem = info ? info.porcentagem : 0;


        const linkFilo = document.createElement("a");
        linkFilo.className = "zona-clique-filo";
        linkFilo.style.left = (offsetLeft + x1) + "px";
        linkFilo.style.top = (offsetTop + y1) + "px";
        linkFilo.style.width = (x2 - x1) + "px";
        linkFilo.style.height = (y2 - y1) + "px";

        if (liberado) {
            linkFilo.href = area.getAttribute("href");
            linkFilo.style.cursor = "pointer";
            linkFilo.title = "Acessar " + area.title;
        } else {
            linkFilo.href = "#";
            linkFilo.style.cursor = "not-allowed";
            linkFilo.title = "Bloqueado";
            linkFilo.onclick = function(e) {
                e.preventDefault();
                alert("Complete o quiz do filo anterior com pelo menos 70% de acertos para desbloquear este filo!");
            };
        }
        sala.appendChild(linkFilo);

        const badge = document.createElement("div");
        badge.className = "badge-filo " + (liberado ? "liberado" : "trancado");
        badge.style.left = (offsetLeft + x2 + 8) + "px";
        badge.style.top = (offsetTop + y1 + ((y2 - y1) / 2) - 14) + "px";

        if (!liberado) {
            badge.innerHTML = "🔒";
        } else {
            badge.innerHTML = porcentagem + "%";
        }
        sala.appendChild(badge);
    });
}


const imgArvore = document.getElementById("arvore");
if (imgArvore.complete) {
    desenharBadgesArvore();
} else {
    imgArvore.addEventListener("load", desenharBadgesArvore);
}

window.addEventListener("resize", desenharBadgesArvore);
</script>
</body>
</html>