<?php

$lista = "";

# Interar sobre o array que foi criado com controller e que contém os dados das mesas
foreach ($informacoes as $usuario) {
    $id = $usuario["idUsuario"];
    $nome = $usuario["nome"];
    $usuario = $usuario["usuario"];
    $nivelAcesso = $usuario["nivelAcesso"];

    $editar = "<a href='[[base-url]]/usuarios-adm/editar/$id' class='btn btn-primary btn-sm me-1'><i class='bi bi-pencil-square'></i> Editar </a>";
    $alterar = "<a href='[[base-url]]/usuarios-adm/alterar/$id' class='btn btn-secondary btn-sm me-1'><i class='bi bi-key'></i> Alterar Senha </a>";
    $excluir = "<a href='[[base-url]]/usuarios-adm/excluir/$id' onclick=\"return confirm('Confirma a exclusão desta avaliação? $id')\" class='btn btn-danger btn-sm'><i class='bi bi-trash'></i> Excluir</a>";

    
    if(isset($_SESSION["nivelAcesso"])){
        if($_SESSION["nivelAcesso"] == 2){
            $excluir = "";
        }elseif($_SESSION["nivelAcesso"] == 3){
            $excluir = "";
            $editar = "";
            $alterar = "";
        }
    }else{
        if($_COOKIE["nivel"] == 2){
            $excluir = "";
        }elseif($_COOKIE["nivel"] == 3){
            $excluir = "";
            $editar = "";
            $alterar = "";
        }
    }

    
    #Cria os cards HTML com os dados das mesas
    $lista.="
    <div class='col-md-3 mb-3'>
        <div class='card shadow'>
            <div class='card-header'>
            <div class='d-flex justify-content-between'>
                <p class='fs-4 my-1 mb-0 '>$nome</p>
                <p class='text-end my-1'>#$id</p>
            </div>
            <div class='d-flex justify-content-between'>
                <p class='mt-1 mb-0'>$usuario</p>
                <p class='text-warning text-end mt-1 mb-0 mx-2'>$nivelAcesso</p>
            </div>
            </div>
                <div class='card-footer d-flex justify-content-end'>
                $editar
                $alterar
                $excluir
                </div>
        </div>
    </div>
    ";
}

# Faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/usuarioList.html");

# Substituir a tag [[header]] pelo conteudo da variavel $header. O mesmo acontece com as demais variaveis.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html; 