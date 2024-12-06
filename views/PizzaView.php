<?php 

//echo "<prev>";
//var_dump($lista_de_pizzas);
//echo "</prev>";

# variavel para incluir os codigos HTML da página
$lista = "";

if (isset($lista_de_pizzas)){

    # Interar sobre o array $lista_de_pizzas que contem a lista das pizzas
    foreach($lista_de_pizzas as $pizza){
    $nome = $pizza["nome"];
    $preco = number_format($pizza["preco"],2,",",",");
    $imagem= $pizza["imagem"];

    # obter os itens dos ingredientes que estão em um array
    $lista_de_ingredientes = "";
    foreach($pizza["ingredientes"] as $ingredientes){
        $lista_de_ingredientes.= "<span class= 'btn btn-sm btn-warning my-1 me-1'>$ingredientes</span>";
    }  

    # Criar a estrutura HTML
    $lista.= "
    <div class='col-md-4 mb-4'>
        <div class='card shadow'>
            <img src='$imagem' class='card-img-top'alt='$nome'>
            <div class='card-boby'>
                    nome: <strong>$nome</strong> <br>       
                    preco: <strong>R$$preco</strong> <br> 
                    $lista_de_ingredientes <br>

                    <p class='mt-3'>
                        <a href='https://api.whatsapp.com/send?phone=19988100801&text=$nome' target='_blank' class='btn btn-sm btn-success'>
                        <i class= 'bi bi-whatsapp me-1'></i> Pedir pelo WatsApp
                        </a>
                    </p>

            </div>        
        </div> 
    </div>
    ";}
}else{
    $lista = "<div class='alert bg-danger text -white'>$erro</div>";
}

$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modelosite.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[titulo]]", "Cardapio de Pizzas", $html);
$html = str_replace("[[js]]", "", $html);

echo $html;