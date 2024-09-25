<?php

$lista = "";

# Interar sobre o array que foi criado com controller e que contém os dados das mesas
foreach ($lista_do_avaliacoes as $avaliacoes) {
    $id = $avaliacoes["idAvaliacao"];
    $nota = $avaliacoes["nota"];
    $comentario = $avaliacoes["comentario"];
    $data = $avaliacoes["data"];
    $nome = $avaliacoes["nome"];
    $email = $avaliacoes["email"];
    $situacao = $avaliacoes["situacao"];
    $pedido = $avaliacoes["idCardapio"];
    
    $text_form = "";
    $status_form = "";

    if($nota < 3){
        $text_form = "text-danger";
    }elseif($nota <= 4){
        $text_form = "text-warning";
    }elseif($nota > 4){
        $text_form = "text-success";
    }

    #Cria os cards HTML com os dados das mesas
    $lista.="
    <div class='col-md-3 mb-3'>
        <div class='card $status_form'>
            <div class='card-header'>
            <div class='d-flex justify-content-between'>
                <p class='fs-4 my-1 mb-0 '>$nome</p>
                <p class='text-end my-1'>#$id</p>
            </div>
                <p class=my-0>$email</p>
            </div>
            <div class='card-body'>
            ''$comentario'' - $nome
            <hr class='my-1'>
            <div class='d-flex justify-content-between'>
            <p class='text-start mt-1 mb-0'><strong>Data:</strong> $data</p>
            <p class='mt-1 mb-0'><strong>Pedido:</strong> $pedido</p>
            <p class='$text_form mt-1 mb-0'><strong>Nota: $nota</strong></p>
            </div>
            <hr class='my-1'>
            <p class='my-1'><strong>Veredito Administrativo:</strong> $situacao</p>
            </div>
                <div class='card-footer d-flex justify-content-end'>
                <a href='#' class='btn btn-primary btn-sm me-1'><i class='bi bi-pencil-square'></i> Editar</a>
                <a href='#' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i> Excluir</a>
                </div>
        </div>
    </div>
    ";
}

# Faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/avaliacoesList.html");

# Substituir a tag [[header]] pelo conteudo da variavel $header. O mesmo acontece com as demais variaveis.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html; 