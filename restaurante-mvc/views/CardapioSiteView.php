<?php

$lista ="";

# itera sobre o array que foi criado com o controller e que contém os dados das mesas
foreach ($lista_cardapio as $cardapio) {
  $idCardapio = $cardapio['idCardapio'];
  $nome = $cardapio['nome'];
  # number_format(valor, casas decimais, separador decimal, separador milhar)
  $preco = number_format($cardapio['preco'],2,",",".");
  $descricao = $cardapio['descricao'];
  $foto = $cardapio['foto'];


  # cria os cards HTML com os dados das mesas
  $lista .= "

  <div class='col-md-4 mb-4'>
    <div class='card shadow'>
      <img src='$foto' class='card-img-top' alt='..'>
      <div class='card-body'>
        Nome: <strong>$nome</strong>
        <br>
        Preço: <strong>R$ $preco</strong>
        <br
        <strong>$descricao</strong>
        <br>
        <a class='text-decoration-none my-2' href='[[base-url]]/avaliacoes/listar/$idCardapio'>Avaliações</a>
      </div>
    </div>
  </div>
  ";
}

# faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

# substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[titulo]]", "CARDÁPIO", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;