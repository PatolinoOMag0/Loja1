<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id'] ?? 0);
    $nome = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $preco = floatval($_POST['preco'] ?? 0);
    $quantidade = intval($_POST['quantidade'] ?? 0);

    if (!$id || $nome === '' || $preco <= 0 || $quantidade < 0) {
        echo "Preencha todos os campos corretamente.";
        exit();
    }

    try {
        $stmt = $pdo->prepare("UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade WHERE id = :id");
        $stmt->execute([
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':preco' => $preco,
            ':quantidade' => $quantidade,
            ':id' => $id
        ]);

        header("Location: sucesso_atualizar.php");
        exit();

    } catch (PDOException $e) {
        echo "Erro ao atualizar: " . $e->getMessage();
    }
} else {
    echo "Acesso inválido.";
}
