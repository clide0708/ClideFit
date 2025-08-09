<?php
require_once 'conect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $treino_id = $_POST['treino_id'];
    $num_series = $_POST['num_series'];
    $num_repeticoes = $_POST['num_repeticoes'];
    $tempo_descanso = $_POST['tempo_descanso'];
    $peso = $_POST['peso'];
    $descricao = $_POST['descricao'];

    try {
        $pdo = connectDB();
        $stmt = $pdo->prepare("UPDATE Exercicios 
            SET num_series=?, num_repeticoes=?, tempo_descanso=?, peso=?, descricao=? 
            WHERE id=?");
        $stmt->execute([$num_series, $num_repeticoes, $tempo_descanso, $peso, $descricao, $id]);

        header("Location: vertreino.php?id=" . urlencode($treino_id));
    } catch (PDOException $e) {
        die("Erro ao atualizar: " . $e->getMessage());
    }
}
