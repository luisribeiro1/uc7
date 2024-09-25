<?php

$lista = "";

# itera sobre o array que foi criado com o controller e que contém os dados das mesas
foreach ($lista_avaliacao as $avaliacao) {
  $idAvaliacao = $avaliacao['idAvaliacao'];
  $nota = $avaliacao['nota'];
  $comentario = $avaliacao['comentario'];
  $data = $avaliacao['data'];
  $nome = $avaliacao['nome'];
  $email = $avaliacao['email'];
  $situacao = $avaliacao['situacao'];
  $idCardapio = $avaliacao['idCardapio'];

  # cria os cards HTML com os dados das mesas
  $lista .= "
    <div class='col-md-4 mb-3'>
      <div class='card shadow'>

        <div class'card-title '>
          <div class='row '>
            <div class='col-6'>
              <strong class='ms-3 mt-2'>$nome</strong>
            </div>
            <div class='col-6 d-flex justify-content-end'>
              <strong class='text-end text-warning me-3 mt-1'>$nota estrelas</strong>
            </div>
          </div>
        </div>
        
        <div class='card-body'>
          <p>&#34;$comentario&#34;</p>
        </div>
        
        <div class='card-footer d-flex justify-content-between'>
          <div class='row'>
            <div class='col-6'>
              <small class='text-primary'><em>$email</em></small>
            </div>
              
            <div class='col-6 d-flex justify-content-end'>
              <small class='text-primary'><em>$data</em></small>
            </div>
          </div>
        </div>

      </div>
    </div>
  ";
}

# faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/avaliacao.html");

# substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[avaliacao]]", $lista, $html);
$html = str_replace("[[footer]]", $footer, $html);

echo $html;