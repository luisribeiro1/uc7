<?php

$lista = "";
$colunaTabela = "";
$nivel_1 = "";
$nivel_2 = "";
$nivel_3 = "";

# itera sobre o array que foi criado com o controller e que contém os dados das mesas
foreach ($lista_cardapio as $cardapio) {
  $idCardapio = $cardapio['idCardapio'];
  $status = $cardapio['status'];
  $nome = $cardapio['nome'];
  $preco = $cardapio['preco'];
  $tipo = $cardapio['tipo'];
  $descricao = $cardapio['descricao'];
  $foto = $cardapio['foto'];

  if (isset($_COOKIE['nivelAcesso'])) {
    $nivelAcesso = $_COOKIE["nivel_acesso"];

    if ($nivelAcesso == 3) {
      $nivel_3 = "d-none";
    } elseif ($nivelAcesso == 2) {
      $nivel_2 = "d-none";
    } else {
      $nivel_1;
    }
  } else {
    if (isset($_COOKIE['nivelAcesso'])) {
      $nivelAcesso = $_COOKIE["nivel_acesso"];

      if ($nivelAcesso == 3) {
        $nivel_3 = "d-none";
      } elseif ($nivelAcesso == 2) {
        $nivel_2 = "d-none";
      } else {
        $nivel_1;
      }
    }
  }

  # cria os cards HTML com os dados das mesas
  $lista .= "
    <td class='text-center '>$idCardapio</td>
      <td class='text-center'>$nome</td>
      <td class='text-center'>R$ $preco</td>
      <td class='text-center'>$tipo</td>
      <td>$descricao</td>
      <td class='text-center'>
        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal$idCardapio'>
          Foto do Produto
        </button>

        <div class='modal fade' id='modal$idCardapio' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
          <div class='modal-dialog modal-dialog-centered'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h1 class='modal-title fs-5 ' id='exampleModalLabel'>$nome</h1>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
              </div>
              <div class='modal-body'>
                <img class='card-img rounded' src='$foto'>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
              </div>
            </div>
          </div>
        </div>
      </td>
      <td class='text-center $nivel_3'>
          <a class='btn btn-primary' href='[[base-url]]/cardapio-adm/editar/$idCardapio'
          onclick=\"return confirm('Confirma a edição do cardápio $idCardapio?')\">
            <i class='bi bi-pencil-square'></i> Editar</a>
      </td>
      <td class='text-center $nivel_2 $nivel_3'>
          <a class='btn btn-danger opacity-75' href='[[base-url]]/cardapio-adm/excluir/$idCardapio'
          onclick=\"return confirm('Confirma a exclusão do cardápio $idCardapio?')\">
            <i class='bi bi-trash'></i> Exluir</a>
      </td>
    </tr>
  ";
}

$colunaTabela .= "
    <div class=''>
    <th class='text-center $nivel_3'>Editar</th>
    <th class='text-center $nivel_2 $nivel_3'>Excluir</th>
    </div>
    ";

# faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/tabela-cardapio.html");

# substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[cardapio]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[coluna-tabela]]", $colunaTabela, $html);

echo $html;