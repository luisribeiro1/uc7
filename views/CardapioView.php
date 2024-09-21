<?php

$lista = "";
foreach ($lista_do_cardapio as $cardapio) {
    $id = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio["preco"];
    $tipo = $cardapio["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

    $preco = str_replace(".",",",$preco);

    $status_form = "";
    $text_form = "";
    if($status <1){
        $status_form = "alert alert-danger px-0 py-0";
        $text_form = "text-decoration-line-through";
    }
    
    $lista.="
    <div class='col-md-3 mb-3'>
        <div class='card $status_form'>
            <div class='card-body $text_form'>
                <div class='d-flex justify-content-between'>
                <p class='fs-4 my-1 '>$nome</p>
                <p class='text-end my-1'>#$id</p>
                </div>
                <div class='d-flex justify-content-between m'>
                <p class='text-start my-0'>tipo: $tipo</p>
                <p class='text-success my-0'><strong>R$ $preco</strong></p>
                </div>
                <hr>
                $descricao
            </div>
                <div class='card-footer d-flex justify-content-end'>
                <a href='#' class='btn btn-primary btn-sm me-1'><i class='bi bi-pencil-square'></i> Editar</a>
                <a href='#' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i> Excluir</a>
                </div>
        </div>
    </div>
    ";
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/cardapioList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);

echo $html; 