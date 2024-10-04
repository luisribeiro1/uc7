<?php
$header = file_get_contents('views/templates/html/header.html');
$footer = file_get_contents('views/templates/html/footer.html');
$header = str_replace("[[base-url]]", $baseUrl, $header);

echo $header;
?>

<main>
<section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <span class="fs-4"><i class="bi bi-grid-fill me-1"></i>Cadastro e edição de mesas</span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl?>/mesa-adm" class="btn btn-warning btn-sm"><i class="bi bi-arrow-left me-1"></i>VOLTAR</a> |
      </div>
    </div>
  </section>

  <section class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <form action="<?= $baseUrl ?>/mesa-adm/atualizar" method="post" >
                <label>Número da Mesa:</label>
                <input type="number" class="form-control" name="id" id="id" require></input>
                <br>
                
                <label>Quantidade de Lugares:</label>
                <input type="number" class="form-control" name="lugares" id="lugares" require></input>
                <br>
                
                <label>Tipo da Mesa:</label>
                    <select class="form-select" name="tipo" id="tipo" require>    
                        <?= $tipo?>
                    </select>
                <br>

                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            </form>
        </div>
    </div>
  </section>
</main>

<?php
echo $footer;

?>

