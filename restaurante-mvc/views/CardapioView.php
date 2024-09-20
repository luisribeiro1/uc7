<?php


$lista = "";
foreach ($lista_do_cardapio as $cardapio){
    $id =$cardapio["idCardapio"];
    $nome =$cardapio["nome"];
    $preco =$cardapio["preco"];
    $tipo =$cardapio["tipo"];
    $descricao =$cardapio["descricao"];
    $foto =$cardapio["foto"];
    $status =$cardapio["status"];

    $lista.= "
        <div class='table'>
            <thead>
            <tr>
                <th>$id</th>
                <th>$nome</th>
                <th>$preco</th>
                <th>$tipo</th>
                <th>$descricao</th>
                <th>$foto</th>
                <th>$status</th>
                </tr>
            </thead>

          
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