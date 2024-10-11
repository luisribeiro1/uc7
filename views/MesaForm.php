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
      <span class="fs-4">Adicionar uma mesa</span>
    </div>
    <div class="col-md-6 text-end">
      <a href="<?= $baseUrl ?>/mesa-adm" class="btn btn-primary btn-md rounded-4">
        <i class="bi bi-arrow-left"></i>Voltar
      </a>
    </div>
  </div>
</section>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <form action="<?= $baseUrl ?>/mesa-adm/atualizar" method="post">
            <label>ID: </label>
            <input type="text" name="id" id="id" class="form-control" value="<?= $id ?>" require></input>
            <br>

            <label>Lugares: </label>
            <select name="lugares" id="lugares" class="form-select" require>
                <?= $lugares ?>
            </select>
            <br>

            <label>Tipo: </label>
            <select name="tipo" id="tipo" class="form-select" require>
                <?= $tipo ?>
            </select>
            <br>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <input type="hidden" name="acao" value="<?= $acao ?>">
        </form>
      </div>
    </div>
  </section>
</main>

<?php

echo $footer;

?>