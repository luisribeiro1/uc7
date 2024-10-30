<?php

$opcao_senha ="
<label for=\"senha\" class=\"form-senha\">Senha:</label>
<input type=\"text\" class=\"form-senha form-control\" name=\"senha\" id=\"senha\" required>";

// if($acao =="editar"){
//   $opcao_senha = "";
// }

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $url, $header);

echo $header;
?>

<main>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <span class="fs-4"><i class="bi bi-pencil-square"></i> Alteração de Senha</span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl ?>/mesa-adm" class="btn btn-primary btn-sm">
          <i class="bi bi-arrow-left"></i> Voltar</a>
      </div>
    </div>
  </section>

  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        
        <form action="<?= $url ?>/usuario/atualizarSenha/<?=$idUsuario ?>" method="post">
            <?= $opcao_senha ?>
            <br>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>      

      </div>
    </div>
  </section>
</main>


<?php
echo $footer;
?>