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
        <span class="fs-4"><i class="bi bi-pencil-square"></i> Cadastro e edição de Mesa</span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl ?>/cardapio-adm" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i> Voltar</a>
      </div>
    </div>
  </section>
  
  <section class="container mt-4">
    <div class="row">
        <div class="col-md-6">

            <form action="<?= $baseUrl ?>/mesa-adm/atualizar" method="post">   
                <label>Número da mesa:</label>
                <input type="number" class="form-control" name="mesa" id="mesa" require min="1" step="1">
                <br>

                <label>Números de Lugares:</label>
                <input type="number" class="form-control" name="lugares" id="lugares" require min="1" step="1">
                <br>
                
                <label>Formato da Mesa:</label>
                <select name="tipo" id="tipo" class="form-select">
                    <?= $tipo ?>
                </select>
                <br>

                <button type="Submit" class="btn btn-primary">Salvar alterações</button>
            </form>

        </div>
    </div>
  </section>
</main>

<?php
echo $footer;
?>