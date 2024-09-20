<?php 

$listaCardapio = "";
foreach($lista_de_cardapio as $cardapio){

    $idCardapio = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio["preco"];
    $tipo = $cardapio["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

    $listaCardapio.= "
    <div class='card' style='width: 18rem;'>
        <h3 class='card-title'>$idCardapio</h3>
        <p class='bg-info'>$status</p>
        <img class='card-img-top' src='' alt='Card image cap'>
        <div class='card-body'>
            <h3 class='card-title'>$nome</h3>
            <h6 class='card-title'>$tipo</h6>
            
            <p class='card-text'>$descricao</p>
            <a href='#' class='btn btn-primary'>$preco</a>
        </div>
     </div>
    ";
    
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/mesaList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $listaCardapio, $html);

echo $html;