<?php

$lista = "";
$colunaTabela = "";

$nivel_1 = "";
  $nivel_2 = "";
  $nivel_3 = "";
  $nivelAcesso = "";

foreach ($lista_usuarios as $usuarios) {
  $idUsuario = $usuarios['idUsuario'];
  $nome = $usuarios['nome'];
  $usuario = $usuarios['usuario'];
  $nivelAcesso = $usuarios['nivelAcesso'];
  
  if (isset($_SESSION['nivelAcesso'])) {
    $nivelAcesso = $_SESSION['nivel_acesso'];

    if ($nivelAcesso == 3) {
      $nivel_3 = 'd-none';
    } elseif ($nivelAcesso == 2) {
      $nivel_2 = 'd-none';
    } else {
      $nivel_1;
    }
  } else {
    if (isset($_COOKIE['nivelAcesso'])) {
      $nivelAcesso = $_COOKIE['nivel_acesso'];

      if ($nivelAcesso == 3) {
        $nivel_3 = 'd-none';
      } elseif ($nivelAcesso == 2) {
        $nivel_2 = 'd-none';
      } else {
        $nivel_1;
      }
    }
  }

  # cria os cards HTML com os dados das mesas
  $lista .= "
    <td class='text-center px-5'>$idUsuario</td>
      <td class='text-left px-5'>$nome</td>
      <td class='text-left px-5'>$usuario</td>
      <td class='text-center px-5'>$nivelAcesso</td>
      
      <td class='text-center $nivel_3'>
          <a class='btn btn-sm btn-primary' href='[[base-url]]/usuario-adm/editar/$idUsuario'
          onclick=\"return confirm('Confirma a edição do usuário $idUsuario?')\">
            <i class='bi bi-pencil-square'></i> Editar</a>
      </td>
      <td class='text-center $nivel_3'>
          <a class='btn btn-sm btn-secondary' href='[[base-url]]/usuario-adm/alterarSenha/$idUsuario'
          onclick=\"return confirm('Confirma a edição da senha $idUsuario?')\">
            <i class='bi bi-pencil-square'></i> Editar Senha</a>
      </td>
      <td class='text-center $nivel_2 $nivel_3'>
          <a class='btn btn-sm btn-danger opacity-75' href='[[base-url]]/usuario-adm/excluir/$idUsuario'
          onclick=\"return confirm('Confirma a exclusão do usuário $idUsuario?')\">
            <i class='bi bi-trash'></i> Exluir</a>
      </td>
    </tr>
  ";
}

$colunaTabela .= "
    <div class=''>
    <th class='text-center $nivel_3'>Editar</th>
    <th class='text-center $nivel_3'>Alterar Senha</th>
    <th class='text-center $nivel_2 $nivel_3'>Excluir</th>
    </div>
    ";


$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/tabela-usuario.html");

# substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[usuario]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[coluna-tabela]]", $colunaTabela, $html);
$html = str_replace("[[js]]", "", $html);

echo $html;