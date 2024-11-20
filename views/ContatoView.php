<?php

$lista = "";

foreach($lista_de_contatos as $contato) {
    $rua = $contato["rua"];
    $bairro = $contato["bairro"];
    $cidade = $contato["cidade"];
    $horario = $contato["horario"];
    $unidade = $contato["unidade"];

    # Obter os itens dos ingredientes que estão em um array.
    $lista_de_sociais = "";
    foreach($contato["contatos"] as $social) {
        $lista_de_sociais.="<span class='btn btn-sm btn-dark'>$social</span>";
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
                        <a href='$social' target='_blank' class='btn btn-sm btn-dark'>

                        </a>
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

// echo "<pre>";
// var_dump($lista_de_contatos);
// echo "</pre>";