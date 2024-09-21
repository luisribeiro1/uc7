<?php

    // $id = $avaliacoes["idAvaliacao"];
    // $nota = $avaliacoes["nota"];
    // $comentario = $avaliacoes["comentario"];
    // $data = $avaliacoes["data"];
    // $nome = $avaliacoes["nome"];
    // $email = $avaliacoes["email"];
    // $situacao = $avaliacoes["situacao"];
    // $idCardapio = $avaliacoes["idCardapio"];

    $lista="
        <div>
            <h3>Avaliações</h3>    
            <form>
                <input type='text' placeholder='Nome' class='mb-2'></input>
                <input type='email' placeholder='Email' class='mb-2'></input>
                <input type='text' placeholder='Data'></input><br>
                <textarea placeholder='Data' na></textarea>
            </form>
            


        <button class='btn btn-warning'>    
            </button>
        </div>
    ";
    


    $header = file_get_contents("views/templates/html/header.html");
    $footer = file_get_contents("views/templates/html/footer.html");
    $html = file_get_contents("views/templates/html/avaliacaoList.html");
    
    $html = str_replace("[[header]]", $header, $html);
    $html = str_replace("[[footer]]", $footer, $html);
    $html = str_replace("[[lista]]", $lista, $html);
    
    echo $html;
    