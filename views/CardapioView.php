<?php

$lista="
    <table class='table col-md-2'>
  <thead>
    <tr>
      <th>Nº</th>
      <th>Nome do Prato</th>
      <th>Preço</th>
      <th>Tipo</th>
      <th>Descrição</th>
      <th>Foto</th>
    </tr>";
foreach ($lista_cardapio as $cardapio) {
    $idCardapio = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio["preco"];
    $tipo = $cardapio["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

    $lista .= "
    <tr>
        <td>$idCardapio</td>
        <td>$nome</td>
        <td>R$$preco</td>
        <td>$tipo</td>
        <td>$descricao</td>
        <td>$foto</td>
    </tr>";
}

$lista .= "
  </tbody>
</table>";


$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/cardapioList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);

echo $html;