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
      <th>Ações</th>
    </tr>";
foreach ($lista_cardapio as $cardapio) {
    $idCardapio = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio["preco"];
    $tipo = $cardapio["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

    # Cria os cards HTML com os dados dos cardápios
    $lista .= "

    <tr>
        <td>$idCardapio</td>
        <td>$nome</td>
        <td>R$$preco</td>
        <td>$tipo</td>
        <td>$descricao</td>
        <td>$foto</td>
        <td>
                <a class='text-primary text-decoration-none me-2' href='[[base-url]]/cardapio-adm/editar/$idCardapio'>
                <i class='bi bi-pencil-square'></i> Editar</a>
                <a 
                class='text-danger text-decoration-none ' 
                href='[[base-url]]/cardapio-adm/excluir/$idCardapio'
                onclick=\"return confirm('Confirma a exclusão do item $idCardapio do Cardápio?')\"
                ><i class='bi bi-trash'></i> Excluir</a>
        </td>

    </tr>";
}

$lista .= "
  </tbody>
</table>";

# Faz a leitura dos arquivos de templates e armazena nas variaveis
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/cardapioList.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece
# com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;