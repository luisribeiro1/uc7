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

    # estrutura de dados
    $redes = ["facebook" => "<i class='bi bi-facebook me-1'></i>Facebook</a>",
        "whatsapp" => "<i class='bi bi-whatsapp me-1'></i>WhatsApp</a>",
         "tiktok" => "<i class='bi bi-tiktok me-1'></i>TikTok</a>",
          "youtube" => "<i class='bi bi-youtube me-1'></i>YouTube</a>",
           "linkedin" => "<i class='bi bi-linkedin me-1'></i>Linkedin</a>", 
           "instagram" => "<i class='bi bi-instagram me-1'></i>Instagram</a>"];

    $cores = ["facebook" => "btn-info",
    "whatsapp" => "btn-success",
    "tiktok" =>"btn-dark",
    "youtube" => "btn-danger",
    "linkedin" =>"btn-primary",
    "instagram" => "btn-secondary"];
    
    foreach($endereco["contatos"] as $contato){
        foreach($redes as $rede => $valor){    
            if(strpos($contato, $rede)){
                $cor = $cores[$rede];
                $lista_de_redes.= "<a href='$contato' class='btn btn-sm $cor my-1 me-1'> $valor";
                }
        }
    }
    
    # criar a estrutura HTML no padrão bootstrap
    $lista.="
    <div class='col-md-12 mt-4'>
        <div class='card shadow'>
        <div class='card-header py-3'><h5 class='card-title'>$rua - $bairro - $cidade</h5></div>
            <div class='card-body'>
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