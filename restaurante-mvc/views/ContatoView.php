<?php



# Variável para incluir os códigos HTML da página 
$lista = "";

if (isset($lista_de_enderecos)){
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
    $redes = [
        "facebook" => "<i class='bi bi-facebook me-1'></i>FacebooK</a>",
        "whatsapp" => "<i class='bi bi-whatsapp me-1'></i>WhatsApp</a>",
        "instagram" => "<i class='bi bi-instagram me-1'></i>Instagram</a>",
        "tiktok" => "<i class='bi bi-tiktok me-1'></i>TikTok</a>",
        "youtube" => "<i class='bi bi-youtube me-1'></i>YouTube</a>",
        "linkedin" => "<i class='bi bi-linkedin me-1'></i>Linkedin</a>",
       

    ];

    $cores = [
        "facebook" => "btn-primary",
        "whatsapp" => "btn-success",
        "linkedin" => "btn-info",
        "youtube" => "btn-danger",
        "tiktok" => "btn-dark",
        "instagram" => "btn-warning",

        
    ];


    foreach($endereco["contatos"] as $contato){
        foreach($redes as $rede => $valor){
            if(strpos($contato, $rede)){ 
                $cor = $cores[$rede];
                $lista_de_redes.= "<a href='$contato' class='btn btn-sm $cor my-1 me-1'>$valor</a>";
            }
        }
        }

      
      
    # criar a estrutura HTML no padrão bootstrap
    $lista.="
    <div class='col-md-12 mt-4'>
        <div class='card shadow'>
            <div class='card-body-fluid'>
                <h5 class='card-header bg-primary text-white '>$rua - $bairro - $cidade</h5>
                    <strong class='card-text'>$horario</strong><br>
                    $lista_de_redes
            </div>
        </div>
    </div>
    ";
}
} else {
    $lista = "<div class='alert bg-danger text-white'>$erro</div>";
}






$header = file_get_contents("views/html/header_site.html");
$footer = file_get_contents("views/html/footer_site.html");
$html = file_get_contents("views/html/modeloSite.html");


$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[titulo]]", "Contatos", $html);

echo $html;