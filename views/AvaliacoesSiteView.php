<?php 

    $nome = $cardapioUnico["nome"];
    $preco = number_format($cardapioUnico["preco"],2,",",".");  # valor, casas decimais, separador de decimais, separador milhar
    $tipo = $cardapioUnico["tipo"];
    $descricao = $cardapioUnico["descricao"];
    $foto = $cardapioUnico["foto"];

    # Cria os cards HTML com os dados do cardápio.
    $card_cardapio = "
        <div class='card'>
            <img src='$foto' class='card-img-top' alt='...'>
            <div class='card-body'>
                Nome: <strong>$nome</strong> <br>
                Preço: <strong>R$ $preco</strong> <br>
                $tipo <br>
                $descricao<br>
            </div>
            <div class='card-footer'>
                <a href='[[base-url]]/cardapio' class='btn btn-sm btn-dark'>Voltar</a>
            </div>
        </div>
   ";

# Iterar sobre o array e obter as avaliações.
$lista_avaliacoes = "";
foreach($listaDeAvaliacoes as $item) {
    $nota = $item["nota"];
    $nome = $item["nome"];
    $comentario = $item["comentario"];
    $data = $item["data"];

    # Criar a lógica para exibir a nota com estrelas
    $estrelas = "";

    for($i = 1; $i <= 5; $i++) {
        $nota >= $i ? $estrelas.= "<i class='bi bi-star-fill text-warning'></i>" : $estrelas.= "<i class='bi bi-star text-warning'></i>";
        // if($nota >= $i) {
        //     $estrelas .= "<i class='bi bi-star-fill'></i>";
        // }else {
        //     $estrelas .= "<i class='bi bi-star'></i>";
        // }
    }

    # Inverter o formato da data usando o método createFromFormat da classe datetime
    $objData = Datetime::createFromFormat("Y-m-d", $data); # Formato de entrada
    $dataUsuario = $objData->format("d/m/Y"); # Formato de saída

    $lista_avaliacoes .="
        <p>
            <strong>$nome - $dataUsuario</strong> <br>
            <small>$estrelas</small> <br>
            $comentario <br>
        </p>
    ";
}

$formulario_avaliacoes = "";

# Criar formulário para avaliação
$formulario_avaliacoes = "
        <form method='post' id='form1' action='$baseUrl/avaliacoes/atualizar/$idCardapio'>
            <h4>Deixe sua opinião</h4>
            <div class='row'>
                <div class='col-md-12'>
                    <input type='radio' name='nota' value='1'> ".estrelinhas(1)." <br>
                    <input type='radio' name='nota' value='2'> ".estrelinhas(2)." <br>
                    <input type='radio' name='nota' value='3'> ".estrelinhas(3)." <br>
                    <input type='radio' name='nota' value='4'> ".estrelinhas(4)." <br>
                    <input type='radio' name='nota' value='5'> ".estrelinhas(5)." <br>
                </div>
                <div class='col-md-6 mt-3'>
                    <input type='text' name='nome' id='nome' class='form-control' placeholder='Seu nome' required>
                </div>
                <div class='col-md-6 mt-3'>
                    <input type='email' name='email' id='email' class='form-control' placeholder='Seu e-mail' required>
                </div>
                <div class='col-md-12 mt-3'>
                    <textarea name='comentario' id='comentario' class='form-control' placeholder='Deixe seu comentário' required></textarea>
                </div>
            </div>
            <button type='submit' class='btn btn-dark mt-3'>Enviar comentário</button>
        </form>
    ";

$lista = "
    <div class='col-md-6 mb-4'>
        $card_cardapio
    </div>
    <div class='col-md-6 mb-4'>
        $lista_avaliacoes
        $formulario_avaliacoes
    </div>
";

$js = "<script src='$baseUrl/views/templates/js/avaliacoes.js'></script>";
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer_site.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[titulo]]", "Avaliações.", $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[js]]", $js, $html);

echo $html;

function estrelinhas($quantidade) {
    $retorno = "";
    for($i = 1; $i<= $quantidade; $i++) {
        $retorno .= "<i class='bi bi-star-fill text-warning'></i>";
    }
    return $retorno;
}