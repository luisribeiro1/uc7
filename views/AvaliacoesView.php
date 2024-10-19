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
    $editar = "<a href='[[base-url]]/avaliacoes-adm/aprovar/$id' class='btn btn-success btn-sm me-1'><i class='bi bi-check2-square'></i> Aprovar </a>";
    $excluir = "<a href='[[base-url]]/avaliacoes-adm/excluir/$id' onclick=\"return confirm('Confirma a exclusão desta avaliação? $id')\" class='btn btn-danger btn-sm'><i class='bi bi-trash'></i> Excluir</a>";

    
    if(isset($_SESSION["nivelAcesso"])){
        if($_SESSION["nivelAcesso"] == 2){
            $excluir = "";
        }elseif($_SESSION["nivelAcesso"] == 3){
            $excluir = "";
            $editar = "";
        }
    }else{
        if($_COOKIE["nivel"] == 2){
            $excluir = "";
        }elseif($_COOKIE["nivel"] == 3){
            $excluir = "";
            $editar = "";
        }
    }


    $status_form = "";
    $text_status = "";
    $situacaoF = "";
    $estrelas = "";

    switch ($nota) {
        case "1":
            $estrelas = "<i class='bi bi-star-fill'></i>";
            break;
        case "2":
            $estrelas = "<i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>";
            break;
        case "3":
            $estrelas = "<i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>";
            break;
        case "4":
            $estrelas = "<i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>";
            $text_form = "text-Wwa";
            break;
        case "5":
            $estrelas = "<i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>";
            break;
        default:
            $estrelas = "<i class='bi bi-exclamation-triangle-fill text-danger'></i>";
            break;
    }

    if($situacao == "novo"){
        $status_form = "alert alert-warning px-0 py-0";
        $text_status = " text-warning small";
        $situacaoF = "<i class='bi bi-hourglass-split'></i> Aguardando Aprovação";
    }else{
        $status_form = "";
        $text_status = " text-success";
        $situacaoF = "<i class='bi bi-check2-circle'></i> Aprovado";
    }
    
    #Cria os cards HTML com os dados das mesas
    $lista.="
    <div class='col-md-3 mb-3'>
        <div class='card $status_form shadow'>
            <div class='card-header'>
            <div class='d-flex justify-content-between'>
                <p class='fs-4 my-1 mb-0 '>$nome</p>
                <p class='text-end my-1'>#$id</p>
            </div>
            <div class='d-flex justify-content-between'>
                <p class='mt-1 mb-0'>$email</p>
                <p class='text-warning text-end mt-1 mb-0 mx-2'>$estrelas</p>
            </div>
            </div>
            <div class='card-body py-2 px-0'>
            <p class='mx-2 mb-0'>''$comentario'' - $nome</p>
            <hr class='my-1'>
            <div class='d-flex justify-content-between'>
            <p class='text-start mt-1 mb-0 mx-2'><strong>Data:</strong> $data</p>
            <p class='mt-1 mb-0 mx-2'><strong>Pedido:</strong> $pedido</p>
            
            </div>
            <hr class='my-1'>
            <div class='d-flex justify-content-between'>
            <p class='my-1 mx-2'><strong>Status atual:</strong></p>
             <span class='$text_status my-1 mx-2 text-end'>$situacaoF</span>
            </div>
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
$html = file_get_contents("views/templates/html/avaliacoesList.html");

# Substituir a tag [[header]] pelo conteudo da variavel $header. O mesmo acontece com as demais variaveis.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html; 