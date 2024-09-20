<?php 

$lista = "";
foreach ($lista_de_cardapio as $cardapio){

    $id = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio ["preco"];
    $tipo = $cardapio ["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

    $lista.="
     <tbody>
    <tr>
      <th scope='row'>$id</th>
      <td>$nome</td>
      <td>$preco</td>
      <td>$tipo</td>
      <td>$descricao</td>
      
      <td>$foto</td>
    </tr>
  </tbody>
    ";
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/cardapioList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);

echo $html;