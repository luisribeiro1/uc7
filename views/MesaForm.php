<?php

$somente_leitura = $acao == "criar" ? "" : "readonly";
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);


echo $header;
?>

<main>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <span class="fs-4"><i class="bi bi-pencil-square"></i> Cadastro e edição de Mesas</span>
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
        
        <form action="<?= $baseUrl ?>/mesa-adm/atualizar" method="post">
            
            <label>Número da Mesa:</label>
            <input type="number" class="form-control" name="id" id="id" require min="0" step="1" value="<?= $id ?>" required <?= $somente_leitura ?>>
            <br>
            
            <label>Quantidade de Lugares:</label>
            <!-- <input type="number" class="form-control" name="lugares" id="lugares" require min="0" step="1" value="<?= $lugares ?>" min="2" max="8" required> -->
            <select name="lugares" id="lugares" class="form-select" required>
              <?= $lugares ?>
            </select>
            <br>
            
            <label>Formato da Mesa:</label>
            <select name="tipo" id="tipo" class="form-select" required>
                <?= $tipo ?>
            </select> 
           
            <br>
            <br>

            <button type="submit" class="btn btn-primary">Salvar alterações</button>
            <input type="hidden" name="acao" value="<?= $acao ?>">
            
        </form>      

      </div>
    </div>
  </section>
</main>


<?php
echo $footer;
?>