<?php

$lista = "";
foreach ($lista_de_mesas as $mesa) {
    $id = $mesa["id"];
    $lugares = $mesa["lugares"];
    $tipo = $mesa["tipo"];

    $lista.="
    <div class='col-md-3 mb-3'>
        <div class='card'>
            <div class='card-body'>
                <span class='fs-3'><strong>Mesa: $id</strong></span><br>
                $tipo com $lugares lugares
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
$html = file_get_contents("views/templates/html/mesaList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);

echo $html; 