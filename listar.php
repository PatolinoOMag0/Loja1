<?php
    include 'cabecalho.php';
?>
<body>
    <div class="container">
        <h1>Bem vindo ao 1º Sistema com CRUD</h1>
        <h2>Matheus Lima </h2>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">PREÇO</th>
                    <th scope="col">QUANTIDADE</th>
                    <th scope="col">OPÇÕES  </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require 'conexao.php';
                    $sql = "SELECT * FROM produtos";
                    $stmt = $pdo->query($sql);
                    while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$produto['id']."</td>";
                        echo "<td>".$produto['nome']."</td>";
                        echo "<td>".$produto['preco']."</td>";
                        echo "<td>".$produto['quantidade']."</td>";
                        echo "
                        <td>
                            <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                                <a href='form_atualizar.php?id=".$produto['nome']."' type='button' class='btn btn-success'>Comprar</a>
                                <a href='#' type='button' class='btn btn-outline-danger' for='vbtn-radio2'>Apagar</a>
                            </div>
                        </td>
                        ";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>