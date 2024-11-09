<?php 

$listaCardapio = "";

foreach($lista_de_cardapio as $cardapio){
    $idCardapio = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = number_format($cardapio["preco"],2,",",".");  # valor, casas decimais, separador de decimais, separador milhar
    $tipo = $cardapio["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];

    # Cria os cards HTML com os dados do cardápio.
    $listaCardapio.= "
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <img src='$foto' class='card-img-top' alt='...'>
            <div class='card-body'>
                Nome: <strong>$nome</strong> <br>
                Preço: <strong>R$ $preco</strong> <br>
                $tipo <br>
                $descricao<br>
            </div>
            <div class='card-footer'>
                <a href='[[base-url]]/avaliacoes/listar/$idCardapio'>Avaliações</a>
            </div>
        </div>
    </div>
   ";    
}

$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer_site.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[titulo]]", "Nosso Cardápio.", $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[conteudo]]", $listaCardapio, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;