<?php

# Variavel para incluir os códigos HTML da página
$lista = "";

foreach($lista_de_pizzas as $pizza){
    $nome = $pizza["nome"];
    $preco = number_format($pizza["preco"],2,",",",");
    $imagem = $pizza["imagem"];

    $lista_de_ingredientes = "";
    foreach($pizza["ingredientes"] as $ingrediente){
        $lista_de_ingredientes .= "<span class='btn btn-sm btn-warning my-1 me-1'>$ingrediente</span>"; 
    }
    
    $lista.="
        <div class='col-md-4 mb-4'>
            <div class='card shadow'>
                <img src='$imagem' class='card-img-top' alt='$nome'>
                <div class='card-body'>
            Nome: <strong>$nome</strong> <br>
            Preço: <strong>$preco</strong> <br>
            $lista_de_ingredientes <br>

            <p class='mt-3'>
                <a href='https://api.whatsapp.com/send?phone=19988100801&text=$nome' target'_blank' class='btn btn-sm btn-success'>
                <i class='bi bi-whatsapp'></i>   Pedir pelo WhatsApp
                </a>
            </p>
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
$html = str_replace("[[titulo]]", "CARDÁPIO DE PIZZAS", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;