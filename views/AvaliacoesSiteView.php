<?php 

$lista = "";

# Iterar sobre o array  que foi criado no controller e que contém os dados do cardapio.

    $idCardapio = $cardapioUnico["idCardapio"];
    $nome = $cardapioUnico["nome"];
    $preco = number_format ($cardapioUnico ["preco"],2,",",",");
    $descricao = $cardapioUnico["descricao"];
    $foto = $cardapioUnico["foto"];

    $status_form= "";
    $text_form = "";
    if($status <1){
        $status_form = "alert alert-danger px-0 py-0";
        $text_form = "text-decoration-line-through";
    }
    # Iterar sobre o array e obter as avaliações
        $lista_avaliacoes ="";
        foreach($listaAvaliacoes as $item){
            $nota = $item["nota"];
            $comentario = $item["comentario"];
            $nome = $item["nome"];
            $data = $item["data"];

            # Criar logica para exibir a nota com estrelinhas
            $estrelas = "";
            for($i = 1;$i <= 5; $i++){
                if($nota >= $i){
                    $estrelas .= "<i class='bi bi-star-fill'></i> ";
                }else{
                    $estrelas .= "<i class='bi bi-star'></i> ";
                }
                
            }

            $lista_avaliacoes .="
            <p>
                <strong>$nome - $data</strong> <br>
                <small>$estrelas</small> <br>
                $comentario
            </p>
        ";
    }

    # Cria os cards HTML com os dados do cardapio.
    $lista.="
    
    <div class='col-md-3 mb-4'>
        <div class='card shadow'>
        <img src='$foto' 'class='card-img-top' alt='...'>
        <div class='card-body'>
            <div class='d-flex justify-content-between'>
                <p class='$text_form'><strong>$id: $nome</strong></p>
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
            </div>
            </div>

        </div>
    </div>";

# Faz a leitura dos arquivos de templates e armazena nas variáveis.
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "AVALIAÇÕES", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;