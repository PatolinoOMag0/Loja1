<?php include 'cabecalho.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main>
    <form action="inserir.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" rows="3"></textarea>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" step="0.01" min="0.01" required>

        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" min="0" required>

        <button type="submit">Cadastrar</button>
    </form>
</main>
<footer>
    Loja &copy; 2025
</footer>
</body>
</html>
