<?php

# Variavel para incluir os códigos HTML da página
$lista = "";    

foreach($contatos as $enderecos){
    $rua = $enderecos["rua"];
    $bairro = $enderecos["bairro"];
    $cidade = $enderecos["cidade"];
    $horario = $enderecos["horario"];
    $contatos = $enderecos["contatos"];
    $unidade = $enderecos["unidade"];

    $lista_de_contatos = "";
    $link = [
    'facebook' => "<i class='bi bi-facebook'></i> Facebook",
    'instagram' => "<i class='bi bi-instagram'></i> Instagram",
    'youtube' => "<i class='bi bi-youtube'></i> YouTube",
    'tiktok' => "<i class='bi bi-tiktok'></i> TikTok",
    'linkedin' => "<i class='bi bi-linkedin'></i> Linkedin",
    'whatsapp' => "<i class='bi bi-whatsapp'></i> WhatsApp",
        ];

    $button = ['facebook' => "btn btn-primary",
    'instagram' => "btn btn-danger",
    'tiktok' => "btn btn-dark",
    'whatsapp' => "btn btn-success",
    'linkedin' => "btn btn-info",
    'youtube' => "btn btn-danger",
];
    
    foreach($contatos as $contato){
        foreach($link as $social => $valor){
            
            if(strpos($contato, $social)){
                $cor = $button[$social];
                $lista_de_contatos.="
                
                    <a href='$contato' target='_blank' class='btn $cor'>
                    $valor
                    </a>
                    ";
            }
        }
    }

    $lista.="
        <div class='col-md-12 mb-4'>
            <div class='card'>
            <div>
            <h5 class='card-header bg-primary text-white'>$rua - $bairro - $cidade</h5>
            </div>
            <div class='card shadow'>
                <p class='mt-3 mx-3'><i class='bi bi-clock'></i> $horario</p> <br>
                <div class='container col-md-7 mb-4 mx-2'>$lista_de_contatos</div>
                
        </div>
    </div>
    </div>
</div>
";
    
}

# Faz a leitura dos arquivos de templates e armazena nas variáveis.
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "CONTATOS", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;