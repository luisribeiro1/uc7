<?php

$lista="
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

    # Cria os cards HTML com os dados das avaliações
    $lista .= "
    <tr>
        <td>$idAvaliacao</td>
        <td>R$$nota</td>
        <td>$comentario</td>
        <td>$data</td>
        <td>$nome</td>
        <td>$email</td>
        <td>$situacao</td>
        <td>$idCardapio</td>
    </tr>";
}

$lista .= "
  </tbody>
</table>";

# Faz a leitura dos arquivos de templates e armazena nas variaveis
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/avaliacoesList.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece
# com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;