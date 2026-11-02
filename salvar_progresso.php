<?php
include "configinc.php";
include "validar.php";

header('Content-Type: application/json');

if (isset($_POST['id_aluno']) && isset($_POST['id_evolucao']) && isset($_POST['etapa'])) {
    
    $id_aluno = $_POST['id_aluno'];
    $id_evolucao = $_POST['id_evolucao'];
    $etapa = $_POST['etapa'];

    try {
        $conexao = new PDO(dsn, usuario, senha);

        $sqlVerifica = "SELECT id_progresso FROM progresso WHERE id_aluno = :id_aluno AND id_evolucao = :id_evolucao";
        $cmdVerifica = $conexao->prepare($sqlVerifica);
        $cmdVerifica->bindValue(':id_aluno', $id_aluno);
        $cmdVerifica->bindValue(':id_evolucao', $id_evolucao);
        $cmdVerifica->execute();
        
        if ($cmdVerifica->rowCount() > 0) {

            $sqlAtualiza = "UPDATE progresso SET etapa = :etapa WHERE id_aluno = :id_aluno AND id_evolucao = :id_evolucao";
            $cmdAtualiza = $conexao->prepare($sqlAtualiza);
            $cmdAtualiza->bindValue(':etapa', $etapa);
            $cmdAtualiza->bindValue(':id_aluno', $id_aluno);
            $cmdAtualiza->bindValue(':id_evolucao', $id_evolucao);
            $cmdAtualiza->execute();
        } else {
            
            $sqlInsere = "INSERT INTO progresso (id_aluno, id_evolucao, etapa, concluido, porcentagem) VALUES (:id_aluno, :id_evolucao, :etapa, 0, 0)";
            $cmdInsere = $conexao->prepare($sqlInsere);
            $cmdInsere->bindValue(':id_aluno', $id_aluno);
            $cmdInsere->bindValue(':id_evolucao', $id_evolucao);
            $cmdInsere->bindValue(':etapa', $etapa);
            $cmdInsere->execute();
        }

        echo json_encode(["sucesso" => true]);
    } catch (PDOException $e) {
        echo json_encode(["sucesso" => false, "erro" => $e->getMessage()]);
    }
} else {
    echo json_encode(["sucesso" => false, "erro" => "Dados incompletos"]);
}
?>