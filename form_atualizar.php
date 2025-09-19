<?php
require 'conexao.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID do produto não informado.";
    exit();
}

// Buscar dados do produto
$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
$stmt->execute([':id' => $id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    echo "Produto não encontrado.";
    exit();
}
?>

<?php include 'cabecalho.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main>
    <form action="atualizar.php" method="post">
        <!-- Botão de voltar -->
        <a href="listar.php">
            <button type="button" style="background-color:#6c757d; margin-bottom:10px;">Voltar para Listar Produtos</button>
        </a>

        <!-- Campos do formulário -->
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" rows="3"><?= htmlspecialchars($produto['descricao']) ?></textarea>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" step="0.01" min="0.01" value="<?= $produto['preco'] ?>" required>

        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" min="0" value="<?= $produto['quantidade'] ?>" required>

        <!-- Botão de atualizar -->
        <button type="submit">Atualizar</button>
    </form>
</main>
<footer>
    Loja &copy; 2025
</footer>
</body>
</html>
