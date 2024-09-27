<?php

# itera sobre o array que foi criado com o controller e que contém os dados das mesas
$lista = "";
foreach ($lista_de_mesas as $mesa) {
  $id = $mesa['id'];
  $lugares = $mesa['lugares'];
  $tipo = $mesa['tipo'];

  # cria os cards HTML com os dados das mesas
  $lista .= "
    <div class='col-md-3 mb-3'>
      <div class='card'>
          <div class='card-body'>
          <strong>Mesa: $id</strong></br>
          $tipo com $lugares lugares
        </div>
        <div class='card-footer d-flex justify-content-between'>
          <a class='text-primary text-decoration-none' href='#'><i class='bi bi-pencil-square'></i> Editar</a>
          <a class='text-danger text-decoration-none' href='[[base-url]]/mesa-adm/excluir/$id' 
            onclick=\"return confirm('Confirma a exclusão da mesa $id?')\">
            <i class='bi bi-trash'></i> Excluir</a>
        </div>
      </div>
    </div>
  ";
}

# faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/mesaList.html");

# substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;