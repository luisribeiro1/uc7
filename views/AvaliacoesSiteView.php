<?php  


# Iterar sobre array que foi criado com ocntroller e que contem os dados das mesas.


    $idCardapio = $cardapioUnico["idCardapio"];
    $nome = $cardapioUnico["nome"];
    # number_format( valor, casas decimais, separador decimal, separador milhar)
    $preco = number_format($cardapioUnico["preco"],2,",",".");    

    $descricao = $cardapioUnico["descricao"];
    $foto = $cardapioUnico["foto"];
    
   
    # Cria os cards HTML com os dados das mesas.
    $card_cardapio = "
    
        <div class='card'>
        <img src='$foto' class='card-img-top'>
            <div class='card-body'>
                Nome: <strong>$nome</strong><br>
                <br>
                Preço: <strong>R$ $preco</strong>
                <br>
                <strong>$descricao</strong>
                <br>
                <a href='[[base-url]]/cardapio' class='btn btn-sm btn-primary'>Voltar</a>
            </div>
        </div>
    
   ";

   $lista_avaliacoes = ""; #sera usada futuramente 

   $lista = "
    <div class='col-md-6'>
        $card_cardapio
    </div>
    <div class='col-md-6 mb-4'>
       $lista_avaliacoes
    </div>
   ";

# Faz a leitura dos arquivos de templates e armazena nas variáveis.

$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer_site.html");
$html = file_get_contents("views/templates/html/modeloSite.html");


# Substituir a tag [[header]] pelo conteúdo da variavel $header. O mesmo acontece 
# com as demais variaves
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "AVALIAÇÕES", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);



echo $html;