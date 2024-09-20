<?php

$lista = "";

foreach ($lista_cardapio as $cardapio) {
  $idCardapio = $cardapio['idCardapio'];
  $status = $cardapio['status'];
  $nome = $cardapio['nome'];
  $preco = $cardapio['preco'];
  $tipo = $cardapio['tipo'];
  $descricao = $cardapio['descricao'];
  $foto = $cardapio['foto'];

  $lista .= "
  <tr>
      <td class='text-center'>$idCardapio</td>
      <td class='text-center'>$nome</td>
      <td class='text-center'>R$ $preco</td>
      <td class='text-center'>$tipo</td>
      <td>$descricao</td>
      <td class='text-center'>
        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
          Foto do Produto
        </button>

        <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
          <div class='modal-dialog modal-dialog-centered'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h1 class='modal-title fs-5' id='exampleModalLabel'>$nome</h1>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
              </div>
              <div class='modal-body'>
                link da foto
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
              </div>
            </div>
          </div>
        </div>
      </td>
    </tr>
  ";
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/tabela-cardapio.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[cardapio]]", $lista, $html);

echo $html;