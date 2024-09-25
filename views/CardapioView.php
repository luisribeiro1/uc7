<?php

# Iterar sobre o array que foi criado com controller e que contém os dados do cardápio
$lista = "

<table class='table col-md-2'>
  <thead>
    <tr>
      <th>Nº</th>
      <th>Nome do prato</th>
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

    # Cria os cards HTML com os dados das mesas
    $lista.="
    <tr>
      <td>$idCardapio</td>
      <td>$nome</td>
      <td>R$$preco</td>
      <td>$tipo</td>
      <td>$descricao</td>
      <td>$foto</td>
    </tr>";  
    
}

  $lista .="
    </tbody>
  </table>"; 

  # Faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/CardapioList.html");

# Substituir a tag [[header]] pelo cinteúdo da variável $header. O mesmo acontece
# com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;