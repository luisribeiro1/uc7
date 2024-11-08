<?php 

# Iterar sobre o array  que foi criado no controller e que contém os dados do cardapio.

$id = $cardapioUnico["idCardapio"];
$nome = $cardapioUnico["nome"];
$preco = number_format($cardapioUnico['preco'],2,",",".");
$tipo = $cardapioUnico ["tipo"];
$descricao = $cardapioUnico["descricao"];
$foto = $cardapioUnico["foto"];
$status = $cardapioUnico["status"];
    
    $status_form= "";
    $text_form = "";
    if($status <1){
        $status_form = "alert alert-danger px-0 py-0";
        $text_form = "text-decoration-line-through";
    }

     # Cria os cards HTML com os dados do cardapio.
    $card_cardapio = "
    <div class='col-md-3 mb-4 '>
        <div class='card shadow $status_form'>
         <img src='$foto' 'class='card-img-top' alt=''>
        <div class='card-body'>
            <div class='d-flex justify-content-between'>
                <p class='$text_form'><strong>$id: $nome</strong></p>
                <hr>
            </div>
            <div class='d-flex justify-content-between $text_form'>
                $descricao
            </div>
                 <hr> 
            <div class='d-flex justify-content-between mt-2 mb-2'>
               <span class='$text_form'> <strong>Tipo:</strong> $tipo</span>
               <span><strong>Preço:</strong> 
               <span class='text-success $text_form'><strong>R$$preco</strong></span></span>
            </div>
            </div>
            <div class='card-footer'>
                <a class='btn btn-sm btn-primary' href='[[base-url]]/cardapio'><i class='bi bi-arrow-left'></i> Voltar</a>
            </div>
        </div>
    </div>";

    $lista_avaliacoes = "";   # Será usado futuramente.
    $lista = "
        <div class='col'>
            $card_cardapio
        </div>
        <div class='col-md-6 mb-4'>
            $lista_avaliacoes
        </div>
    ";


# Faz a leitura dos arquivos de templates e armazena nas variáveis.
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/ModeloSite.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "<i class='bi bi-stars'></i> Avaliações", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;