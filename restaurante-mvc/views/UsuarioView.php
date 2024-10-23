<?php

foreach ($lista_usuarios as $usuario) {
  $idUsuario = $usuarios['idUsuario'];
  $nome = $usuarios['nome'];
  $usuario = $usuarios['usuario'];
  $nivelAcesso = $usuarios['nivelAcesso'];


  // if (isset($_COOKIE['nivelAcesso'])) {
  //   $nivelAcesso = $_COOKIE["nivel_acesso"];

  //   if ($nivelAcesso == 3) {
  //     $nivel_3 = "d-none";
  //   } elseif ($nivelAcesso == 2) {
  //     $nivel_2 = "d-none";
  //   } else {
  //     $nivel_1;
  //   }
  // } else {
  //   if (isset($_COOKIE['nivelAcesso'])) {
  //     $nivelAcesso = $_COOKIE["nivel_acesso"];

  //     if ($nivelAcesso == 3) {
  //       $nivel_3 = "d-none";
  //     } elseif ($nivelAcesso == 2) {
  //       $nivel_2 = "d-none";
  //     } else {
  //       $nivel_1;
  //     }
  //   }
  // }

  # cria os cards HTML com os dados das mesas
  $lista .= "
    <td class='text-center '>$idUsuario</td>
      <td class='text-center'>$nome</td>
      <td class='text-center'>R$ $usuario</td>
      <td class='text-center'>$nivelAcesso</td>
      
      <td class='text-center $nivel_3'>
          <a class='btn btn-primary' href='[[base-url]]/cardapio-adm/editar/$idCardapio'
          onclick=\"return confirm('Confirma a edição do cardápio $idCardapio?')\">
            <i class='bi bi-pencil-square'></i> Editar</a>
      </td>
      <td class='text-center $nivel_2 $nivel_3'>
          <a class='btn btn-danger opacity-75' href='[[base-url]]/cardapio-adm/excluir/$idCardapio'
          onclick=\"return confirm('Confirma a exclusão do cardápio $idCardapio?')\">
            <i class='bi bi-trash'></i> Exluir</a>
      </td>
    </tr>
  ";
}

// $colunaTabela .= "
//     <div class=''>
//     <th class='text-center $nivel_3'>Editar</th>
//     <th class='text-center $nivel_2 $nivel_3'>Excluir</th>
//     </div>
//     ";


$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/tabela-usuario.html");

# substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[usuario]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
// $html = str_replace("[[coluna-tabela]]", $colunaTabela, $html);

echo $html;