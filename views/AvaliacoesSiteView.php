<?php 

    $nome = $cardapioUnico["nome"];
    $preco = number_format($cardapioUnico["preco"],2,",",".");  # valor, casas decimais, separador de decimais, separador milhar
    $tipo = $cardapioUnico["tipo"];
    $descricao = $cardapioUnico["descricao"];
    $foto = $cardapioUnico["foto"];

    # Cria os cards HTML com os dados do cardápio.
    $card_cardapio = "
        <div class='card'>
            <img src='$foto' class='card-img-top' alt='...'>
            <div class='card-body'>
                Nome: <strong>$nome</strong> <br>
                Preço: <strong>$preco</strong> <br>
                $tipo <br>
                $descricao<br>
            </div>
            <div class='card-footer'>
                <a href='[[base-url]]/cardapio' class='btn btn-sm btn-dark'>Voltar</a>
            </div>
        </div>
   ";

$lista_avaliacoes = "";

$lista = "
    <div class='col-md-6 mb-4'>
        $card_cardapio
    </div>
    <div class='col-md-6 mb-4'>
        $lista_avaliacoes
    </div>
";

$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer_site.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[titulo]]", "Avaliações.", $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;