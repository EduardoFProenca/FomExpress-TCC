<?php
// cardapio.php (VIEW)
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Cardápio</title>
    <link rel="stylesheet" href="css/cardapio.css" />
</head>

<body>
    <h1>Cardápio</h1>

    <section class="home" id="home">
        <?php
        $categorias = [];
        foreach ($produtos as $p) {
            $categorias[$p['categoria']][] = $p;
        }

        foreach ($categorias as $categoria => $lista) {
            echo "<div class='row'>";
            echo "<h2 style='text-align:center'>{$categoria}</h2><br>";

            foreach ($lista as $item) {
                echo "
            <div class='column'>
                <div class='card'>
                    <img src='{$item['imagemUrl']}' alt='{$item['nome']}' style='width:100%'>
                    <div class='container'>
                        <h3>{$item['nome']}</h3>
                        <p class='title'>{$item['descricao']}</p>
                        <p>R$ {$item['preco']}</p>
                        <button onclick=\"adicionarAoCarrinho('{$item['nome']}', {$item['preco']})\">Adicionar</button>
                    </div>
                </div>
            </div>";
            }

            echo "</div>";
        }
        ?>

        <!-- script para inclusão dos produtos do carrinho -->
    
    </section>

    <script>
        let carrinho = [];

        function adicionarAoCarrinho(nome, preco) {
            carrinho.push({
                nome,
                preco,
                quantidade: 1
            });
            alert(nome + " adicionado ao carrinho!");
        }
    </script>

</body>

</html>