<?php

$lista = "";

# itera sobre o array que foi criado com o controller e que contém os dados das avaliações
foreach ($lista_avaliacao as $avaliacao) {
  $idAvaliacao = $avaliacao['idAvaliacao'];
  $nota = $avaliacao['nota'];
  $comentario = $avaliacao['comentario'];
  $data = $avaliacao['data'];
  $nome = $avaliacao['nome'];
  $email = $avaliacao['email'];
  $situacao = $avaliacao['situacao'];
  $idCardapio = $avaliacao['idCardapio'];

  # classificação com estrelas
  switch ($nota) {
    case "1":
      $estrela = "<i class='bi bi-star-fill'></i>";
      break;
    case "2":
      $estrela = "<i class='bi bi-star-fill'></i><i class='bi bi-star-fill ms-1'></i>";
      break;
    case "3":
      $estrela = "<i class='bi bi-star-fill'></i><i class='bi bi-star-fill mx-1'></i><i class='bi bi-star-fill'></i>";
      break;
    case "4":
      $estrela = "<i class='bi bi-star-fill'></i><i class='bi bi-star-fill mx-1'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill mx-1'></i>";
      break;
    case "5":
      $estrela = "<i class='bi bi-star-fill'></i><i class='bi bi-star-fill mx-1'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill mx-1'></i><i class='bi bi-star-fill'></i>";
      break;
      
      default:
      "<small>Sem nota<i class='bi bi-emoji-frown'></i></small>";
      break;
    }

    # formatação da data
    $array_data = explode("-", $data);
    str_replace("-", "/", $data);
    $data = implode("/", $array_data);

    $ano = $data[0] . $data[1] . $data[2] . $data[3];
    $mes = $data[5] . $data[6];
    $dia = $data[8] . $data[9];
    $separador = $data[4];

    $data = $dia . $separador . $mes . $separador . $ano;
    
  # cria os cards HTML com os dados das mesas
  $lista .= "
    <div class='col-md-4 mb-3'>
      <div class='card shadow'>

        <div class'card-title '>
          <div class='row '>
            <div class='col-6 mt-2'>
              <strong class='ms-3 mt-2 fs-5'>$nome</strong>
            </div>
            <div class='col-6 d-flex justify-content-end mt-2'>
              <strong class='text-end text-warning me-3 fs-5'>$estrela</strong>
            </div>
          </div>
        </div>
        
        <div class='card-body'>
          <q class='p-2'>$comentario</q>
        
          <div class='row mt-4'>
              <div class='col-6'>
                <p class='text-primary'><em>$email</em></p>
              </div>

              <div class='col-6 d-flex justify-content-end '>
                <p class=''><em>$data</em></p>
              </div>
            </div>
        </div>
        
        <div class='card-footer '>
          <div class='row'>
            <div class='col-6'>
              <b><a class='text-success text-decoration-none' href='[[base-url]]/avaliacoes-adm/aprovar/$idAvaliacao'>Aprovar <i class='bi bi-check-circle mx-1'></i></a></b>
            </div>

            <div class='col-6 d-flex justify-content-end '>
              <b><a class='text-danger text-decoration-none' href='[[base-url]]/avaliacoes-adm/excluir/$idAvaliacao' 
            onclick=\"return confirm('Confirma a exclusão da mesa $idAvaliacao?')\">
            <i class='bi bi-trash'></i> Excluir</a></b>
            </div>
          </div>
        </div>

      </div>
    </div>
  ";
}

# faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/avaliacao.html");

# substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[avaliacao]]", $lista, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;