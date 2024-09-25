<?php 

$lista = "";

# Iterar sobre o array  que foi criado no controller e que contém os dados do cardapio.
foreach ($lista_de_cardapio as $cardapio){

    $id = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio ["preco"];
    $tipo = $cardapio ["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

     # Cria os cards HTML com os dados do cardapio.
    $lista.="
   
     <div class='card mx-2 mb-3' style='width: 18rem;'>
  <div class='card-body'>
  <h5 class='card-title'>$id: $nome</h5>
  
  <div class='d-flex justify-content-between'>
  <p class='card-subtitle mb-2 text-body-secondary fs-6'>$tipo <p class='text-success text-end fs-7'>$preco</p>
  </div>
    <p class='card-text'>$descricao</p>
  </div>
 </div>
    ";
}

# Faz a leitura dos arquivos de templates e armazena nas variáveis.
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/cardapioList.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;