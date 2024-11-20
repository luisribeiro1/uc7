<?php

# Variável para incluir os códigos HTML da página.
$lista = "";

# Iterar sobre o array $lista_de_pizzas que contém a lista das pizzas.
foreach($lista_de_pizzas as $pizza) {
    $nome = $pizza["nome"];
    $preco = number_format($pizza["preco"],2,",",".");
    $imagem = $pizza["imagem"];

    # Obter os itens dos ingredientes que estão em um array.
    $lista_de_ingredientes = "";
    foreach($pizza["ingredientes"] as $ingrediente) {
        $lista_de_ingredientes.="<span class='btn btn-sm btn-warning my-1 me-1'>$ingrediente</span>";
    }

    # Criar a estrutura HTML. 
    $lista.="
        <div class='col-md-4 mb-3'>
            <div class='card shadow'>
                <img src='$imagem' class='card-img-top' alt='$nome'>
                <div class='card-body'>
                    Nome: <strong>$nome</strong> <br>
                    Preço: <strong>R$ $preco</strong> <br>
                    Ingredientes: <strong>$lista_de_ingredientes</strong>
                    <p class='mt-3'>
                        <a href='https://api.whatsapp.com/send?phone=19971266911&text=$nome' target='_blank' class='btn btn-sm btn-success'>
                           <i class='bi bi-whatsapp'></i> Pedir pelo WhatsApp
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
$html = str_replace("[[titulo]]", "Cardápio de Pizzas", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;

// echo "<pre>";
// var_dump($lista_de_pizzas);
// echo "</pre>";