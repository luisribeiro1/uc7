<?php

$lista = "";

# Interar sobre o array que foi criado com controller e que contém os dados das mesas
foreach ($lista_de_mesas as $mesa) {
    $id = $mesa["id"];
    $lugares = $mesa["lugares"];
    $tipo = $mesa["tipo"];

    #Cria os cards HTML com os dados das mesas
    $lista.="
    <div class='col-md-3 mb-3'>
        <div class='card'>
            <div class='card-body'>
                <span class='fs-4'>Mesa: $id</span><br>
                $tipo com $lugares lugares
            </div>
            <div class='card-footer d-flex justify-content-end'>
                <a href='#' class='btn btn-primary btn-sm me-1'><i class='bi bi-pencil-square'></i> Editar</a>
                <a href='[[base-url]]/mesa-adm/excluir/$id' onclick=\"return confirm('Confirma a exclusão da mesa $id')\" class='btn btn-danger btn-sm'><i class='bi bi-trash'></i> Excluir</a>
            </div>
        </div>
    </div>
    ";
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