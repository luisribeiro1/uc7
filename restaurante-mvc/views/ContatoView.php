<?php

$lista = "";

foreach($lista_de_enderecos as $endereco){
    $rua = $endereco['rua'];
    $bairro = $endereco['bairro'];
    $cidade = $endereco['cidade'];
    $horario = $endereco['horario'];
    $contatos = $endereco['contatos'];
 

$lista_de_contatos="";
$contatos = "facebook, whatsapp, tiktok, youtube, linkedin";
foreach($endereco["contatos"] as $contatos){
    if(strpos($contatos, "whatsapp")){
        $lista_de_contatos.= "<a href='$contatos' class='btn btn-sm btn-warning my-1 me-1'>WhatsApp</a>";
    }elseif(strpos($contatos, "facebook")){
        $lista_de_contatos.= "<a href='$contatos' class='btn btn-sm btn-warning my-1 me-1'>Facebook</a>";
    }elseif(strpos($contatos, "tiktok")){
        $lista_de_contatos.= "<a href='$contatos' class='btn btn-sm btn-warning my-1 me-1'>Tiktok</a>";
    }elseif(strpos($contatos, "youtube")){
        $lista_de_contatos.= "<a href='$contatos' class='btn btn-sm btn-warning my-1 me-1'>Youtube</a>";
    }elseif(strpos($contatos, "linkedin")){
        $lista_de_contatos.= "<a href='$contatos' class='btn btn-sm btn-warning my-1 me-1'>Linkedin</a>";
    }

    
    $lista_de_contatos.="<span class='btn btn-sm btn-warning my-1 me-1'>$contatos</span> ";
}


$lista .="
<div class='card mb-4'>
  <h5 class='card-header'>$rua-$bairro-$cidade</h5>
  <div class='card-body'>
    <p class='card-title'>$horario</p>
    $lista_de_contatos
  </div>
</div>
";
}

$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");


$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[titulo]]", "Cardápio De Pizzas", $html);

echo $html;


