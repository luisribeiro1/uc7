<?php

$lista = "
<table class='table col-md-2'>
  <thead>
    <tr>
      <th>Nº</th>
      <th>Nota</th>
      <th>Comentário</th>
      <th>Data</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Situação</th>
      <th>Nº do Item</th>
      <th>Ações</th>
      
    </tr>";

foreach ($lista_avaliacoes as $avaliacoes) {
    $idAvaliacao = $avaliacoes["idAvaliacao"];
    $nota = $avaliacoes["nota"];
    $comentario = $avaliacoes["comentario"];
    $data = $avaliacoes["data"];
    $nome = $avaliacoes["nome"];
    $email = $avaliacoes["email"];
    $situacao = $avaliacoes["situacao"];
    $idCardapio = $avaliacoes["idCardapio"];

    $lista.="
    <tr>
      <td>$idAvaliacao</td>
      <td>$nota</td>
      <td>$comentario</td>
      <td>$data</td>
      <td>$nome</td>
      <td>$email</td>
      <td>$situacao</td>
      <td>$idCardapio</td>
      <td>
           <a class='text-primary text-decoration-none me-4' href='#'><i class='bi bi-pencil-square'></i>Aprovar</a>
                <a 
                class='text-danger text-decoration-none' 
                href='[[base-url]]/cardapio-adm/excluir/$idAvaliacao'
                onclick=\"return confirm('Confirma a exclusão da avaliação nº $idAvaliacao ?')\"
                ><i class='bi bi-trash'></i>Excluir</a>
      </td>
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