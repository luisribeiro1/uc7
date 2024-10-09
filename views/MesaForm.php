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
      <span class="fs-4"><i class="bi bi-grid-fill"></i>Cadastro e edição de Mesas</span>
    </div>
    <div class="col-md-6 text-end">
      <a href="<?= $baseUrl ?>/mesa-adm" class="btn btn-primary btn-md rounded-4">
        <i class="bi bi-arrow-left"></i> VOLTAR
      </a>
      
    </div>
  </div>
</section>



  <section class="container mt-4">
    <div class="row">
        <div class="col-md-6">

            <form action="<?= $baseUrl ?>/mesa-adm/atualizar" method="post" >
                <label> Mesa ID: </label>
                <input type="text" class="form-control" name="id" id="id" value="<?=$id?>" require></input>
                <br>

                <label> Lugares:</label>
                <select name="lugares" id="lugares"  class="form-select" require>
                    <?= $lugares ?>    
                </select>
                <br>
                
                <label> tipo:</label>
                <select name="tipo" id="tipo" class="form-select" require >
                    <?= $tipo ?>    
                </select>
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
