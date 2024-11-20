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
    $contato = $contato["contatos"];

    # Obter os itens dos ingredientes que estão em um array
    $lista_de_contatos = "";
    foreach($contato["contatos"] as $contato){
        $lista_de_contatos .= "<span class='btn btn-sm btn-warning my-1 me-1'>$contato</span>";
    }

    # Criar a estrutura HTML no padrão Bootstrap
    $lista.= "
        <div class='col-md-12 mb-4'>
            <div class='card'>
                <div>
                <h5 class='card-header bg-primary text-white'>$rua - $bairro - $cidade</h5>
                </div>
                    <div class='card shadow '>
                    <p class='mt-3 mx-3'>$horario </p><br>


                    
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