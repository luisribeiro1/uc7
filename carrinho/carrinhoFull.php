<?php
require_once 'class_carrinho.php';

$produtos = ["Arroz","Feijão","Macarrão","Batata","Miojo","Queijo","Azeite","Café"];

$listaProdutos = "";
foreach($produtos as $produto){
    $listaProdutos.="<option>$produto</option>";
}


$carrinho = new Carrinho();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['adicionar'])) {
        $item = [
            'nomeProduto' => $_POST['nomeProduto'],
            'quantidade' => $_POST['quantidade'],
            'preco' => $_POST['preco']
        ];
        $carrinho->adicionarItem($item);
    } elseif (isset($_POST['remover'])) {
        $indice = $_POST['indice'];
        $carrinho->removerItem($indice);
    }

    // Redireciona para a mesma página para evitar o reenvio do formulário
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

$itens = $carrinho->listarItens();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Carrinho de Compras</h1>
        
        <form method="post" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <select name="nomeProduto" id="nomeProduto" class="form-select">
                        <?= $listaProdutos ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="number" name="quantidade" class="form-control" placeholder="Quantidade" required>
                </div>
                <div class="col-md-2">
                    <input type="number" name="preco" step="0.01" class="form-control" placeholder="Preço" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" name="adicionar" class="btn btn-primary btn-block">Adicionar</button>
                </div>
            </div>
        </form>

        <h2>Itens no carrinho</h2>
        <?php if (empty($itens)): ?>
            <p class="alert alert-info">Nenhum item no carrinho.</p>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th class="text-end">Preço</th>
                        <th class="text-end">Total</thclass>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($itens as $indice => $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['nomeProduto']); ?></td>
                            <td><?php echo htmlspecialchars($item['quantidade']); ?></td>
                            <td class="text-end"><?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
                            <td class="text-end"><?php echo number_format($item['quantidade'] * $item['preco'], 2, ',', '.'); ?></td>
                            <td class="text-center">
                                <form method="post" style="display:inline-block;">
                                    <input type="hidden" name="indice" value="<?php echo $indice; ?>">
                                    <button type="submit" name="remover" class="btn btn-danger">Remover</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
