<?php

$lista = "";
$cor = "";

# Estrutura de dados.
$contacts = [
    "facebook" => "<i class='bi bi-facebook'> Facebook</i>",
    "instagram" => "<i class='bi bi-instagram'> Instagram</i>",
    "tiktok" => "<i class='bi bi-tiktok'> TikTok</i>",
    "linkedin" => "<i class='bi bi-linkedin'> LinkedIn</i>",
    "whatsapp" => "<i class='bi bi-whatsapp'> WhatsApp</i>",
    "youtube" => "<i class='bi bi-youtube'>  YouTube</i>"
];

$cores = [
    "facebook" => "btn btn-primary",
    "instagram" => "btn btn-danger'",
    "tiktok" => "btn btn-dark",
    "linkedin" => "btn btn-info",
    "whatsapp" => "btn btn-success",
    "youtube" => "btn btn-danger"
];

foreach($lista_de_contatos as $contato) {
    $rua = $contato["rua"];
    $bairro = $contato["bairro"];
    $cidade = $contato["cidade"];
    $horario = $contato["horario"];
    $unidade = $contato["unidade"];
    $botao_social = "";

    # Iterar sobre o array de URL da API.
    foreach ($contato["contatos"] as $contatos) {
        # Iterar sobre um array de plataformas.
        foreach ($contacts as $platform => $link) {
            if(strpos($contatos, $platform)) {
                $cor = $cores[$platform];
                $botao_social.= "<a href='$contatos' target='_blank' class='$cor m-1'>$link</a>";
            }
        }
    }

    # Criar a estrutura HTML. 
    $lista.="
        <div class='col-md-12 mb-3'>
            <div class='card shadow'>
                <div class='card-header'>
                    <strong>$rua - $bairro - $cidade</strong>
                </div>
                <div class='card-body'>
                    $horario <br>
                    <p class='mt-3'>
                        $botao_social
                    </p>
                </div>
            </div>
        </div>
    ";
}

$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer_site.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "Contatos", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;

// <a href='$link' target='_blank' class='contact-button'>$platform</a>
// echo "<pre>";
// var_dump($lista_de_contatos);
// echo "</pre>";