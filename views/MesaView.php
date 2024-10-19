<?php

$lista = "";

# Interar sobre o array que foi criado com controller e que contém os dados das mesas
foreach ($lista_de_mesas as $mesa) {
    $id = $mesa["id"];
    $lugares = $mesa["lugares"];
    $tipo = $mesa["tipo"];
    $editar = "<a href='[[base-url]]/mesa-adm/editar/$id' class='btn btn-primary btn-sm me-1'><i class='bi bi-pencil-square'></i> Editar</a>";
    $excluir = "<a href='[[base-url]]/mesa-adm/excluir/$id' onclick=\"return confirm('Confirma a exclusão da mesa $id')\" class='btn btn-danger btn-sm'><i class='bi bi-trash'></i> Excluir</a>";

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


    #Cria os cards HTML com os dados das mesas
$lista.="
<div class='col-md-3 mb-3'>
    <div class='card shadow'>
        <div class='card-header d-flex justify-content-between'>
           <span class='fs-4' my-0>Mesa: </span>
          <span class='text-end my-0'>#$id </span>
     </div>
     <div class='card-body d-flex justify-content-between py-1'>
        <span><strong>Formato:</strong> $tipo</span>
        <span><strong>Lugares:</strong> $lugares</span>
    </div>
    <div class='card-footer d-flex justify-content-end'>
      $editar
      $excluir
    </div>
    </div>
    </div>
    ";
            // <a href='[[base-url]]/mesa-adm/editar/$id' class='btn btn-primary btn-sm me-1'><i class='bi bi-pencil-square'></i> Editar</a>
            // <a href='[[base-url]]/mesa-adm/excluir/$id' onclick=\"return confirm('Confirma a exclusão da mesa $id')\" class='btn btn-danger btn-sm'><i class='bi bi-trash'></i> Excluir</a>
}

# Faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/mesaList.html");

# Substituir a tag [[header]] pelo conteudo da variavel $header. O mesmo acontece com as demais variaveis.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html; 