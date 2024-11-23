<?php

// echo "<pre>";
// var_dump($lista_de_pizzas);
// echo "</pre>";

# Variável para incluir os códigod HTML da página
$lista = "";

# Iterar sobre o array $lista_de_pizzas que contém a 
foreach($lista_de_contatos as $contato){
    $rua = $contato["rua"];
    $bairro = $contato["bairro"];
    $cidade = $contato["cidade"];
    $horario = $contato["horario"];
    $contatos = $contato["contatos"];

    # Obter os itens dos ingredientes que estão em um array
    $lista_de_contatos = "";
    $link = ['facebook' => "<i class='bi bi-facebook'></i> Facebook", 
             'instagram' => "<i class='bi bi-instagram'></i> Instagram",
             'tiktok' => "<i class='bi bi-tiktok'></i> TikTok",
             'whatsapp' => "<i class='bi bi-whatsapp'></i> Whatsapp",
             'linkedin' => "<i class='bi bi-linkedin'></i> Linkedin",
             'youtube' => "<i class='bi bi-youtube'></i> Youtube"
            ];

    $button = ['facebook' => "btn btn-primary", 
             'instagram' => "btn btn-danger",
             'tiktok' => "btn btn-dark",
             'whatsapp' => "btn btn-success",
             'linkedin' => "btn btn-info",
             'youtube' => "btn btn-danger"
            ];        
            
            
            
        foreach($contatos as $contato){
            foreach($link as $social => $valor){
                
                if (strpos($contato, $social)){

                    $cor = $button[$social];
                    $lista_de_contatos.="
                        <a href='$contato' target='_blank' class='btn $cor'>
                            $valor
                        </a>    
                    "; 
             }
         }
    }

    # Criar a estrutura HTML no padrão Bootstrap
    $lista.= "
        <div class='col-md-12 mb-4'>
            <div class='card'>
                <div>
                <h5 class='card-header bg-primary text-white'>$rua - $bairro - $cidade</h5>
                </div>
                    <div class='card shadow '>
                    <p class='mt-3 mx-3'><i class='bi bi-clock'></i> $horario </p><br>
                    <div class='container col-md-7 mb-4 mx-2'>
                    $lista_de_contatos
                    </div>

                    </div>
                </div>
            </div>
        </div>
    ";
}

# Faz a leitura dos arquivos de templates e armazena nas variaveis
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece
# com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "CONTATOS", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;