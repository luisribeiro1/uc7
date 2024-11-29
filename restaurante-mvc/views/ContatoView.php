<?php

# variável para incluir os códigos HTML da página
$lista = "";

# array associativo
// $array_redes = [
//   'facebook' => "<a href='#' class='m-2 btn btn-sm btn-primary'>Facebook</a>",
//   'instagram' => "<a href='#' class='m-2 btn btn-sm btn-danger'>Instagram</a>",
//   'youtube' => "<a href='#' class='m-2 btn btn-sm btn-danger'>Youtube</a>",
//   'tiktok' => "<a href='#' class='m-2 btn btn-sm btn-dark'>TikTok</a>",
//   'whatsapp' => "<a href='#' class='m-2 btn btn-sm btn-success icone_w'>Whatsapp</a>",
//   'linkedin' => "<a href='#' class='m-2 btn btn-sm btn-info'>Linkedin</a>"
// ];

if (isset($lista_de_contatos)) {

  # iterar sobre o array $lista_de_pizzas que contém as informações das pizzas
  foreach ($lista_de_contatos as $contato) {
  
    $rua = $contato['rua'];
    $bairro = $contato['bairro'];
    $cidade = $contato['cidade'];
    $horario = $contato['horario'];
    $unidade = $contato['unidade'];
    
    # obter os itens das redes sociais que estão em um array
    $lista_de_redes = "";
    $resultado_rede = "";
    $rede = "";
    
    $localizacao = "";
    
    if ($rua == 'Av Paulista, 2389') {
      $localizacao = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.323247957456!2d-46.66495532478867!3d-23.55683126142554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce582d158d348d%3A0x9860ea40cc0b82ff!2sAv.%20Paulista%2C%202389%20-%20Bela%20Vista%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2001311-300!5e0!3m2!1spt-BR!2sbr!4v1732140733850!5m2!1spt-BR!2sbr';
  
    } elseif ($rua == 'Rua Quadros Sobrinho, 01') {
      $localizacao = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.317702257828!2d-47.401501024823816!3d-22.567217925823332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c880ee0caac24d%3A0x95fcf7d5914d4d50!2sSenac%20Limeira!5e0!3m2!1spt-BR!2sbr!4v1732145782348!5m2!1spt-BR!2sbr';
  
    } elseif ($rua == 'Avenida do Café, 298') {
      $localizacao = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.160034128717!2d-46.64200742478574!3d-23.634439164280845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5afae092693d%3A0xf823896922271ef9!2sSenac%20Jabaquara!5e0!3m2!1spt-BR!2sbr!4v1732145862256!5m2!1spt-BR!2sbr';
  
    } elseif ($rua == 'Av. Frei Orestes Girardi, 3549') {
      $localizacao = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3680.1857172157706!2d-45.579846424818506!3d-22.721337531269366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cc884b6b6c0513%3A0x27b5e18e02518691!2sCentro%20Universit%C3%A1rio%20Senac%20-%20Campos%20do%20Jord%C3%A3o!5e0!3m2!1spt-BR!2sbr!4v1732146044885!5m2!1spt-BR!2sbr';
  
    } elseif ($rua == 'Rua Sacramento, 490') {
      $localizacao = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.385633529476!2d-47.06379632481216!3d-22.899142837597733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8c8ad9bce3363%3A0x7470022cd79a39c4!2sSenac%20Campinas!5e0!3m2!1spt-BR!2sbr!4v1732146445502!5m2!1spt-BR!2sbr';
    }
  
    $rede_facebook = "<i class='bi bi-facebook fs-2 icone_f'></i>";
    $rede_instagram = "<i class='bi bi-instagram fs-2 icone_i'></i>";
    $rede_linkedin = "<i class='bi bi-linkedin fs-2 icone_l'></i>";
    $rede_tiktok = "<i class='bi bi-tiktok fs-2 icone_t'></i>";
    $rede_whatsapp = "<i class='bi bi-whatsapp fs-2 icone_w'></i>";
    $rede_youtube = "<i class='bi bi-youtube fs-2 icone_y'></i>";
  
  
    // $lista_array = [];
  
    // # iterar sobre o array de URL da API
    // foreach ($contato['contatos'] as $url) {
  
    //   # iterar sobre o array das redes sociais
    //   foreach ($array_redes as $chave => $valor) {
    //     if(strpos($url, $chave)) {
  
    //       $lista_array[] = $valor;
    //       $lista_de_redes .= $valor;
    //     }
    //   }
    // }
  
    // # junta os ícones em uma única string
    // $lista_array = implode(" ", array_unique($lista_array));
  
    foreach ($contato['contatos'] as $rede) {
  
      $rede_null = 'd-none';
  
      switch (true) {
  
        case strpos($rede, 'facebook')!== false:
          $lista_de_redes .= "<a href='$rede' class='m-2'>$rede_facebook</a>";
          break;
  
        case strpos($rede, 'instagram')!== false:
          $lista_de_redes .= "<a href='$rede' class='m-2'>$rede_instagram</a>";
          break;
  
          case strpos($rede, 'youtube')!== false:
          $lista_de_redes .= "<a href='$rede' class='m-2'>$rede_youtube</a>";
          break;
  
        case strpos($rede, 'tiktok')!== false:
          $lista_de_redes .= "<a href='$rede' class='m-2'>$rede_tiktok</a>";
          break;
  
        case strpos($rede, 'linkedin')!== false:
          $lista_de_redes .= "<a href='$rede' class='m-2'>$rede_linkedin</a>";
          break;
  
        case strpos($rede, 'whatsapp')!== false:
          $lista_de_redes .= "<a href='$rede' class='m-2'>$rede_whatsapp</a>";
          break;
        
        default:
          $lista_de_redes .= "<span class='btn btn-sm btn-secondary rounded-pill $rede_null'></span>";
          break;
      }
    }
    
    # criar a estrutura HTML
    $lista .="
      <div class='col-md-12 mb-4'>
        <div class='card shadow rounded-3'>
          <div class='card-header header d-flex flex-column'>
            <h4 class='mt-2 text-white fw-semibold'>Senac</h5>
            <p class='text-white'><span class='fw-medium'>Endereço:</span> $rua - $bairro - $cidade</p>
            <p class='text-white'><span class='fw-medium'>Horário de funcionamento:</span> $horario</p>
          </div>
  
          <div class='card-body'>
            <iframe src=$localizacao width='100%' height='450' style='border:0' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'>
          </iframe>
          </div>
  
          <div class='card-footer'>
            $lista_de_redes
          </div>
        </div>
      </div>
    ";
  }

} else {
  $lista ="<div class='alert alert-danger'><i class='bi bi-exclamation-diamond-fill'></i> $erro</div>";
}


# faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

# substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[titulo]]", "<span class=''><svg xmlns='http://www.w3.org/2000/svg' width='36' height='36' viewBox='0 0 24 24' style='fill: rgba(50, 93, 136, 1);transform: ;msFilter:;'><path d='M21 2H6a2 2 0 0 0-2 2v3H2v2h2v2H2v2h2v2H2v2h2v3a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zm-8 2.999c1.648 0 3 1.351 3 3A3.012 3.012 0 0 1 13 11c-1.647 0-3-1.353-3-3.001 0-1.649 1.353-3 3-3zM19 18H7v-.75c0-2.219 2.705-4.5 6-4.5s6 2.281 6 4.5V18z'></path></svg><span><span><strong class='ms-2'>CONTATOS</strong></span>", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[js]]", "", $html);

echo $html;