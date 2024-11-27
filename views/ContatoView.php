<?php

$lista = "";

$cores = [
    'facebook' => 'btn-primary',
    'instagram' => 'btn-danger',
    'youtube' => 'btn-danger',
    'tiktok' => 'btn-dark',
    'linkedin' => 'btn-info',
    'whatsapp' => 'btn-success'
];

if (isset($lista_de_contatos)) {



    foreach ($lista_de_contatos as $contato) {
        $rua = $contato["rua"];
        $bairro = $contato["bairro"];
        $cidade = $contato["cidade"];
        $horario = $contato["horario"];
        $unidade = $contato["unidade"];
        $botao = "";

        $rede_sociais = "";
        foreach ($contato["contatos"] as $rede) {

            foreach ($cores as $chave => $valor) {
                if (strpos($rede, $chave)) {

                    switch (true) {
                        case strpos($rede, 'facebook') !== false:
                            $botao .= "<a href='$rede' class='btn btn-sm $valor me-2'><i class='bi bi-facebook'></i> Facebook</a>";
                            break;
                        case strpos($rede, 'instagram') !== false:
                            $botao .= "<a href='$rede' class='btn btn-sm btn-secondary me-2 $valor'><i class='bi bi-instagram'></i> Instagram</a>";
                            break;
                        case strpos($rede, 'youtube') !== false:
                            $botao .= "<a href='$rede' class='btn btn-sm btn-secondary me-2 $valor'><i class='bi bi-youtube'></i> Youtube</a>";
                            break;
                        case strpos($rede, 'tiktok') !== false:
                            $botao .= "<a href='$rede' class='btn btn-sm btn-secondary me-2 $valor'><i class='bi bi-tiktok'></i> TikTok</a>";
                            break;
                        case strpos($rede, 'linkedin') !== false:
                            $botao .= "<a href='$rede' class='btn btn-sm btn-secondary me-2 $valor'><i class='bi bi-linkedin'></i> Linkedin</a>";
                            break;
                        case strpos($rede, 'whatsapp') !== false:
                            $botao .= "<a href='$rede'><span class='btn btn-sm btn-secondary me-2 $valor'><i class='bi bi-whatsapp'></i> Whatsapp</span></a>";
                            break;
                        default:
                            $botao .= "";
                            break;
                    }
                    ;

                }
            }
        }
        $rede_sociais .= " $botao";
        $lista .= "
        <div class='col-md-12 mb-4'>
            <div class='card shadow'>
                <div class='card-header bg-secondary''>
                    <h5 class='text-white'><i class=' bi bi-geo-alt-fill'></i> $rua - $bairro - $cidade</h5>
                </div>
                <div class='card-body'>
                    <p><i class='bi bi-clock-history'></i> $horario</p>
                    $rede_sociais
                </div>
            </div>
        </div>
    ";

    }
} else {
    $lista = "<div class='alert bg-danger text-white text-center'> 
                <h1><i class='bi bi-exclamation-triangle-fill'></i></h1>
                <p class='fw-bold'>$erro</p>
            </div>";
}


$js = "<script src='$baseUrl/views/templates/js/avaliacoes.js'></script>";
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "<i class='bi bi-people-fill'></i> Contatos", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[js]]", $js, $html);

echo $html;
