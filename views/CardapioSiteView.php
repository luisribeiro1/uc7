<?php

$lista="";


foreach ($cardapio as $item) {
    $idCardapio = $item["idCardapio"];
    $nome = $item["nome"];
    # number_format(valor, casas decimais, separador decimal, separador milhar)
    $preco = number_format($item["preco"],2,",",".");   
    //$tipo = $item["tipo"];
    $descricao = $item["descricao"];
    $foto = $item["foto"];
    //$status = $item["status"];

    # Cria os cards HTML com os dados dos cardápios
    $lista .= "
       
        <div class='col-md-4 mb-4'>
            <div class='card shadow'>
                <img src='$foto' class='card-img-top' alt='...'>
              <div class='card-body'>
                  Nome: <strong>$nome</strong>
                  <br>
                  Preço: <strong>$preco</strong>
                  <br>
                  Descrição: <strong>$descricao</strong>
                  <br>
                  <a href='[[base-url]]/avaliacoes/listar/$idCardapio'><i class='bi bi-star'> Avaliações</i> </a>
                </div>
            </div>
        </div>";
}

# Faz a leitura dos arquivos de templates e armazena nas variaveis
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece
# com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "NOSSO CARDÁPIO", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[js]]","", $html);

echo $html;