<?php
   $lista = "";
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
    <div class='col-md-4 mb-4'>
        <div class='card'>
            <div class='card-body text-center'>
                <strong>Comentário $idAvaliacao<br></strong>
                 <strong>$nome</strong>
            </div>
            <div class='card-body text-center'>
            <strong>$email</strong>
            <strong class='ms-2 '>Nota: $nota</strong> 
            <p>$situacao</p>
                 <p>$comentario</p>
            </div>
            <div class='card-footer'>
                
                <a class='text-danger text-decoration-none'href='[[base-url]]/avaliacoes-adm/excluir/$idAvaliacao
                'onClick=\"return confirm('Confirma a exclusão do comentario $idAvaliacao?')\"><i class='bi bi-trash'></i>Excluir</a>

                <a class='text-success text-decoration-none'href='[[base-url]]/avaliacoes-adm/autorizar/$idAvaliacao'onClick=\"return confirm('Confirma a autorização do comentário $idAvaliacao?')\"
                ><i class='bi bi-check-lg'></i>Autorizar</a>
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
   