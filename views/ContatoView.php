<?php

$lista = "";

if(isset($lista_de_enderecos)){

    foreach($lista_de_enderecos as $endereco){

        $rua = $endereco['rua'];
        $bairro = $endereco['bairro'];
        $cidade = $endereco['cidade'];
        $horario = $endereco['horario'];
        $unidade = $endereco['unidade'];


        $lista_de_redes = "";
        
        
        $redes = ["facebook" => "<i class='bi bi-facebook me-1'> </i>Facebook</a>",
                        "whatsapp" => "<i class='bi bi-whatsapp me-1'> </i> WhatsApp</a>",
                        "tiktok" => "<i class='bi bi-tiktok me-1'> </i> tiktok</a>",
                        "youtube" => "<i class='bi bi-youtube me-1'> </i> youtube</a>",
                        "linkedin" => "<i class='bi bi-linkedin me-1'> </i> Linkedin</a>",
                        "instagram" => "<i class='bi bi-instagram me-1'> </i> Instagram</a>"];



        $cores = ["facebook" => "btn-primary",
        "whatsapp" => "btn-success",
        "tiktok" => "btn-dark",
        "youtube" => "btn-danger",
        "linkedin" => "btn-primary",
        "instagram" => "btn-secondary"];
  
    foreach($endereco["contatos"] as $contato){
        foreach($redes as $rede => $valor){
            if(strpos($contato, $rede)){
                $cor = $cores[$rede];
                $lista_de_redes.= " <a href='$contato' class='btn btn-sm $cor my-1 me-1'> $valor";
            }
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
                $lista_de_redes
                </div>
            </div>
        </div>
        

            ";
    }
} else{
    $lista = "<div class='alert bg-danger text-white'>$erro</div>";
}


$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/contato.html");

$html = str_replace("[[header]]",$header,$html);
$html = str_replace("[[footer]]",$footer,$html);
$html = str_replace("[[titulo]]","CONTATOS",$html);
$html = str_replace("[[conteudo]]",$lista,$html);
$html = str_replace("[[base-url]]",$baseUrl,$html);

echo $html;