<?php

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);

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
        
        <form action="<?= $baseUrl ?>/usuario/atualizarSenha/<?= $idUsuario ?>" method="post">
          <div class="form-floating mb-3">
            <input type="text" name="senha" id="senha" class="form-control">
            <label for="senha"><i class="bi bi-key-fill"></i> Nova senha</label>
          </div>
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