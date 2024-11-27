<?php

// echo "<pre>";
// var_dump($lista_de_contatos);
// echo "</pre>"

# Variável para incluir os códigos HTML da página
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
    
    # Iterar sobre o array $lista_de_pizzas que contém a lista das pizzas
    foreach($lista_de_contatos as $contato){
        $rua = $contato["rua"];
        $bairro = $contato["bairro"];
        $cidade = $contato["cidade"];
        $horario = $contato["horario"];
        $unidade = $contato["unidade"];
    
        $rede_sociais = "";
    
        # Obter os itens dos ingredientes que estão em um array
        $lista_de_ingredientes = "";
        foreach($contato["contatos"] as $rede){
    
            foreach($cores as $chave => $valor){
                if (strpos($rede,$chave)){
    
                    $botao = "";
                switch (true){
                    case strpos($rede,"facebook")!==false:
                        $botao .= "<a href='$rede' class='btn btn-sm $valor'><i class='bi bi-facebook'></i> Facebook</a>";
                        break;
                    case strpos($rede,"instagram")!==false:
                        $botao .= "<a href='$rede' class='btn btn-sm $valor'><i class='bi bi-instagram'></i> Instagram</a>";
                        break;
                    case strpos($rede,"youtube")!==false:
                        $botao .= "<a href='$rede' class='btn btn-sm $valor'><i class='bi bi-youtube'></i> YouTube</a>";
                        break;
                    case strpos($rede,"tiktok")!==false:
                        $botao .= "<a href='$rede' class='btn btn-sm $valor'><i class='bi bi-tiktok'></i> TikTok</a>";
                        break;
                    case strpos($rede,"linkedin")!==false:
                        $botao .= "<a href='$rede' class='btn btn-sm $valor'><i class='bi bi-linkedin'></i> Linkedin</a>";
                        break;
                    case strpos($rede,"whatsapp")!==false:
                        $botao .= "<a href='$rede' class='btn btn-sm $valor'><i class='bi bi-whatsapp'></i> WhatsApp</a>";
                        break;
                    default:
                        $botao = "<a href='$rede' class='btn btn-sm $valor d-none'> </a>";
                        break;
                };
    
                $rede_sociais .= " $botao";
    
                }
        }
    }
    
        # Criar a estrutura HTML no padrão Bootstrap
        $lista.= "
            <div class='col-md-12 mb-12 pb-4'>
                <div class='card shadow'>
                    <div class='card-header bg-secondary'>
                        <h5 class='text-white'><i class='bi bi-geo-alt-fill'></i> $rua - $bairro - $cidade</h5>
                    </div>
                    <div class='card-body'>
                        <i class='bi bi-clock-history'></i> $horario
                        <p class='mt-3'>
                            $rede_sociais
                        </p>
    
                    </div>
                </div>
            </div>
        ";
    }
}else{
    $lista = "<div class='alert alert-danger text-center px-0 fs-4'>
            <h1><i class='bi bi-exclamation-triangle-fill text-danger'></i></h1>
            <p class='fw-bold'>$erro</p>
            <hr>
            <a href='javascript:history.back();' class='btn btn-danger'><i class='bi bi-arrow-left'></i> Voltar</a>
        </div>";
}

$js = "<script src='#'></script>";
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "<i class='bi bi-person-lines-fill text-info'></i> <span class='text-primary'>|</span> CONTATOS:", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[js]]", $js, $html);

echo $html;
