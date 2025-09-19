<?php
require 'conexao.php';

$id = intval($_GET['id'] ?? 0);

if ($id) {
    try {
        $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        header("Location: listar.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao excluir produto: " . $e->getMessage();
    }
} else {
    echo "ID inválido.";
}
