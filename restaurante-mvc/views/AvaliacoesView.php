<?php

$lista = "";
foreach ($lista_de_avaliacoes as $avaliacoes) {
      $idAvaliacoes = $avaliacoes["idAvaliacoes"];
      $nota = $avaliacoes["nota"];
      $comentario = $avaliacoes["comentario"];
      $data = $avaliacoes["data"];
      $nome = $avaliacoes["nome"];
      $email = $avaliacoes["email"];
      $situacao = $avaliacoes["situacao"];
      
      $lista.="
      <div class='col-md-3 mb-4'>
      <div class= 'card'>
      <div class='card-body'>
      <strong>Cardapio: $idAvaliacoes<br></strong>
      $nota , $comentario ,
      $data , $nome
      $email , $situacao
      </div>
      <div class= 'card-footer'>
      <a class= 'text-primary me-2 text-decoration-none'href='#'><i class= 'bi bi-pencil-square'></i>Editar</a>
      <a class= 'text-danger me-2 text-decoration-none'

      href='[[base-url]]/avaliacoes-adm/excluir/$idAvaliacoes'
      onclick=\"return confirm('confirmar a exclusao de avaliaçoes $idAvaliacoes?')\"
      ><i class= 'bi bi-trash'></i>Exluir</a>
      </div>
      </div>
      </div>

      ";
}

$header = file_get_contents("views/html/header.html");
$footer = file_get_contents("views/html/footer.html");
$html = file_get_contents("views/html/avaliacoesList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);


echo $html;