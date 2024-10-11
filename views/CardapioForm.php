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
        <span class="fs-4"><i class="bi bi-pencil-square"></i> Cadastro e edição de cardápio</span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl ?>/cardapio-adm" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i> Voltar</a>
      </div>
    </div>
  </section>
  
  <section class="container mt-4">
    <div class="row">
        <div class="col-md-6">

            <form action="<?= $baseUrl ?>/cardapio-adm/atualizar" method="post">
                <label>Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" value="<?= $nome ?>" require placeholder="Nome do Prato">
                <br>
                
                <label>Preço:</label>
                <input type="number" class="form-control" name="preco" id="preco" require value="<?= $preco ?>" min="0" step="0.01" placeholder="Valor do prato">
                <br>
                
                <label>Tipo do prato:</label>
                <select name="tipo" id="tipo" class="form-select">
                    <?= $tipo ?>
                </select>
                <br>

                <label>Descrição:</label>
                <textarea name="descricao" id="descricao" class="form-control"><?= $descricao ?></textarea>
                <br>
                
                <label>Status:</label>
                <input type="checkbox" class="form-check-input" name="status" id="status" <?= $status ?>>
                <br>
                <br>
                    
                <label>Foto:</label>
                <input type="text" class="form-control" name="foto" id="foto" value="<?= $foto ?>"  placeholder="Foto do Prato">
                <br>
                <br>

                <button type="Submit" class="btn btn-primary">Salvar alterações</button>
                <input type="hidden" name="acao" value="<?= $acao ?>">
                <input type="hidden" name="idCardapio" value="<?= $idCardapio ?>">
            </form>

        </div>
    </div>
  </section>
</main>

<?php
echo $footer;
?>