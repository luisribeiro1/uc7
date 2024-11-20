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

    
    $lista.="
        <div class='col-md-12 mb-4'>

            <div class='card shadow'>
            <span class='d-block p-2 bg-primary text-light text-bold'>$rua-$bairro-$cidade</span>
                <div class='card-body'>
            $horario

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