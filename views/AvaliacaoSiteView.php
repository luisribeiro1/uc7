<?php  
    
    $idCardapio = $cardapioUnico["idCardapio"];
    $nome = $cardapioUnico["nome"];
    $descricao = $cardapioUnico["descricao"];
    $foto = $cardapioUnico["foto"];
    $preco = number_format($cardapioUnico["preco"], 2, ",", ".");
    

    
    $card_cardapio="
        <div class='card shadow'>
            <img src='$foto' class='card-img-top' alt='...'>
            <div class='card-body text-center'>
                Nome: <strong>$nome<br></strong>
                <br>
                Preço: <strong>$preco</strong>
                <br>
                <strong>$descricao</strong>
                <br>
                <a href='[[base-url]]/cardapio' class=' btn btn-sm btn-warning'>Avalições</a>
                 </div>
            </div> 
        ";

        $lista_avaliacoes="";

        $lista = "
            <div class='col-md-6 mb-4'>
                $card_cardapio
            </div> 
            <div class='col-md-6 mb-4'>
                $lista_avaliacoes
            </div> 
        ";
    
    # Faz a leitura dos arquivos de templates e armazena nas variavéis 

    $header = file_get_contents("views/templates/html/header.html");
    $footer = file_get_contents("views/templates/html/footer.html");
    $html = file_get_contents("views/templates/html/modeloSiteList.html");
    
    # substituir a tag [[header]] pelo conteúdo da variável $header
    # o mesmo acontece com as demais variáveis
    $html = str_replace("[[header]]", $header, $html);
    $html = str_replace("[[footer]]", $footer, $html);
    $html = str_replace("[[titulo]]", "AVALIAÇÕES", $html);
    $html = str_replace("[[conteudo]]", $lista, $html);
    $html = str_replace("[[base-url]]", $baseUrl, $html);
    
    echo $html;
   