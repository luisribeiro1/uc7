<?php

//echo "<pre>";
//var_dump($lista_de_pizzas);
//echo "<pre>";

# Variavel para incluir os codigos HTML da página
$lista = "";

if(isset($lista_de_pizzas)){

  foreach($lista_de_pizzas as $pizza){
    $nome = $pizza["nome"];
    $preco = number_format( $pizza["preco"],2,",",".");
    $imagem = $pizza["imagem"];

    $lista_de_ingredientes = "";
    foreach($pizza["ingredientes"] as $ingrediente){
       $lista_de_ingredientes .= "$ingrediente, ";
    }

    $lista.= "
      <div class='col-md-4 mt-4'>
     <div class= 'card shadow'>
     <img src='$imagem' class='card-img-top' alt='$nome'>
     <div class='card-body'>
     <strong>Nome: $nome<br></strong>
     <strong>R$: $preco<br></strong>
   $lista_de_ingredientes
     </div>
     </div>
    </div>
    
    
    ";

 
}
} else{
  $lista = "<div class='alert bg-danger text-white'>$erro</div>";
}

# Interar sobre o array $lista_de_pizzas que contem a lista das pizzas


$header = file_get_contents("views/html/header_site.html");
$footer = file_get_contents("views/html/footer.html");
$html = file_get_contents("views/html/modeloSite.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[titulo]]", "Cardapio de pizzas", $html);
$html = str_replace("[[js]]", "", $html);

echo $html;