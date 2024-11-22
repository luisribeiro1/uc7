<?php

$lista = "";
foreach ($cardapio as $item) {
      $nome = $item["nome"];
      $preco = number_format($item['preco'],2,",",",");
      $descricao = $item["descricao"];
      $foto = $item["foto"];
      $idCardapio = $item["idCardapio"];
     

      $lista.="
      <div class='col-md-4 mb-4'>
      
      <div class= 'card shadow '>
        <img src='$foto' class='card-img-top' alt='...'
      <div class='card-body'>
        <strong>Nome: $nome</strong>
      <br>
        <strong>Preço: $preco</strong>
      <br>
        <strong>$descricao</strong>
      <br>
      <a href='[[base-url]]/avaliacoes/listar/$idCardapio'>Avaliações</a>
    
      </div>
      </div>
      </div>";
}

$header = file_get_contents("views/html/header_site.html");
$footer = file_get_contents("views/html/footer.html");
$html = file_get_contents("views/html/modeloSite.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "NOSSO CARDAPIO", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);


echo $html;