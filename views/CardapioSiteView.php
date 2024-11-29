<?php 

$lista = "";

# Iterar sobre o array  que foi criado no controller e que contém os dados do cardapio.
foreach ($lista_de_cardapio as $cardapio){

    $id = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = number_format($cardapio['preco'],2,",",".");
    $tipo = $cardapio ["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];
    
    $status_form= "";
    $text_form = "";
    if($status <1){
        $status_form = "alert alert-danger px-0 py-0";
        $text_form = "text-decoration-line-through";
    }

     # Cria os cards HTML com os dados do cardapio.
    $lista.="
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
                <big><a class='text-primary text-decoration-none me-4' href='[[base-url]]/avaliacoes/listar/$id'><i class='bi bi-stars'></i> Avaliações</i></a></big>
            </div>
        </div>
    </div>";
  
}

# Faz a leitura dos arquivos de templates e armazena nas variáveis.
$js = "<script src='$baseUrl/views/templates/js/avaliacoes.js'></script>";
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer_site.html");
$html = file_get_contents("views/templates/html/ModeloSite.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "<i class='bi bi-clipboard-heart'></i> Cardápio", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[js]]", "", $html);

echo $html;