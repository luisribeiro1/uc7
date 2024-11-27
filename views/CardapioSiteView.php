<?php
$lista = "";
# iterar sobre o array que foi criado no controller e que contém os dados das mesas 
foreach($lista_cardapio as $cardapio){
    $idCardapio = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = number_format($cardapio["preco"], 2, ",", "."); # number_format(valor, casas decimais, separador decimal, separador de milhar)
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];

        $lista.="
    <div class='col-md-4 mb-4'>
        <div class='card shadow'>
            <img src='$foto' class='card-img-top' alt='...'>
            <div class='card-body text-center'>
                Nome: <strong>$nome<br></strong>
                <br>
                Preço: <strong>$preco</strong>
                <br>
                <strong>$descricao</strong>
                <br>
                <a href='[[base-url]]/avaliacoes/listar/$idCardapio' class='text-dark'>Avaliações</a>
                 </div>
            </div> 
    </div>
        ";
}

# Faz a leitura dos arquivos de templates e armazena nas variavéis 
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSiteList.html");

# substituir a tag [[header]] pelo conteúdo da variável $header
# o mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[titulo]]", "NOSSO CARDAPIO", $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;

