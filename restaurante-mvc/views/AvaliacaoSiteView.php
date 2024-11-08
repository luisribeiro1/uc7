<?php

# itera sobre o array que foi criado com o controller e que contém os dados das mesas
$idCardapio = $cardapioUnico['idCardapio'];
$nome = $cardapioUnico['nome'];
# number_format(valor, casas decimais, separador decimal, separador milhar)
$preco = number_format($cardapioUnico['preco'],2,",",".");
$descricao = $cardapioUnico['descricao'];
$foto = $cardapioUnico['foto'];


  # cria os cards HTML com os dados das mesas
  $card_cardapio = "

    <div class='card shadow'>
      <img src='$foto' class='card-img-top' alt='..'>
      <div class='card-body'>
        Nome: <strong>$nome</strong>
        <br>
        Preço: <strong>R$ $preco</strong>
        <br>
        <strong>$descricao</strong>
        <br>
        <div clas='d-flex justify-content-end align-items-center'>
          <button class='btn btn-sm btn-primary mt-4' href='[[base-url]]/cardapio'>Voltar</button>
        </div>
      </div>
    </div>
  ";

  $lista_avaliacoes = "";

$lista = "
  <div class='col-md-6 mb-4'>
    $card_cardapio
  </div>
  <div class='col-md-6 mb-4'>
    $lista_avaliacoes
  </div>
";


# faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

# substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[titulo]]", "AVALIAÇÕES", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;