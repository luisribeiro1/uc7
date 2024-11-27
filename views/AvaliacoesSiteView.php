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
    $status_view = "";
    if($status <1){
        $status_form = "alert alert-danger px-0 py-0";
        $text_form = "text-decoration-line-through";
        $status_view = "<span class='align-self-center badge text-bg-danger'>INDISPONÍVEL</span>";
    }
 
     # Cria os cards HTML com os dados do cardapio.
    $card_cardapio = "
        <div class='card $status_form shadow'>
            <img src='$foto' class='card-img-top' alt='...'>
            <div class='card-header'>
                <div class='d-flex justify-content-between'>
                    <p class='fs-4 my-0 $text_form'>$nome</p>
                    <p class='text-end my-0 py-0 $text_form'>$status_view</p>
                </div>
                <div class='d-flex justify-content-between '>
                    <p class='text-start my-0 $text_form'><strong>Tipo:</strong> $tipo</p>
                    <p class='my-0 $text_form'><strong>Preço: <span class='text-success'>R$ $preco</span></strong></p>
                </div>
            </div>
                <div class='card-body py-2 $text_form'>
                    <span class=''><strong>Descrição:</strong> $descricao</span>
                </div>
                <div class='card-footer d-flex justify-content-start'>
                    <a href='[[base-url]]/cardapio' class='btn btn-secondary btn-sm'><i class='bi bi-arrow-left'></i> Voltar</a>
                </div>
        </div>
    ";
 
    #Iterar sobre o assay e obter as avaliações.
$lista_avaliacoes = "";
foreach($listaDeAvaliacoes as $item){
    $nota = $item["nota"];
    $comentario = $item["comentario"];
    $nomeUsuario = $item["nome"];
    $data = DateTime::createFromFormat("Y-m-d", $item["data"])->format("d/m/Y");
 
    $estrelas = "";
 
    for($i = 1;$i <= 5; $i++){
        $estrelas .= $nota >= $i ? "<i class='bi bi-star-fill text-warning'></i>" : "<i class='bi bi-star text-warning'></i>";
    }
   
    // for($i = 1;$i <= 5; $i++){
    //     if ($nota >= $i){
    //         $estrelas .= "<i class='bi bi-star-fill'></i>";
    //     }else{
    //         $estrelas .= "<i class='bi bi-star'></i>";
    //     }
    // }
 
    $lista_avaliacoes .="
        <p>
            <strong>$nomeUsuario - $data</strong><br>
            <small>$estrelas</small> <br>
            ''$comentario''
            <hr class='mt-2 mb-2'>
        </p>
    ";
}
 
    # Criar o formulário para avaliação
 
    $formulario_avaliacoes ="
        <form method='post' id='form1' action='$baseUrl/avaliacoes/atualizar/$idCardapio'>
            <h4>Faça a sua avaliação:</h4>
            <div class='row'>
                <div class='col-md-12'>
                    <input type='radio' name='nota' value='1'> ".estrelinhas(1)." <br>
                    <input type='radio' name='nota' value='2'> ".estrelinhas(2)." <br>
                    <input type='radio' name='nota' value='3'> ".estrelinhas(3)." <br>
                    <input type='radio' name='nota' value='4'> ".estrelinhas(4)." <br>
                    <input type='radio' name='nota' value='5'> ".estrelinhas(5)." <br>
                </div>
                <div class='col-md-6 mt-3'>
                    <input type='text' name='nome' id='nome' class='form-control' placeholder='Nome:' required>
                </div>
                <div class='col-md-6 mt-3'>
                    <input type='email' name='email' id='email' class='form-control' placeholder='Email:' required>
                </div>
                <div class='col-md-12 mt-3'>
                    <textarea name='comentario' id='comentario' class='form-control' placeholder='Faça seu comentário:' required></textarea>
                </div>
            </div>
            <button type='submit' class='btn btn-primary mt-3'>Enviar comentário <i class='bi bi-arrow-right'></i> </button>
        </form>
    ";
 
 
 
$lista = "
 
    <div <div class='col-md-3 mb-4'>
            $card_cardapio
        </div>
        <div class='col-md-6 mb-4'>
            $lista_avaliacoes
            $formulario_avaliacoes
        </div>
</div>
    ";
 
 
# Faz a leitura dos arquivos de templates e armazena nas variáveis.
$js = "<script src='$baseUrl/views/templates/js/avaliacoes.js'></script>";
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/ModeloSite.html");
 
# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "<i class='bi bi-stars text-info'></i><span class='text-primary'>|</span> AVALIAÇÃO:", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[js]]", $js, $html);
 
echo $html;
 
function estrelinhas($quantidade){
    $retorno = "";
    for($i = 1;$i <= $quantidade; $i++){
        $retorno .= "<i class='bi bi-star-fill text-warning'></i>";
    }
    return $retorno;
}