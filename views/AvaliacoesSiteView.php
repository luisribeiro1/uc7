<?php

$lista="";

    $nome = $cardapioUnico["nome"];
    $preco = number_format($cardapioUnico["preco"],2,",","."); # number_format(valor,casas decimais, separador decimal, separador milhar)
    $descricao = $cardapioUnico["descricao"];
    $foto = $cardapioUnico["foto"];
    $idCardapio = $cardapioUnico["idCardapio"];
    

    # Cria os cards HTML com os dados dos cardápios
    $card_cardapio = "
            <div class='card shadow'>
                <img src='$foto' class='card-img-top' alt='...'>
              <div class='card-body'>
                  Nome: <strong>$nome</strong>
                  <br>
                  Preço: <strong>$preco</strong>
                  <br>
                  <strong>$descricao</strong>
                  <br>
                  <a href='[[base-url]]/cardapio' class='btn btn-sm btn-primary mt-2'>Voltar</a>
              </div>
            </div>";
                                  
 
$lista_avaliacoes = "";  # será usada futuramente
         
$lista = "
    <div class='col-md-6 mb-4'>
        $card_cardapio
    </div>      
    <div class='col-md-6 mb-4'>
        $lista_avaliacoes
    </div>      
";         


# Faz a leitura dos arquivos de templates e armazena nas variaveis
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");


# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece
# com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "AVALIAÇÕES", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;