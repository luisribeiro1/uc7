<?php

$lista = "";
foreach ($cardapio as $item) {
    $nome = $item['nome'];
    # number_format(valor, casas decimais, separador decimal, separador milhar)
    $preco = number_format($item['preco'],2,",",".");       
    $descricao = $item['descricao'];
    $foto = $item['foto'];
    $idCardapio = $item['idCardapio'];

    $lista .= "
    <div class='col-md-4 mb-4'>
        <div class='card shadow'>
            <img src='$foto' class='card-img-top' alt='...'>
            <div class='card-body'>
                Nome: <strong>$nome</strong>
                <br>
                Preço: <strong>R$ $preco</strong>
                <br>
                <strong>$descricao</strong>
                <br>
                <a href='[[base-url]]/avaliacoes/listar/$idCardapio'>Avaliações</a>
            </div>
        </div>
    </div>";
}

$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "NOSSO CARDÁPIO", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[js]]", "", $html);

echo $html;