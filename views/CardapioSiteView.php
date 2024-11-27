<?php

$lista = "";

# Interar sobre o array que foi criado com controller e que contém os dados das mesas
foreach ($lista_do_cardapio as $cardapio) {
    $id = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = number_format($cardapio["preco"],2,",",".");    # number_format(valor,casas decimais,separador decimal,separador milhar)
    $tipo = $cardapio["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

    $status_form = "";
    $text_form = "";
    $status_view = "";
    if($status <1){
        $status_form = "alert alert-danger px-0 py-0";
        $text_form = "text-decoration-line-through";
        $status_view = "<span class='align-self-center badge text-bg-danger'>INDISPONÍVEL</span>";
    }
    
    #Cria os cards HTML com os dados das mesas
    $lista.="
    <div class='col-md-3 mb-3'>
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
                    <div class='card-footer d-flex justify-content-end'>
                    <a href='[[base-url]]/avaliacoes/listar/$id' class='btn btn-secondary btn-sm'><i class='bi bi-stars'></i> Avaliações </a>
                </div>
            </div>
    </div>
    ";
}

# Faz a leitura dos arquivos de templates e armazena nas variáveis
$js = "<script src='#'></script>";
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer_site.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

# Substituir a tag [[header]] pelo conteudo da variavel $header. O mesmo acontece com as demais variaveis.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[titulo]]", "<i class='bi bi-grid-1x2-fill text-info'></i> <span class='text-primary'>|</span> NOSSO CARDÁPIO:", $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[js]]", $js, $html);

echo $html; 