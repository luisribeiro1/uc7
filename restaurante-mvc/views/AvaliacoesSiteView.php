<?php


$idCardapio =$cardapioUnico['idCardapio'];
$nome =$cardapioUnico['nome'];
# number_format(valor, casas decimais, separador decimal, separador milhar)
$preco = number_format($cardapioUnico['preco'],2,",",".");
$descricao =$cardapioUnico['descricao'];
$foto =$cardapioUnico['foto'];


$card_cardapio = "

    <div class='card shadow'>
        <img src='$foto' class='card-img-top'alt='...'>
        <div class='card-body'>
            Nome: <strong>$nome</strong>
            <br>
            Preço: <strong>$preco</strong>
            <br>
            Descrição: <strong>$descricao</strong>
            <br>
            <a href='[[base-url]]/cardapio'class='btn btn-sm btn-primary'>Voltar</a>
        </div>
    </div>

";

# iterar sobre o array e obter as avaliacoes
$lista_avaliacoes = "";  
foreach($listaDeAvaliacoes as $item){
    $nota = $item ["nota"];
    $comentario = $item ["comentario"];
    $nomeUsuario = $item ["nome"];
    $data = $item ["data"];

    # criar a logica para exibir a nota com estrelinhas
    $estrelas = "";
    for($i = 1; $i <= 5; $i++){
        $nota  >= $i ? $estrelas.="<i class='bi bi-star-fill text-warning'></i>" : $estrelas.="<i class='bi bi-star text-warning'></i>";
    }

    # inverter o formato da data, usando o metodo createFromFormat da classe datetime
    $objData = DateTime::createFromFormat("Y-m-d" ,$data);  
    $dataUsuario = $objData->format("d/m/Y");
 

    $lista_avaliacoes .="
        <p class='bg-body text-center shadow rounded p-2'>
            <strong> $nomeUsuario - $dataUsuario</strong> <br>
            <small>$estrelas </small> <br>
            $comentario
        </p>   
    "; 

    # criar o formulario para a avaliacao
    $formulario_avaliacoes ="
        <form method='post' action='$baseUrl/avaliacoes/atualizar/$idCardapio'>
            <h4>Faça a sua avaliação</h4>
            <div class='row'>
                <div class='col-md-12'>
                    <input type='radio' name='nota' value='1'>".estrelinhas(1)."<br>
                    <input type='radio' name='nota' value='2'>".estrelinhas(2)."<br>
                    <input type='radio' name='nota' value='3'>".estrelinhas(3)."<br>
                    <input type='radio' name='nota' value='4'>".estrelinhas(4)."<br>
                    <input type='radio' name='nota' value='5'>".estrelinhas(5)."<br>     
                </div>
                <div class='col-md-6 mt-3'>
                    <input type='text' name='nome' class='form-control' placeholder='Seu nome'>
                </div>
                <div class='col-md-6 mt-3'>
                    <input type='text' name='nome' class='form-control' placeholder='Seu Email'>
                </div>
            </div>
        </form>
    
    ";
}

$lista = "
    <div class='col-md-6 mb-4'>
        $card_cardapio
    </div>
    <div class='col-md-6 mb-4'>
        $lista_avaliacoes
        $formulario_avaliacoes
    </div>
";

$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "AVALIAÇÕES", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;

function estrelinhas($quantidade){
    $retorno = "";
    for($i = 1;$i <= $quantidade; $i++){
        $retorno .= "<i class='bi bi-star-fill text-warning '></i>";
    }
    return $retorno;
}