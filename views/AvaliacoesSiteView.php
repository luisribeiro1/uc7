<?php

# Interar sobre o array que foi criado com controller e que contém os dados das mesas
    $id = $cardapioUnico["idCardapio"];
    $nome = $cardapioUnico["nome"];
    $preco = number_format($cardapioUnico["preco"],2,",",".");    # number_format(valor,casas decimais,separador decimal,separador milhar)
    $tipo = $cardapioUnico["tipo"];
    $descricao = $cardapioUnico["descricao"];
    $foto = $cardapioUnico["foto"];
    $status = $cardapioUnico["status"];

    $status_form = "";
    $text_form = "";
    $status_view = "";
    if($status <1){
        $status_form = "alert alert-danger px-0 py-0";
        $text_form = "text-decoration-line-through";
        $status_view = "<span class='align-self-center badge text-bg-danger'>INDISPONÍVEL</span>";
    }
    
    #Cria os cards HTML com os dados das mesas
    $card_cardapio = "
        <div class='card $status_form shadow'>
            <img src='$foto' class='card-img-top' alt='...'>
            <div class='card-header'>
                <div class='d-flex justify-content-between'>
                    <p class='fs-4 my-0 $text_form'>$nome</p>
                    <p class='text-end my-0 py-0 $text_form'>$status_view</p>
                </div>
                <div class='d-flex justify-content-between '>
                    <p class='text-start my-0 $text_form'><strong>Tipo:</strong> $tipo</p>
                    <p class='my-0 $text_form'><strong>Preço: <span class='text-success'>R$ $preco</span></strong></p>
                </div>
            </div>
                <div class='card-body py-2 $text_form'>
                    <span class=''><strong>Descrição:</strong> $descricao</span>
                </div>
                <div class='card-footer d-flex justify-content-start'>
                    <a href='[[base-url]]/cardapio' class='btn btn-secondary btn-sm'><i class='bi bi-arrow-left'></i> Voltar </a>
                </div>
            </div>
        </div>
    ";

    $lista_avaliacoes = "";     # Sera usada futuramente

    $lista = "
        <div class='col-md-4 mb-4'>
            $card_cardapio
        </div>
        <div class='col-md-6 mb-4'>
            $lista_avaliacoes
        </div>
    ";

# Faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer_site.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

# Substituir a tag [[header]] pelo conteudo da variavel $header. O mesmo acontece com as demais variaveis.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[titulo]]", "<i class='bi bi-stars'></i> | Avaliações:", $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html; 