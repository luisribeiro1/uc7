<?php

$header = file_get_contents("views/html/header.html");
$footer = file_get_contents("views/html/footer.html");
$header = str_replace("[[base-url]]",$url,$header);
echo $header;
?>

<main>
<section class="container mt-4">
    <div class="row">
<div class="col-md-6">
<span class="fs-5"><i class="bi bi-grid-fill me-1"></i> Cadatro e edição da Mesa</span>
</div>


    <div class="col-md-6 text-end">
    <a href="<?=$baseUrl?>/mesa-adm" class="btn btn-danger btn-sm">VOLTAR</a>
    |
    

    </div>

    </div>
</section>




    <section class="container mt-4">
        <div class="row">
           <div class="col-md-6">

          <form action="<?= $url ?>/mesa-adm/atualizar" method="post">

          <label>Numero:</label>
            <input type="number" class="form-control" name="id" id="id" require min="0" step="0.01">
            <br>


            <label>Lugares:</label>
            <input type="text" class="form-control" name="lugares" id="lugares" require>
            <br>

         
            <label>tipo:</label>
            <select type="tipo" id="tipo" name="tipo" class="form-select">
                <?= $tipo ?>
           </select>
            <br>

            
            <button type="submit" class="btn btn-primary">Salvar alterações</button>
            <input type="hidden" name="acao" value="<?=$acao?>">


          </form>
           
           </div>
        </div>
    </section>
</main>

<?php
echo $footer;
?>