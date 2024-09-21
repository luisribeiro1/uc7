<?php

$lista = "";

foreach ($lista_avaliacao as $avaliacao) {
  $idAvaliacao = $avaliacao['idAvaliacao'];
  $nota = $avaliacao['nota'];
  $comentario = $avaliacao['comentario'];
  $data = $avaliacao['data'];
  $nome = $avaliacao['nome'];
  $email = $avaliacao['email'];
  $situacao = $avaliacao['situacao'];
  $idCardapio = $avaliacao['idCardapio'];

  $lista .= "
    <div class='col-md-4 mb-3'>
      <div class='card'>
        <div class'card-title'>
          <strong class='p-3'>$nota estrela(s)</strong>
        </div>
        <div class='card-body'>
          <p>&#34;$comentario&#34;</p>
        </div>
        <div class='card-footer d-flex justify-content-between'>
          <p class='text-primary'><em>$nome</em></p>
          <p class='text-primary'><em>$email</em></p>
          <p class='text-primary'><em>$data</em></p>
        </div>
      </div>
    </div>
  ";
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/avaliacao.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[avaliacao]]", $lista, $html);
$html = str_replace("[[footer]]", $footer, $html);

echo $html;