<?php

$lista = "";
foreach ($lista_cardapio as $cardapio) {
    $idCardapio = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio["preco"];
    $tipo = $cardapio["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

    $lista.="
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body'>
            <strong> $nome </strong><br>
            R$ $preco <br> $tipo
            <hr> $descricao
            <hr> $foto
            </div>
            <div class='card-footer'>
            <a class='text-primary text-decoration-none me-2' href='#'><i class='bi bi-plus-circle '></i> Adicionar</a>
            <a class='text-danger text-decoration-none ' href='#'><i class='bi bi-trash'></i> Excluir</a>
            </div>
        </div>
    </div>
    ";
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/cardapioList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);

echo $html;