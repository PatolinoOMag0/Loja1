<?php include 'cabecalho.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sucesso</title>
    <link rel="stylesheet" href="style.css">
    <style>
        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 60vh;
            text-align: center;
        }

        main h2 {
            color: #28a745;
            margin-bottom: 20px;
        }

        main a {
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        main a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<main>
    <h2>Produto cadastrado com sucesso!</h2>
    <a href="index.php">Voltar ao início</a>
</main>
</body>
</html>
