<?php

$lista = "
<table class='table col-md-2'>
  <thead>
    <tr>
      <th>Nota</th>
      <th>Comentário</th>
      <th>Data</th>
      <th>Nome</th>
      <th>E-mail</th>
      <th>Situação</th>
      
    </tr>";

foreach ($lista_avaliacoes as $avaliacoes) {
    $idAvaliacao = $avaliacoes["idAvaliacao"];
    $nota = $avaliacoes["nota"];
    $comentario = $avaliacoes["comentario"];

    $lista.="
    <tr>
      <td>$idAvaliacao</td>
      <td>$nota</td>
      <td>R$comentario</td>
      <td>$tipo</td>
      <td>$descricao</td>
      <td>$foto</td>
    </tr>"; 
}

    $lista .="
        </tbody>
        </table>";

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/avaliacoesList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;