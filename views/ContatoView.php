<?php

# Variavel para incluir os códigos HTML da página
$lista = "";

if(isset($lista_de_contatos)){

    
    # Iterar sobre o array $lista_de_pizzas que contém a lista das pizzas
    foreach($lista_de_contatos as $contato){
        $rua = $contato["rua"];
        $bairro = $contato["bairro"];
        $cidade = $contato["cidade"];
        $horario = $contato["horario"];
        $contatos = $contato["contatos"];
        $unidade = $contato["unidade"];
        
        # Obter os dados do contato que estão dentro do array
        $lista_de_contatos = "";
        $link = [
            "facebook" => "<i class='bi bi-facebook'></i> Facebook",
            'instagram' => "<i class='bi bi-instagram'></i> Instagram",
            'youtube' =>" <i class='bi bi-youtube'></i> YouTube",
            'tiktok' => " <i class='bi bi-tiktok'></i> TikTok",
            'linkedin' => "<i class='bi bi-linkedin'></i> Linkedin",
            'whatsapp' => " <i class='bi bi-whatsapp'></i> WhatsApp"
        ];
        
        $cores = [
            "facebook" => 'btn btn-primary',
            'instagram' =>'btn btn-danger',
            'youtube' => 'btn btn-danger',
            'tiktok' => 'btn btn-dark',
            'linkedin' => 'btn btn-primary',
            'whatsapp' => 'btn btn-success'
        ];
        
        # Iterar spbre a resposta da API me trazendo o array
        foreach($contatos as $contato){
            # Iterar sobre o array de plataformas
            foreach($link as $socialmedia => $valor){
                
                if(strpos($contato, $socialmedia)) {        
                    
                    $cor = $cores[$socialmedia];
                    
                    $lista_de_contatos.= "
                    
                    <a href='$contato' target='_blank' class='btn btn-sm btn-$cor'>
                    $valor
                    </a>
                    ";
                }
            }
            
        }
        
        # Criar a estrutura HTML
        $lista.= "
        <div class='col-md-12'>
        <div class='card mb-4'>
        <div>
        <h5 class='card-header bg-primary-subtle text-secondary'><strong>$rua - $bairro - $cidade </strong> </h5>
        </div>
        <div class='card shadow'>
        <p class='mt-4 mx-2 text-secondary-emphasis'>$horario</p>
        <div class='container col-md-7 mb-4 mx-2'>
        $lista_de_contatos
        </div>
        
        </div>
        </div>
        ";
        
    }
} else{
    $lista = "<div class='alert bg-danger text-white'>$erro</div>";
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