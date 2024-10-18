<?php
$avaliacao = "";
# Iterar sobre array que foi criado com ocntroller e que contem os dados das mesas.
foreach($lista_de_avaliacoes as $avaliacoes){

    $idAvaliacao = $avaliacoes["idAvaliacao"];
    $nota = $avaliacoes["nota"];
    $comentario = $avaliacoes["comentario"];
    $data = $avaliacoes["data"];
    $nome = $avaliacoes["nome"];
    $email = $avaliacoes["email"];
    $situacao = $avaliacoes["situacao"];
    $idCardapio = $avaliacoes["idCardapio"];

    $linkAprovar = "<a class='text-primary text-decoration-none' href='[[base-url]]/avaliacoes-adm/aprovar/$idAvaliacao' onclick=\"return confirm('Confirma a aprovação do comentário $idAvaliacao?')\"><i class='bi bi-check-all'></i>Aprovar</a>";
    $linkExcluir = "<a class='text-danger text-decoration-none' href='[[base-url]]/avaliacoes-adm/excluir/$idAvaliacao' onclick=\"return confirm('Confirma a exclusão do comentário $idAvaliacao?')\"><i class='bi bi-trash'></i>Excluir</a>";

    if($_SESSION["numero_usuario"] == 3) {
        $linkExcluir = "";
        $linkAprovar = "";
    }elseif($_SESSION["numero_usuario"] == 2) {
        $linkExcluir = "";
    }

   # Cria os cards HTML com os dados das mesas.
    $avaliacao.= "
   <div class='col-md-4 mb-3'>
      <div class='card shadow'>

        <div class'card-title '>
          <div class='row '>
            <div class='col-6'>
              <strong class='ms-3 mt-2'>$nome</strong>
            </div>
            <div class='col-6 d-flex justify-content-end'>
              <strong class='text-end text-warning me-3 mt-1'>$nota estrelas</strong>
            </div>
          </div>
        </div>
        
        <div class='card-body'>
          <p>&#34;$comentario&#34;</p>
          <p>&#34;$situacao&#34;</p>
        </div>
        
        <div class='card-footer d-flex justify-content-between'>
          <div class='row'>
            <div class='col-6'>
              <small class='text-primary'><em>$email</em></small>
            </div>
              
            <div class='col-6 d-flex justify-content-end'>
              <small class='text-primary'><em>$data</em></small>
            </div>
            $linkAprovar
            $linkExcluir
          </div>
        </div>
        
      </div>
    </div>
    ";
    
}
# Faz a leitura dos arquivos de templates e armazena nas variáveis.

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/avaliacoesList.html");


# Substituir a tag [[header]] pelo conteúdo da variavel $header. O mesmo acontece 
# com as demais variaves
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $avaliacao, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);



echo $html;