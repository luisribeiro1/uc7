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
      <span class="fs-4"><i class="bi bi-grid-fill me-1"></i>Cadastro e edição de Mesas</span>
    </div>
    <div class="col-md-6 text-end">
      <a href="<?= $baseUrl ?>/mesa-adm" class="btn btn-primary btn-sm ">
        <i class="bi bi-arrow-left me-1"></i>Voltar

      </a>
      |
     
    </div>
  </div>
</section>

  <section class="container mt-4">
    <div class="row">
    <div class="col-md-6">
        <form action="<?= $baseUrl ?>/mesa-adm/atualizar" method="post">
            <label>Número:</label>
            <input type="text" class="form-control" name="id" id="id" value="<?= $id?>" require>
            <br>
            

            <label>Tipo:</label>
            <select name="tipo" id="tipo" class="form-select">
                <?= $tipo ?>
            </select>
            <br>


            <label>Lugares:</label>
            <input type="number" class="form-control" name="lugares" id="lugares" value="<?= $lugares ?>"
            require min="0" step="1">
            <br>
            
            <button type="submit" class="btn btn-primary">Salvar alterações</button>
            <input type='hidden' name='acao' value='<?= $acao?>'></input>
        </form>

    </div>
  </div>
  </section>
</main>

<?php

echo $footer;
?>



