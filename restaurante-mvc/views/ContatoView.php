<?php

// echo "<pre>";
// var_dump($lista_de_pizzas);
// echo "</pre>";

# variável para incluir os códigos HTML da página
$lista = "";

# iterar sobre o array $lista_de_pizzas que contém as informações das pizzas
foreach ($lista_de_contatos as $contato) {
  $rua = $contato['rua'];
  $bairro = $contato['bairro'];
  $cidade = $contato['cidade'];
  $horario = $contato['horario'];
  

  # obter os itens das redes sociais que estão em um array
  $lista_de_redes = "";
  $resultado_rede = "";

  foreach ($contato['contatos'] as $rede) {

    $rede_null = 'd-none';
# oque / troca / onde
    switch ($resultado_rede) {

      case strpos($rede, 'facebook'):
        $rede = "<i class='bi bi-facebook fs-5'></i>";
        $lista_de_redes .= "<a class='btn btn-sm btn-secondary rounded-pill my-1 me-1'>$rede</a>";
        break;

      case strpos($rede, 'instagram'):
        $rede = "<i class='bi bi-instagram fs-5'></i>";
        $lista_de_redes .= "<a class='btn btn-sm btn-secondary rounded-pill my-1 me-1'>$rede</a>";
        break;

      case strpos($rede, 'youtube'):
        $rede = "<i class='bi bi-youtube'></i>";
        $lista_de_redes .= "<a class='btn btn-sm btn-secondary rounded-pill my-1 me-1'>$rede</a>";
        break;

      case strpos($rede, 'tiktok'):
        $rede = "<i class='bi bi-tiktok'></i>";
        $lista_de_redes .= "<a class='btn btn-sm btn-secondary rounded-pill my-1 me-1'>$rede</a>";
        break;

      case strpos($rede, 'linkedin'):
        $rede = "<i class='bi bi-linkedin'></i>";
        $lista_de_redes .= "<a class='btn btn-sm btn-secondary rounded-pill my-1 me-1' href='$rede'></a>";
        break;

      case strpos($rede, 'whatsapp'):
        $rede = "<i class='bi bi-whatsapp'></i>";
        $lista_de_redes .= "<a class='btn btn-sm btn-secondary rounded-pill my-1 me-1'>$rede</a>";
        break;
      
      default:
        $lista_de_redes .= "<span class='btn btn-sm btn-secondary rounded-pill my-1 me-1 $rede_null'></span>";
        break;
    }

    // if ($resultado_rede = strpos($rede, 'facebook')) {
    //   $lista_de_redes .= "<span class='btn btn-sm btn-secondary rounded-pill my-1 me-1'>$rede</span>"; 
    // } else {
    //   $lista_de_redes .= "<span class='btn btn-sm btn-secondary rounded-pill my-1 me-1 $rede_null'></span>";
    // };

    // $lista_de_redes .= "<span class='btn btn-sm btn-secondary rounded-pill my-1 me-1 $rede_null'>$rede</span>";
  }

  # criar a estrutura HTML
  $lista .="
    <div class='col-md-12 mb-4'>
      <div class='card shadow rounded-4'>
        <div class='card-header'>
          <h5>
            $rua - $bairro - $cidade
          </h5>
        </div>

        <div class='card-body'>
          <p>$horario</p></br>
          $lista_de_redes </br>

        </div>
      </div>
    </div>

  ";
}

# faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

# substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[titulo]]", "<span class=''><span><span><strong class='ms-2'>CONTATOS</strong></span>", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;