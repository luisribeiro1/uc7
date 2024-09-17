<?php
require_once 'class_carrinho.php';

$produtos = ["Arroz","Feijão","Macarrão","Batata","Miojo","Queijo","Azeite","Café"];

$listaProdutos = "";
foreach($produtos as $produto){
    $listaProdutos.="<option>$produto</option>";
}

$carrinho = new Carrinho();

$desconto = 0;
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

    if (isset($_POST['cupomDesconto'])) {
        $carrinho->aplicarDesconto($_POST['desconto']);
    }

    // Redireciona para a mesma página para evitar o reenvio do formulário
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

$itens = $carrinho->listarItens();


$carrinho_vazio = "";
$carrinhoHtml = "";
if (empty($itens)){
    $carrinho_vazio = "<p class='alert alert-info'>Nenhum item no carrinho.</p>";
}else{
    $total = 0;
    foreach ($itens as $indice => $item){

        $subtotal = $item['quantidade'] * $item['preco'];
        $total += $subtotal;

        $preco = number_format($item['preco'], 2, ',', '.');
        $subtotal_f = number_format($subtotal,2,",",".");
        

        $carrinhoHtml.="
        <tr>
            <td>{$item['nomeProduto']}</td>
            <td>{$item['quantidade']}</td>
            <td class='text-end'>$preco</td>
            <td class='text-end'>$subtotal_f</td>
            <td class='text-center'>
                <form method='post' style='display:inline-block;'>
                    <input type='hidden' name='indice' value='{$indice}'>
                    <button type='submit' name='remover' class='btn btn-danger'>Remover</button>
                </form>
            </td>
        </tr>";
    }   # Fecha o foreach

    $desconto = $carrinho->pegarDesconto();         # Pegar o percentual de desconto
    $descontoValor = $total * $desconto / 100;      # Calcular o valor do desconto
    $total -= $descontoValor;                       # Recalcular o total aplicando o desconto

    # Calcular o Total
    $desconto = number_format($descontoValor,2,",",".");
    $total = number_format($total,2,",",".");

    $carrinhoHtml.="
    <tr>
        <td></td>
        <td></td>
        <td class='text-end fw-bold'>Desconto:</td>
        <td class='text-end fw-bold'>$desconto</td>
        <td class='text-center'></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td class='text-end fw-bold'>Total:</td>
        <td class='text-end fw-bold'>$total</td>
        <td class='text-center'></td>
    </tr>";

}

$html = file_get_contents("templates/carrinho.html");
$html = str_replace("[[listaProdutos]]",$listaProdutos,$html);
$html = str_replace("[[carrinho_vazio]]",$carrinho_vazio,$html);
$html = str_replace("[[carrinho]]",$carrinhoHtml,$html);

echo $html;