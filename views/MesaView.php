<?php

$lista = "";
foreach ($mesas as $mesa) {
    $id = $mesa['id'];
    $lugares = $mesa['lugares'];
    $tipo = $mesa['tipo'];

    $ver_excluir = "";
    $ver_editar = "";

    if(isset($_SESSION["nivelAcesso"])){
        if($_SESSION["nivelAcesso"] == 2){
            $ver_excluir = "d-none";
        }
        if($_SESSION["nivelAcesso"] == 3){
            $ver_excluir = "d-none";
            $ver_editar = "d-none";
        }
    }else{
        // fazer a mesma validação pelo cookie
    }

    $lista .= "
    <div class='col-md-3 mb-4'>
        <div class='card shadow'>
            <div class='card-body'>
                Mesa: <strong>$id</strong>
                com <strong>$lugares</strong> lugares<br>
                tipo: <strong>$tipo</strong>
            </div>
            <div class='card-footer'>
                <a class='text-primary $ver_editar text-decoration-none' href='mesa-adm/editar/$id'><i class='bi bi-pencil-square'></i> Editar</a> 
                <a 
                    class='btnExcluir $ver_excluir text-danger text-decoration-none ms-3' 
                    href='mesa-adm/excluir/$id'
                    onclick=\"return confirm('Confirma a exclusão desta mesa?')\"
                    >
                    <i class='bi bi-trash'></i> Excluir</a>
            </div>
        </div>
    </div>";
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/mesaList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;