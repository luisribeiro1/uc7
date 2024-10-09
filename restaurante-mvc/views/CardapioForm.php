<?php

$header = file_get_contents("views/html/header.html");
$footer = file_get_contents("views/html/footer.html");
$header = str_replace("[[base-url]]",$baseUrl,$header); 
echo $header;
?>

<main>
<section class="container mt-4">
    <div class="row">
<div class="col-md-6">
<span class="fs-5"><i class="bi bi-grid-fill me-1"></i> Cadatro e edição de Cardapio</span>
</div>


    <div class="col-md-6 text-end">
    <a href="<?=$baseUrl?>/cardapio-adm" class="btn btn-danger btn-sm">VOLTAR</a>
    |
    

    </div>

    </div>
</section>




    <section class="container mt-4">
        <div class="row">
           <div class="col-md-6">

          <form action="<?= $baseUrl ?>/cardapio-adm/atualizar/"  method="post">
            <label>Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" value="<?= $nome ?>" require>
            <br>

            <label>Preço:</label>
            <input type="number" class="form-control" name="preco" id="preco" value="<?= $preco ?>"  required min="0" step="0.01">
            <br>

            <label>tipo:</label>
            <select type="tipo" id="tipo" class="form-select" name="tipo">
                <?= $tipo ?>
           </select>
            <br>

            <label>Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"><?= $descricao ?></textarea>
            <br>

            <label>Foto:</label>
            <input type="text" class="form-control" name="foto" id="foto" value="<?= $foto ?>">
            <br>

            <label>Status:</label>
            <input type="checkbox" class="form-check-input" name="status" id="status" value="1 <? $status ?>">
            <br><br>

            <button type="submit" class="btn btn-primary">Salvar alterações</button>
            <input type="hidden" name="acao" value="<?=$acao?>">
            <input type="hidden" name="idCardapio" value="<?=$idCardapio?>">



          </form>
           
           </div>
        </div>
    </section>
</main>

<?php
echo $footer;
?>