<?php

$lista = "";
foreach ($cardapio as $item) {
    $nome = $item['nome'];
    $preco = $item['preco'];
    $idCardapio = $item['idCardapio'];

    $lista .= "
    <div class='col-md-4 mb-4'>
        <div class='card shadow'>
            <div class='card-body'>
                Nome: <strong>$nome</strong>
                <br>
                Preço: <strong>$preco</strong>
            </div>
            <div class='card-footer'>
                <a class='text-primary text-decoration-none' href='cardapio-adm/editar/$idCardapio'><i class='bi bi-pencil-square'></i> Editar</a> 
                <a 
                    class='btnExcluir text-danger text-decoration-none ms-3' 
                    href='cardapio-adm/excluir/$idCardapio'
                    onclick=\"return confirm('Confirma a exclusão desta mesa?')\"
                    >
                    <i class='bi bi-trash'></i> Excluir</a>
            </div>
        </div>
    </div>";
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/cardapioList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;