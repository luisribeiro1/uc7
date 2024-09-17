<?php

$lista = "";
foreach ($lista_de_mesas as $mesa) {
    $id = $mesa["id"];
    $lugares = $mesa["lugares"];
    $tipo = $mesa["tipo"];

    $lista.="
    <div class='col-md-3 mb-4'>
         <div class='card'>
             <div class='card-body'>
               <strong>Mesa: $id<br></strong>
                $tipo com $lugares lugares        
            </div>
            <div class='card-footer'>
                <a class='text-primary text-decoration-none me-4' href='#'><i class='bi bi-pencil-square'></i> Editar</a> 
                <a class='text-danger text-decoration-none' href='#'><i class='bi bi-trash'></i> Excluir</a> 
            </div>

        </div>

    </div>    
    ";

}

$header = file_get_contents("views/template/html/header.html");
$footer = file_get_contents("views/template/html/footer.html");
$html = file_get_contents("views/template/html/mesalist.html");


$html = str_replace("[[header]]",$header,$html);
$html = str_replace("[[footer]]",$footer,$html);
$html = str_replace("[[lista]]",$lista,$html);

echo $html;