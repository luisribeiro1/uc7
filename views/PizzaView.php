<?php


#variavel para incluir os codigos HTML da página.
$lista = "";
if(isset($lista_de_pizzas)){
    # Iterar sobre o array $lista_de_pizzas que contém a lista de pizzas
    foreach($lista_de_pizzas as $pizza){
        $nome = $pizza["nome"];
        $preco = number_format( $pizza["preco"],2,",",".");
        $imagem = $pizza["imagem"];

        # Obter os itens dos ingredientes que estão  em um array

        $lista_de_ingredientes ="";
        foreach($pizza["ingredientes"] as $ingrediente){
            $lista_de_ingredientes.= "<span class='btn btn-sm btn-warning my-1 me-1'>$ingrediente</span> ";
        }
        
    
    # Criar a estrutura HTML no padrão Boostrap

    $lista.="
        <div class='col-md-4 mb-4'>
            <div class='card shadow'>
                <img src='$imagem' class='card-img-top' alt='$nome'>
                <div class='card-body'>
                    Nome: <strong>$nome </strong><br>
                    Preço: <strong>$preco </strong><br>
                    $lista_de_ingredientes
                    
                    <p class='mt-3'>
                        <a href='https://api.whatsapp.com/send/?phone=19988100801&text=$nome' target='_blank' class='btn btn-success'>
                            <i class='bi bi-whatsapp '>Pedir pelo WhatsApp</i>
                        </a>
                </div>
            </div>
        </div>
    ";
    }
}   else{
    $lista = "<div class='alert bg-danger text-white'>$erro</div>";
}

$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");



$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "CARDÁPIO DE PIZZAS", $html);
$html = str_replace("[[conteudo]]", $lista,$html);
$html = str_replace("[[base-url]]", $baseUrl, $html);



echo $html;