<?php

# Variavel para incluir os códigos HTML da página
$lista = "";

# Iterar sobre o array $lista_de_pizzas que contém a lista das pizzas
foreach($lista_de_contatos as $contato){
    $rua = $contato["rua"];
    $bairro = $contato["bairro"];
    $cidade = $contato["cidade"];
    $horario = $contato["horario"];
    $contatos = $contato["contatos"];

     # Obter os dados do contato que estão dentro do array
     $lista_de_contatos = "";
    $findme   = '';
   $contato = strpos($contatos, $findme);
    foreach($contato["contatos"] as $contato){
        
        if($contato == 'facebook'){        
        $lista_de_contatos.= "
         <p class='mt-2 mx-2'>
                    <a href='$contatos' target='_blank' class='btn btn-sm btn-secondary'>
                        $contato
                    </a>
                </p>";
     }
    }

    # Criar a estrutura HTML
    $lista.= "
    <div class='col-md-12'>
        <div class='card mb-4'>
        <div>
            <h5 class='card-header bg-primary text-white'><strong>$rua - $bairro - $cidade </strong> </h5>
        </div>
        <div class='card shadow'>
                <p class='mt-4 mx-2 text-secondary-emphasis fw-bold'>$horario</p>

                $contato


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