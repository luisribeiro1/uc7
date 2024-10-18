<?php

# itera sobre o array que foi criado com o controller e que contém os dados das mesas
$lista = "";
foreach ($lista_de_mesas as $mesa) {
  $id = $mesa['id'];
  $lugares = $mesa['lugares'];
  $tipo = $mesa['tipo'];
  
  $nivelAcesso = $_SESSION["nivel_acesso"];
  $nivel_1 = "";
  $nivel_2 = "";
  $nivel_3 = "";
  
  if ($nivelAcesso == 3) {
    $nivel_3 = "d-none";
  } elseif ($nivelAcesso == 2) {
    $nivel_2 = "d-none";
  } else {
    $nivel_1;
  }

  # cria os cards HTML com os dados das mesas
  $lista .= "
    <div class='col-md-3 mb-3'>
      <div class='card'>
          <div class='card-body'>
            <strong class='fs-5 text-primary'>Mesa: <span class='text-danger'>#$id</span></strong></br>
            <span class='p-2 fs-6'>$tipo com $lugares lugares.</span>
          </div>

          <div class='card-footer d-flex justify-content-between $nivel_3'> 
            <b><a class='text-primary text-decoration-none' href='[[base-url]]/mesa-adm/editar/$id' 
            onclick=\"return confirm('Confirma a edição do cardápio $id?')\"> <i class='bi bi-pencil-square'></i> Editar</a></b>
            
            <b><a class='text-danger text-decoration-none $nivel_2' href='[[base-url]]/mesa-adm/excluir/$id' 
              onclick=\"return confirm('Confirma a exclusão da mesa $id?')\">
              <i class='bi bi-trash'></i> Excluir</a></b>
          </div>
      </div>
    </div>
  ";
}

# faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/mesaList.html");

# substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;
