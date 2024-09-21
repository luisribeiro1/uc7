<?php

$lista = "";
foreach ($lista_de_cardapio as $cardapio) {
   $idcardapio= $cardapio["idcardapio"];    
    $nome=$cardapio["nome"];    
    $preco=$cardapio["preco"];    
    $tipo=$cardapio["tipo"];    
    $descricao=$cardapio["descricao"];    
    $foto=$cardapio["foto"];    
    $status=$cardapio["status"];    

    $lista.="
    <div class='col-md-3 mb-4'>
         <div class='card'>
             <div class='card-body'>
               <strong>cardapio: $idcardapio<br></strong>
               $nome, $preco preco,
               $descricao, $foto
               $tipo, $status 
                      
            </div>
            <div class='card-footer'>
                <a class='text-primary text-decoration-none me-4' href='#'><i class='bi bi-pencil-square'></i> Editar</a> 
                <a class='text-danger text-decoration-none' href='#'><i class='bi bi-trash'></i> Excluir</a> 
            </div>

        </div>

    </div>    
    ";

}

$header = file_get_contents("views/template/html/header.html");
$footer = file_get_contents("views/template/html/footer.html");
$html = file_get_contents("views/template/html/mesalist.html");
$html = file_get_contents("views/template/html/cardapiolist.html");


$html = str_replace("[[header]]",$header,$html);
$html = str_replace("[[footer]]",$footer,$html);
$html = str_replace("[[lista]]",$lista,$html);

echo $html;