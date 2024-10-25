<?php

$lista = "";

// interar sobre o array que foi criado no controller  e que contem os dados da mesas
foreach ($lista_de_usuario as $usuarios) {
     
      $idUsuario = $usuarios["idUsuario"];
      $nome = $usuarios["nome"];
      $usuario = $usuarios["usuario"];
      $senha = $usuarios["senha"];
      $nivelAcesso = $usuarios["nivelAcesso"];

      $linkEditar = " <a class= 'text-primary me-2 text-decoration-none'href='[[base-url]]/usuario-adm/editar/$idUsuario'><i class= 'bi bi-pencil-square'></i>Editar</a> ";
      

      if($_SESSION["nivel_usuario"] == 2){
            $linkExcuir = "";
      }elseif($_SESSION["nivel_usuario"] == 3){
            $linkEditar =  "";
            $linkExcuir = "";
      }
      

      # cria os dados HTML com os dados das mesas 
      $lista.="
      <div class='col-md-3 mb-4'>                               
      <div class= 'card'>
      <div class='card-body'>
      <strong>$idUsuario<br></strong>
      $usuario<br>
      $nome <br>
      <p> nivel acesso : $nivelAcesso</>
      

      </div>
      <div class= 'card-footer'>
     $linkEditar
   
      
      

      </div>
      </div>
      </div>

      ";
}

// faz a leitura dos arquivos de templastes e armazena nas variaveis
$header = file_get_contents("views/html/header.html");
$footer = file_get_contents("views/html/footer.html");
$html = file_get_contents("views/html/usuarioList.html");

// substituir a tag [[header]] pelo conteúdo da variavel $header. o mesmo acontece com as demais variaveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;