<?php  

$listaCardapio = "";
# Iterar sobre array que foi criado com ocntroller e que contem os dados das mesas.
foreach($lista_de_cardapio as $cardapio){

    $idCardapio = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    # number_format( valor, casas decimais, separador decimal, separador milhar)
    $preco = number_format($cardapio["preco"],2,",",".");    
    $tipo = $cardapio["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

   
    # Cria os cards HTML com os dados das mesas.
    $listaCardapio.= "
    <div class='col-md-3 mb-4'>
        <div class='card'>
        <img src='$foto' class='card-img-top'>
            <div class='card-body'>
                Nome: <strong>$nome</strong><br>
                <br>
                Preço: <strong>R$ $preco</strong>
                <br>
                <strong>$descricao</strong>
                <br>
                <a href='[[base-url]]/avaliacoes/listar/$idCardapio' class='btn btn-primary'>Avaliações</a>
            </div>
        </div>
    </div>
   ";
    
}
# Faz a leitura dos arquivos de templates e armazena nas variáveis.

$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer_site.html");
$html = file_get_contents("views/templates/html/modeloSite.html");


# Substituir a tag [[header]] pelo conteúdo da variavel $header. O mesmo acontece 
# com as demais variaves
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "NOSSO CARDAPIO", $html);
$html = str_replace("[[conteudo]]", $listaCardapio, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);



echo $html;