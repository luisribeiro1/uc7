<?php

$lista = "";

# Interar sobre o array que foi criado com controller e que contém os dados das mesas
foreach ($lista_do_cardapio as $cardapio) {
    $id = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio["preco"];
    $tipo = $cardapio["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];
    $editar = "<a href='[[base-url]]/cardapio-adm/editar/$id' class='btn btn-primary btn-sm me-1'><i class='bi bi-pencil-square'></i> Editar</a>";
    $excluir = "<a href='[[base-url]]/cardapio-adm/excluir/$id' onclick=\"return confirm('Confirma a exclusão desta item do cardapio? $id')\" class='btn btn-danger btn-sm'><i class='bi bi-trash'></i> Excluir</a>";

    if($_SESSION["nivelAcesso"] == 2){
        $excluir = "";
    }elseif($_SESSION["nivelAcesso"] == 3){
        $excluir = "";
        $editar = "";
    }

    $preco = str_replace(".",",",$preco);

    $status_form = "";
    $text_form = "";
    if($status <1){
        $status_form = "alert alert-danger px-0 py-0";
        $text_form = "text-decoration-line-through";
    }
    
    #Cria os cards HTML com os dados das mesas
    $lista.="
    <div class='col-md-3 mb-3'>
        <div class='card $status_form shadow'>
            <img src='$foto' class='card-img-top' alt='...'>
            <div class='card-header'>
                <div class='d-flex justify-content-between'>
                    <p class='fs-4 my-0 $text_form'>$nome</p>
                    <p class='text-end my-0 $text_form'>#$id</p>
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
                        $editar
                        $excluir
                    </div>
            </div>
    </div>
    ";
}

# Faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/cardapioList.html");

# Substituir a tag [[header]] pelo conteudo da variavel $header. O mesmo acontece com as demais variaveis.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html; 