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
        <span class="fs-4"><span class="text-primary"><i class="bi bi-pencil-square"></i></span><strong> Cadastro e edição de Mesas</strong></span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl ?>/mesa-adm" class="btn btn-sm btn-primary btns"><b><i class="bi bi-arrow-left me-1"></i></b>VOLTAR</a>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-6">

        <form action="<?= $baseUrl ?>/usuario-adm/atualizar" method="post">

        <label for="id">Número da mesa:</label>
          <input class="form-control" type="number" name="id" id="id" min="1" value="<?= $id ?>">
          <br>

          <label for="lugares">Quantidade de lugares:</label>
          <input class="form-control" type="number" name="lugares" id="lugares" min="1" value="<?= $lugares ?>">
          <br>

          <label for="tipo">Tipo de mesa:</label>
          <select class="form-select" type="text" name="tipo" id="tipo" value="<?= $tipo ?>">
            <?= $tipo ?>
          </select>
          <br>

          <button class="btn btn-primary mt-3" type="submit">Salvar alterações</button>
          
          <input type="hidden" name="acao" value="<?= $acao ?>">
          
        </form>
        
      </div>
    </div>
  </section>
</main>

<?php
echo $footer;
?>