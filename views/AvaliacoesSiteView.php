<?php

$nome = $cardapioUnico['nome'];
# number_format(valor, casas decimais, separador decimal, separador milhar)
$preco = number_format($cardapioUnico['preco'],2,",",".");       
$descricao = $cardapioUnico['descricao'];
$foto = $cardapioUnico['foto'];
$idCardapio = $cardapioUnico['idCardapio'];

$card_cardapio = "
    <div class='card shadow'>
        <img src='$foto' class='card-img-top' alt='...'>
        <div class='card-body'>
            Nome: <strong>$nome</strong>
            <br>
            Preço: <strong>R$ $preco</strong>
            <br>
            <strong>$descricao</strong>
            <br>
            <a href='[[base-url]]/cardapio' class='btn btn-sm btn-primary'>Voltar</a>
        </div>
    </div>";


# Iterar sobre o array e obter as avaliações individuais
$lista_avaliacoes = "";  
foreach($listaDeAvaliacoes as $item){
    $nota = $item["nota"];
    $comentario = $item["comentario"];
    $nomeUsuario = $item["nome"];
    $data = $item["data"];

    # criar a lógica para exibir a nota com estrelinhas
    $estrelas = "";
    for($i = 1;$i <= 5; $i++){
        // if ($nota >= $i){
        //     $estrelas .= "<i class='bi bi-star-fill text-warning'></i> ";
        // }else{
        //     $estrelas .= "<i class='bi bi-star text-warning'></i> ";
        // }

        $estrelas .= $nota >= $i 
            ? "<i class='bi bi-star-fill text-warning'></i> "
            : "<i class='bi bi-star text-warning'></i> ";

    }
    
    # Inverter o formato da data, usando o método createFromFormat 
    # da classe datetime
    $objData = Datetime::createFromFormat("Y-m-d", $data);  # formato de entrada
    $dataUsuario = $objData->format("d/m/Y");               # formato de saída

    $lista_avaliacoes .="
        <p>
            <strong>$nomeUsuario - $dataUsuario</strong> <br>
            <small>$estrelas</small> <br>
            $comentario
        </p>
    ";
}

# Criar o formulário para avaliação 
$formulario_avaliacoes ="
    <form method='post' id='form1' action='$baseUrl/avaliacoes/atualizar/$idCardapio'>
        <h4>Faça a sua avaliação</h4>
        <div class='row'>
            <div class='col-md-12'>
                <input type='radio' name='nota' value='1'> ".estrelinhas(1)."<br>
                <input type='radio' name='nota' value='2'> ".estrelinhas(2)."<br>
                <input type='radio' name='nota' value='3'> ".estrelinhas(3)."<br>
                <input type='radio' name='nota' value='4'> ".estrelinhas(4)."<br>
                <input type='radio' name='nota' value='5'> ".estrelinhas(5)."<br>
            </div>
            <div class='col-md-6 mt-3'>
                <input type='text' name='nome' id='nome' class='form-control' placeholder='Seu nome' required>
            </div>
            <div class='col-md-6 mt-3'>
                <input type='email' name='email' id='email' class='form-control' placeholder='Seu e-mail'required>
            </div>

            <div class='col-md-12 mt-3'>
                <textarea name='comentario' id='comentario' class='form-control' placeholder='Faça seu comentário'required></textarea>
            </div>
            
        </div>
        <button type='submit' class='btn btn-primary mt-3'>Enviar Comentário</button>

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


$js = "<script src='$baseUrl/views/templates/js/avaliacoes.js'></script>";   // no final do js colocar um parametro js?a=1 para cash
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "AVALIAÇÕES", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[js]]", $js, $html);

echo $html;

function estrelinhas($quantidade){
    $retorno = "";
    for($i = 1;$i <= $quantidade; $i++){
        $retorno .= "<i class='bi bi-star-fill'></i> ";
    }
    return $retorno;
}