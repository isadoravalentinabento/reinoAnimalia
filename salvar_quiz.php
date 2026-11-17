<?php
include "configinc.php";
header('Content-Type: application/json');

try {
    $id_aluno = (int)($_POST['id_aluno'] ?? 0);
    $id_evolucao = (int)($_POST['id_evolucao'] ?? 0);
    $id_turma = (int)($_POST['id_turma'] ?? 0);
    $porcentagem = (int)($_POST['porcentagem'] ?? 0);
    $respostas = json_decode($_POST['respostas'] ?? '[]', true);

    $conexao = new PDO(dsn, usuario, senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $sqlDelete = "DELETE FROM resposta_aluno WHERE id_aluno = :id_aluno AND id_pergunta = :id_pergunta";
        $stmtDelete = $conexao->prepare($sqlDelete);

        $sqlInsertResp = "INSERT INTO resposta_aluno (id_aluno, id_pergunta, id_alternativa, correto) 
                          VALUES (:id_aluno, :id_pergunta, :id_alternativa, :correto)";
        $stmtInsertResp = $conexao->prepare($sqlInsertResp);

        foreach ($respostas as $r) {
            $stmtDelete->execute([
                ':id_aluno' => $id_aluno,
                ':id_pergunta' => $r['id_pergunta']
            ]);

            $stmtInsertResp->execute([
                ':id_aluno' => $id_aluno,
                ':id_pergunta' => $r['id_pergunta'],
                ':id_alternativa' => $r['id_alternativa'],
                ':correto' => $r['correto']
            ]);
        }
    } catch (Exception $eResp) {
    }

    $sqlCheckAtual = "SELECT id_progresso FROM progresso 
                      WHERE id_aluno = :id_aluno AND id_evolucao = :id_evolucao AND id_turma = :id_turma";
    $stmtCheckAtual = $conexao->prepare($sqlCheckAtual);
    $stmtCheckAtual->execute([
        ':id_aluno' => $id_aluno, 
        ':id_evolucao' => $id_evolucao,
        ':id_turma' => $id_turma
    ]);

    if ($stmtCheckAtual->fetch()) {
        $sqlProg = "UPDATE progresso 
                    SET porcentagem = GREATEST(porcentagem, :porcentagem) 
                    WHERE id_aluno = :id_aluno AND id_evolucao = :id_evolucao AND id_turma = :id_turma";
        $stmtProg = $conexao->prepare($sqlProg);
        $stmtProg->execute([
            ':porcentagem' => $porcentagem,
            ':id_aluno' => $id_aluno,
            ':id_evolucao' => $id_evolucao,
            ':id_turma' => $id_turma
        ]);
    } else {
        $sqlInsAtual = "INSERT INTO progresso (id_aluno, id_evolucao, id_turma, etapa, porcentagem) 
                        VALUES (:id_aluno, :id_evolucao, :id_turma, 6, :porcentagem)";
        $stmtInsAtual = $conexao->prepare($sqlInsAtual);
        $stmtInsAtual->execute([
            ':id_aluno' => $id_aluno,
            ':id_evolucao' => $id_evolucao,
            ':id_turma' => $id_turma,
            ':porcentagem' => $porcentagem
        ]);
    }

    $liberado = false;
    if ($porcentagem >= 70) {
        $liberado = true;
        $proximoFilo = $id_evolucao + 1;

        $sqlCheck = "SELECT id_progresso FROM progresso 
                     WHERE id_aluno = :id_aluno AND id_evolucao = :proximo AND id_turma = :id_turma";
        $stmtCheck = $conexao->prepare($sqlCheck);
        $stmtCheck->execute([
            ':id_aluno' => $id_aluno, 
            ':proximo' => $proximoFilo,
            ':id_turma' => $id_turma
        ]);

        if (!$stmtCheck->fetch()) {
            $sqlLibera = "INSERT INTO progresso (id_aluno, id_evolucao, id_turma, etapa, porcentagem) 
                          VALUES (:id_aluno, :proximo, :id_turma, 0, 0)";
            $stmtLibera = $conexao->prepare($sqlLibera);
            $stmtLibera->execute([
                ':id_aluno' => $id_aluno, 
                ':proximo' => $proximoFilo,
                ':id_turma' => $id_turma
            ]);
        }
    }

    echo json_encode([
        'sucesso' => true,
        'liberado' => $liberado,
        'porcentagem' => $porcentagem
    ]);

} catch (Exception $e) {
    echo json_encode([
        'sucesso' => false,
        'erro' => $e->getMessage()
    ]);
}
?>