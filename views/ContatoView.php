<?php

# Variável para incluir os códigos HTML da página 
$lista = "";


# iterar sobre o array $lista_de_pizzas que contém a lista das pizzas 
foreach($lista_de_enderecos as $endereco){
    $rua = $endereco['rua'];
    $bairro = $endereco['bairro'];
    $cidade = $endereco['cidade'];
    $horario = $endereco['horario'];
    $unidade = $endereco['unidade'];

    # obter os itens dos clientes que estão em um array 
    $lista_de_redes = "";

    $redes = ["facebook, whatsapp, tiktok, youtube, linkedin"];
    
    foreach($endereco["contatos"] as $contato){
        // if(strpos($contato, "whatsapp")){
        //     $lista_de_redes.= "<a href='$contato' class='btn btn-sm btn-warning my-1 me-1'>WhatsApp</a>";
        // }elseif(strpos($contato, "facebook")){
        //     $lista_de_redes.= "<a href='$contato' class='btn btn-sm btn-warning my-1 me-1'>FaceBook</a>";
        // }elseif(strpos($contato, "linkedin")){
        //     $lista_de_redes.= "<a href='$contato' class='btn btn-sm btn-warning my-1 me-1'>LinkeDin</a>";
        // }elseif(strpos($contato, "youtube")){
        //     $lista_de_redes.= "<a href='$contato' class='btn btn-sm btn-warning my-1 me-1'>YouTube</a>";
        // }elseif(strpos($contato, "tiktok")){
        //     $lista_de_redes.= "<a href='$contato' class='btn btn-sm btn-warning my-1 me-1'>TikTok</a>";
        // }
        foreach($redes as $rede)
            if(strpos($contato, $rede)){   
                $lista_de_redes.= "<a href='$contato' class='btn btn-sm btn-warning my-1 me-1'>$rede</a>";
            }

        }

    # criar a estrutura HTML no padrão bootstrap
    $lista.="
    <div class='col-md-12 mt-4'>
        <div class='card shadow'>
            <div class='card-body'>
                <h5 class='card-title'>$rua - $bairro - $cidade</h5>
                    <strong class='card-text'>$horario</strong><br>
                    $lista_de_redes
            </div>
        </div>
    </div>
    ";
}


$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer_site.html");
$html = file_get_contents("views/templates/html/modeloSiteList.html");

# substituir a tag [[header]] pelo conteúdo da variável $header
# o mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[titulo]]", "Contatos", $html);

echo $html;
