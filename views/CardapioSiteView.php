<?php 

$lista = "";

# Iterar sobre o array  que foi criado no controller e que contém os dados do cardapio.
foreach ($cardapio as $item){

    $idCardapio = $item["idCardapio"];
    $nome = $item["nome"];
    $preco = number_format ($item ["preco"],2,",",",");
    $tipo = $item ["tipo"];
    $descricao = $item["descricao"];
    $foto = $item["foto"];
    $status = $item["status"];

    $status_form= "";
    $text_form = "";
    if($status <1){
        $status_form = "alert alert-danger px-0 py-0";
        $text_form = "text-decoration-line-through";
    }

    # Cria os cards HTML com os dados do cardapio.
    $lista.="
    <div class='col-md-3 mb-4'>
        <div class='card shadow $status_form'>
        <img src='$foto' 'class='card-img-top' alt='...'>
        <div class='card-body'>
            <div class='d-flex justify-content-between'>
                <p class='$text_form'><strong>$idCardapio: $nome</strong></p>
                <hr>
            </div>
            <div class='d-flex justify-content-between $text_form'>
                $descricao
            </div>
                <hr> 
            <div class='d-flex justify-content-between '>
            <span class='$text_form'> <strong>Tipo:</strong> $tipo</span>
            <span><strong>Preço:</strong> 
            <span class='text-success $text_form'><strong>R$$preco</strong></span></span>
            <br>
            <a href='[[base-url]]/avaliacoes/listar/$idCardapio'><i class='bi bi-star>Avaliações</i></a>
            </div>
            </div>

        </div>
    </div>";
}

# Faz a leitura dos arquivos de templates e armazena nas variáveis.
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "NOSSO CARDÁPIO", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;