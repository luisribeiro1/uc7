<?php  
    
    $idCardapio = $cardapioUnico["idCardapio"];
    $nome = $cardapioUnico["nome"];
    $descricao = $cardapioUnico["descricao"];
    $foto = $cardapioUnico["foto"];
    $preco = number_format($cardapioUnico["preco"], 2, ",", ".");
    

    $card_cardapio="
        <div class='card shadow'>
            <img src='$foto' class='card-img-top' alt='...'>
            <div class='card-body'>
                Nome: <strong>$nome<br></strong>
                <br>
                Preço: <strong>$preco</strong>
                <br>
                <strong>$descricao</strong>
                <br>
                <div class='text-center mt-2'>
                <a href='[[base-url]]/cardapio' class=' btn btn-sm btn-warning'>Cardápio</a>
                </div>
                 </div>
            </div> 
        ";
        # iterar sobre o array e obter as avaliações individuais
        $lista_avaliacoes="";

        foreach($listaDeAvaliacoes as $item){
            $nota = $item["nota"];
            $comentario = $item['comentario'];
            $nomeUsuario = $item['nome'];
            $data = $item['data'];

            
            # criar a lógica para exbibr a note com estrelinhas 
            $estrelas="";

            for($i = 1;$i <=5; $i++){
                $nota >= $i ? $estrelas.="<i class='bi bi-star-fill'></i> " : $estrelas.= "<i class='bi bi-star'></i> ";
            }

            # inverter o formato da data, usando o método createFromFormat da classe datetime
            $objdata = Datetime::createFromFormat("Y-m-d", $data); # formato de entrada
            $dataUsuario = $objdata->format("d/m/Y");
            
            $lista_avaliacoes.="
            <p class='bg-primary-subtle text-center p-3 shadow rounded border border-dark-subtle'>
                <strong>$nomeUsuario - $dataUsuario</strong><br>
                <small>$estrelas</small><br>
                $comentario
            </p>
            ";
        }

        # criar o formulário para avaliação
        $formulario_avaliacoes="
        <form method='post' id='form1' action='$baseUrl/avaliacoes/atualizar/$idCardapio'>
            <h4 class='text-center'>Avalie-nos</h4>
            <div class='row'>
                <div class='col-md-12'>
                    <input type='radio' name='nota' value='1'>".estrelinhas(1)."</input><br>
                    <input type='radio' name='nota' value='2'>".estrelinhas(2)."</input><br>
                    <input type='radio' name='nota' value='3'>".estrelinhas(3)."</input><br>
                    <input type='radio' name='nota' value='4'>".estrelinhas(4)."</input><br>
                    <input type='radio' name='nota' value='5'>".estrelinhas(5)."</input><br>
                </div>
        
                <div class='col-md-6 mt-3'>
                    <input type='text' name='nome' id='nome' class='form-control' placeholder='Seu Nome' required>
                </div>
                <div class='col-md-6 mt-3'>
                    <input type='email' name='email' id='email' class='form-control' placeholder='Seu E-mail' required>
                </div>
                <div class='col-md-12 mt-3'>
                    <textarea name='comentario' id='comentario' class='form-control' placeholder='Comentário' required></textarea>
                </div>
            </div>  
                <button class='btn btn-primary btn-sm mt-3' type='submit'>Enviar Comentário</button>
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
    
    # Faz a leitura dos arquivos de templates e armazena nas variavéis 
    $js = "<script src='$baseUrl/views/templates/js/avaliacoes.js'></script>";
    $header = file_get_contents("views/templates/html/header_site.html");
    $footer = file_get_contents("views/templates/html/footer.html");
    $html = file_get_contents("views/templates/html/modeloSiteList.html");
    
    # substituir a tag [[header]] pelo conteúdo da variável $header
    # o mesmo acontece com as demais variáveis
    $html = str_replace("[[header]]", $header, $html);
    $html = str_replace("[[footer]]", $footer, $html);
    $html = str_replace("[[titulo]]", "AVALIAÇÕES", $html);
    $html = str_replace("[[conteudo]]", $lista, $html);
    $html = str_replace("[[base-url]]", $baseUrl, $html);
    $html = str_replace("[[js]]", $js, $html);
    
    echo $html;
   

function estrelinhas($quantidade){
    $retorno = "";
    for($i = 1; $i <=$quantidade; $i++){
        $retorno.= "<i class='bi bi-star-fill ms-1'></i>";
    }
    return $retorno;
}