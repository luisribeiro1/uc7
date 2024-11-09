<?php

# Interar sobre o array que foi criado com controller e que contém os dados das mesas
    $id = $cardapioUnico["idCardapio"];
    $nome = $cardapioUnico["nome"];
    $preco = number_format($cardapioUnico["preco"],2,",",".");    # number_format(valor,casas decimais,separador decimal,separador milhar)
    $tipo = $cardapioUnico["tipo"];
    $descricao = $cardapioUnico["descricao"];
    $foto = $cardapioUnico["foto"];
    $status = $cardapioUnico["status"];

    $status_form = "";
    $text_form = "";
    $status_view = "";
    if($status <1){
        $status_form = "alert alert-danger px-0 py-0";
        $text_form = "text-decoration-line-through";
        $status_view = "<span class='align-self-center badge text-bg-danger'>INDISPONÍVEL</span>";
    }
    
    #Cria os cards HTML com os dados das mesas
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
                    <a href='[[base-url]]/cardapio' class='btn btn-secondary btn-sm'><i class='bi bi-arrow-left'></i> Voltar </a>
                </div>
        </div>
    ";

    # Interar sobre o array e obter as avaliações:
    $lista_avaliacoes = "";     # Sera usada futuramente
    foreach($lista_do_avaliacoes as $item){
        $nota = $item["nota"];
        $comentario = $item["comentario"];
        $nomeUsuario = $item["nome"];
        $data = $item["data"];

        # Formatação Datas:
        $data = explode("-",$data);
        $data = str_replace("-","/",$data);
        $data = implode("/",$data);

        $ano = $data[0].$data[1].$data[2].$data[3];
        $mes = $data[4].$data[5].$data[6].$data[7];
        $dia = $data[8].$data[9];

        $data = $dia.$mes.$ano;

            // Outro método:

            //  $data = DateTime::createFromFormat("Y-m-d", $data)->format("d/m/y");



        # Estrelas:
        $estrelas = "";
        for($i = 1;$i <= 5; $i++){
            $estrelas .= $nota >= $i ? "<i class='bi bi-star-fill text-warning'></i>" : "<i class='bi bi-star text-warning'></i>";
        }

        # Modo alternativo:
        // switch ($nota) {
        //     case "1":
        //         $estrelas = "<i class='bi bi-star-fill'></i><i class='bi bi-star'></i><i class='bi bi-star'></i><i class='bi bi-star'></i><i class='bi bi-star'></i>";
        //         break;
        //     case "2":
        //         $estrelas = "<i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star'></i><i class='bi bi-star'></i><i class='bi bi-star'></i>";
        //         break;
        //     case "3":
        //         $estrelas = "<i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star'></i><i class='bi bi-star'></i>";
        //         break;
        //     case "4":
        //         $estrelas = "<i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star'></i>";
        //         break;
        //     case "5":
        //         $estrelas = "<i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>";
        //         break;
        //     default:
        //         $estrelas = "<i class='bi bi-star'></i><i class='bi bi-star'></i><i class='bi bi-star'></i><i class='bi bi-star'></i><i class='bi bi-star'></i>";
        //         break;
        // }

        $lista_avaliacoes .= "
            <p>
                <strong>$nomeUsuario - $data </strong>
                <br>
                $estrelas
                <br>
                $comentario 
                <hr>
            </p>
        ";

        #   Criar formulário para avaliação

        $formulario_avaliacoes = "
            <form method='post' action='$baseUrl/avaliacoes/atualizar/$idCardapio'>
                <h4>Deixe sua resenha:</h4>
                <div class='row'>
                    <div class='col-md-12'>
                        <input type='radio' name='nota' value='1'> ".estrelinha(1)." <br>
                        <input type='radio' name='nota' value='2'> ".estrelinha(2)." <br>
                        <input type='radio' name='nota' value='3'> ".estrelinha(3)." <br>
                        <input type='radio' name='nota' value='4'> ".estrelinha(4)." <br>
                        <input type='radio' name='nota' value='5'> ".estrelinha(5)." <br>
                    </div>
                    <div class='col-md-6 mt-3'>
                        <input type='text' name='nome' class='form-control' require placeholder='Seu nome:'>
                    </div>
                    <div class='col-md-6 mt-3'>
                        <input type='email' name='email' class='form-control' require placeholder='Seu Email: exemplo@email.com'>
                    </div>
                    <div class='col-md-12 mt-3'>
                        <textarea name='comentario' class='form-control' require placeholder='Faça sua resenha:'></textarea>
                    </div>
                </div>
            </form>
        ";
    }

    $lista = "
        <div class='col-md-3 mb-4'>
            $card_cardapio
        </div>
        <div class='col-md-6 mb-4'>
            $lista_avaliacoes
            $formulario_avaliacoes
        </div>
    ";

# Faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer_site.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

# Substituir a tag [[header]] pelo conteudo da variavel $header. O mesmo acontece com as demais variaveis.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[titulo]]", "<i class='bi bi-stars'></i> | Avaliações:", $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html; 

function estrelinha($quantidade){
    $retorno = "";
    for($i = 1;$i <= $quantidade; $i++){
        $retorno .= "<i class='bi bi-star-fill text-warning'></i>";
    }
    return $retorno;
}