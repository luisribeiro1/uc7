<?php

$lista = "";
foreach ($lista_do_cardapio as $cardapio) {
      $idCardapio = $cardapio["idCardapio"];
      $nome = $cardapio["nome"];
      $preco = $cardapio["preco"];
      $tipo = $cardapio["tipo"];
      $descricao = $cardapio["descricao"];
      $foto = $cardapio["foto"];
      $status = $cardapio["status"];

      $linkEditar = " <a class= 'text-primary me-2 text-decoration-none'
      href='[[base-url]]/cardapio-adm/editar/$idCardapio'>
      <i class= 'bi bi-pencil-square'></i>Editar</a>
";
      $linkExcuir = " <a class= 'text-danger me-2 text-decoration-none'
      href='[[base-url]]/cardapio-adm/excluir/$idCardapio'
      onclick=\"return confirm('confirmar a exclusão do cardápio $idCardapio?')\"
      ><i class= 'bi bi-trash'></i>excluir</a>
";

      if($_SESSION["nivel_usuario"] == 2){
            $linkExcuir = "";
      }elseif($_SESSION["nivel_usuario"] == 3){
            $linkEditar =  "";
            $linkExcuir = "";
      }

      $lista.="
      <div class='col-md-3 mb-4'>
      <div class= 'card'>
      <div class='card-body'>
      <strong>Cardapio: $idCardapio<br></strong>
      $nome , $preco preco,
      $descricao , $foto
      $tipo , $status
      </div>
      <div class= 'card-footer'>
     
     
      $linkEditar
    $linkExcuir

      </div>
      </div>
      </div>

      ";
}

$header = file_get_contents("views/html/header.html");
$footer = file_get_contents("views/html/footer.html");
$html = file_get_contents("views/html/cardapioList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);


echo $html;