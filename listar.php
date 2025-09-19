<?php
require 'conexao.php';
$stmt = $pdo->query("SELECT * FROM produtos ORDER BY id DESC");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'cabecalho.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Modal de exclusão */
        #modal-excluir {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
        }

        #modal-excluir .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            max-width: 400px;
        }

        #modal-excluir button {
            margin: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #modal-excluir #confirmar {
            background-color: #dc3545;
            color: white;
        }

        #modal-excluir #cancelar {
            background-color: #6c757d;
            color: white;
        }

        #modal-excluir button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
<main>
    <?php if (count($produtos) > 0): ?>
        <?php foreach($produtos as $produto): ?>
            <div class="card">
                <h3><?= htmlspecialchars($produto['nome']) ?></h3>
                <p><?= htmlspecialchars($produto['descricao']) ?></p>
                <p>R$ <?= number_format($produto['preco'],2,",",".") ?></p>
                <p>Qtd: <?= $produto['quantidade'] ?></p>
                <a href="form_atualizar.php?id=<?= $produto['id'] ?>"><button>Atualizar</button></a>
                <button class="btn-excluir" data-id="<?= $produto['id'] ?>" style="background-color:#dc3545;">Excluir</button>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum produto cadastrado.</p>
    <?php endif; ?>
</main>

<!-- Modal de exclusão -->
<div id="modal-excluir">
    <div class="modal-content">
        <p>Deseja realmente excluir este produto?</p>
        <button id="confirmar">Sim</button>
        <button id="cancelar">Não</button>
    </div>
</div>

<script>
const modal = document.getElementById('modal-excluir');
let deleteId = null;

// Abrir modal ao clicar no botão de excluir
document.querySelectorAll('.btn-excluir').forEach(btn => {
    btn.addEventListener('click', () => {
        deleteId = btn.getAttribute('data-id');
        modal.style.display = 'flex';
    });
});

// Cancelar exclusão
document.getElementById('cancelar').addEventListener('click', () => {
    modal.style.display = 'none';
});

// Confirmar exclusão
document.getElementById('confirmar').addEventListener('click', () => {
    window.location.href = `excluir.php?id=${deleteId}`;
});
</script>

<footer>
    Loja &copy; 2025
</footer>
</body>
</html>
