<?php
    foreach($lista_avaliacoes as $avaliacoes){
    $idAvaliacao = $avaliacoes["idAvaliacao"];
    $nota = $avaliacoes["nota"];
    $comentario = $avaliacoes["comentario"];
    $data = $avaliacoes["data"];
    $nome = $avaliacoes["nome"];
    $email = $avaliacoes["email"];
    $situacao = $avaliacoes["situacao"];
    $idCardapio = $avaliacoes["idCardapio"];


    $lista.="
       <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body text-center'>
                <strong>Avaliação $idAvaliacao<br></strong>
                 <strong>$nome</strong>
            </div>
            <div class='card-footer'>
                <a class='text-primary me-2 text-decoration-none'href='#'><i class='bi bi-pencil-square'></i>Editar</a>
                
                <a class='text-danger text-decoration-none'href='[[base-url]]/avaliacoes-adm/excluir/$idAvaliacao'onClick=\"return confirm('Confirma a exclusão do comentario $idAvaliacao?')\"><i class='bi bi-trash'></i>Excluir</a>
            </div>
        </div> 
    </div>";
    }
        // <h3>Avaliações</h3>    
        //     <form>
        //         <input type='text' placeholder='Nome' class='mb-2'></input>
        //         <input type='email' placeholder='Email' class='mb-2'></input>
        //         <input type='text' placeholder='Data'></input><br>
        //         <textarea placeholder='Data' na></textarea>
        //     </form>
            


        // <button class='btn btn-warning'>    
        //     </button>
        // </div>
    
    
    
    # Faz a leitura dos arquivos de templates e armazena nas variavéis 
    $header = file_get_contents("views/templates/html/header.html");
    $footer = file_get_contents("views/templates/html/footer.html");
    $html = file_get_contents("views/templates/html/avaliacaoList.html");
    
    # substituir a tag [[header]] pelo conteúdo da variável $header
    # o mesmo acontece com as demais variáveis
    $html = str_replace("[[header]]", $header, $html);
    $html = str_replace("[[footer]]", $footer, $html);
    $html = str_replace("[[lista]]", $lista, $html);
    $html = str_replace("[[base-url]]", $baseUrl, $html);
    
    echo $html;
    