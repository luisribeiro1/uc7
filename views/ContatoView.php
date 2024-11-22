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
    
    foreach($contatos as $contato){
        foreach($link as $social => $valor){
            
            if(strpos($contato, $social)){
                $lista_de_contatos.="
                
                    <a href='$contato' target='_blank' class='btn btn-sm btn-secondary'>
                    $valor
                    </a>
                    ";
            }
        }
    }

    $lista.="
        <div class='col-md-12 mb-4'>

            <div class='card shadow'>
            <span class='d-block p-2 bg-primary text-light text-bold'>$rua-$bairro-$cidade</span>
                <div class='card-body'>
                <p class='mt-4 mx-2 text-secondary-emphasis'>$horario</p> 
                <div class='container col-md-7 mb-4 mx-2'>$lista_de_contatos</div>
                
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