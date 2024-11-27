<?php

// echo "<pre>";
// var_dump($lista_de_pizzas);
// echo "</pre>";

# Variável para incluir os códigod HTML da página
$lista = "";

if (isset($lista_de_pizzas)){

# Iterar sobre o array $lista_de_pizzas que contém a 
foreach($lista_de_pizzas as $pizzas){
    $nome = $pizzas["nome"];
    $preco = number_format($pizzas["preco"],2,",",".");
    $imagem = $pizzas["imagem"];

    # Obter os itens dos ingredientes que estão em um array
    $lista_de_ingredientes = "";
    foreach($pizzas["ingredientes"] as $ingrediente){
        $lista_de_ingredientes .= "<span class='btn btn-sm btn-warning my-1 me-1'>$ingrediente</span>";
    }

    # Criar a estrutura HTML no padrão Bootstrap
    $lista.= "
        <div class='col-md-4 mb-4'>
            <div class='card shadow'>
                <img src='$imagem' class='card-img-top' alt='$nome'>
                <div class='card-body'>
                    Nome: <strong>$nome</strong> <br>
                    Preço: <strong>R$$preco</strong> <br>
                    $lista_de_ingredientes <br>

                    <p class='mt-3'>
                        <a href='https://api.whatsapp.com/send?phone=62991331691&text=$nome' target='_blank' class='btn btn-sm btn-success'>
                        <i class='bi bi-whatsapp'></i> Pedir pelo Whatsapp
                        </a>
                    </p>
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
$html = str_replace("[[titulo]]", "CARDÁPIO DE PIZZAS", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;