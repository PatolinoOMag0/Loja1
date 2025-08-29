<?php
    include 'cabecalho.php';
?>
    <body>
        <div class="container">
            <h2>ATUALIZAÇÃO DE PRODUTO</h2>
            <?php
                $id = $_GET['id'];
                //echo "Recebi ==> $id";

                require 'conexao.php';
                $sql = "SELECT * FROM produtos";
                $stmt = $pdo->query($sql);
                $produto = $stmt->fetch(PDO::FETCH_ASSOC);
                print_r($produto);

                // while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                //     echo "ID: " . $produto['id'] . "<br>";
                //     echo "Nome: " . $produto['nome'] . "<br>";
                //     echo "Preço: R$" . $produto['preco'] . "<br>";
                //     echo "Estoque: " . $produto['estoque'] . "<br><br>";
                // }

            ?>
            <form action= "inserir.php" method="POST">
                <div class="mb-3">
                    Nome: <input type="text" name="produto" class="form-control">
                </div>
                <div class="mb-3">
                    Preço: <input type="text" name="preco" class="form-control">
                </div>
                <div class="mb-3">
                    Quantidade: <input type="text" name="quantidade" class="form-control">
                </div>
                <button type="submit" class=btn btn-primary>Atualizar</button>
            </form>
        </div>
        
    </body>
</html>