<?php 

$lista = "";
foreach($lista_de_cardapio as $cardapio) {
    $id = $cardapio["idCardapio"];
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
                <strong>$nome</strong><br>
                $tipo <br>
                $descricao<br>
            </div>
            <div class='card-footer'>
                <button class='btn btn-primary'>R$ $preco</button>
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