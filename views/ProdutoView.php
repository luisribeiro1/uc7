<?php

$lista = "";
foreach ($produtos as $produto) {
    $nome = $produto['name'];
    $preco = number_format($produto['price'], 2, ',', '.');
    $lista .= "<li>$nome | R$ $preco</li>";
}

$header = file_get_contents("views/templates/header.html");
$footer = file_get_contents("views/templates/footer.html");
$html = file_get_contents("views/templates/produtoList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);

echo $html;
