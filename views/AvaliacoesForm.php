<?php

# Faz a leitura dos arquivos de templates e armazena nas variaveis
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);

echo $header;
?>

<main>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <span class="fs-4"><i class="bi bi-grid-fill me-1"></i>Cadastro e edição de Cardápio</span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl ?>/avaliacoes-adm" class="btn btn-primary btn-sm">
        <i class="bi bi-arrow-left me-1"></i>Voltar
      </a>
      
    </div>

  </section>


  <section class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            <form action="<?= $baseUrl ?>/avaliacoes-adm/atualizar" method="post">
                <label>Nota:</label>
                <input type="number" class="form-control" name="nota" id="nota" value="<?= $nota ?>" require min="0" max="5" step="0.5">
                <br>
                
                <label>Comentário:</label>
                <textarea class="form-control" name="comentario" id="comentario"><?= $comentario ?></textarea>
                <br>

                <label>Data:</label>
                <input type="date" class="form-control" name="data" id="data" require min="0" step="0.01" value="<?= $data ?>">
                <br>
                
                <label>Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" value="<?= $nome ?>" require>
                <br>

                <label>Email:</label>
                <input name="email" id="email" class="form-control" value="<?= $email ?>" require>
                    <?= $email ?>
                </input>
                <br><br>
                    
                
                <label>Situação:</label>
                <!-- <input type="text" class="form-control" name="foto" id="foto" value="<?= $foto ?>"> -->
                <br>
                
                <label>Nº do Item do Cardápio:</label>
                <input type="number" class="idCardapio" name="idCardapio" id="idCardapio" value="<?= $idCardapio ?>">
                <br><br>

                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                <input type="hidden" name="acao" value="<?= $acao ?>">
                <input type="hidden" name="idCardapio" value="<?= $idAvaliacoes ?>">

            </form>
        </div>
    </div>
  </section>
</main>

<?php

echo $footer;
?>