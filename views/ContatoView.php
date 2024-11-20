<?php

$lista = "";

foreach($lista_de_contatos as $contato){

    $rua = $contato['rua'];
    $bairro = $contato['bairro'];
    $cidade = $contato['cidade'];
    $horario = $contato['horario'];


    $lista_de_contatos = "";
    
   $redeSocial = "facebook";
    foreach($contato["contatos"] as $rede){
        if(strpos($contato, == $redeSocial)){
            $lista_de_contatos.="<a href='https://www.facebook.com/senacsaopaulo' class='btn btn-dark' >Facebook </a>";
        }

    }

   


    $lista.="
<div class='col-12 mb-3'>
    <div class='card shadow '>
        <div class='card-header  bg-primary text-white '>
               <h5> $rua - $bairro - $cidade </h5>
        </div>
        <div class='card-body'>
            <h6 class='card-title'>$horario</h6>
            <a href='#' class='btn btn-dark'>$lista_de_contatos</a>
        </div>
    </div>
</div>
   

    ";
}


$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/contato.html");

$html = str_replace("[[header]]",$header,$html);
$html = str_replace("[[footer]]",$footer,$html);
$html = str_replace("[[titulo]]","CONTATOS",$html);
$html = str_replace("[[conteudo]]",$lista,$html);

echo $html;