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
        <a href="<?= $baseUrl ?>/cardapio-adm" class="btn btn-primary btn-sm">
        <i class="bi bi-arrow-left me-1"></i>Voltar
      </a>
      
    </div>

  </section>


  <section class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            <form action="<?= $baseUrl ?>/cardapio-adm/atualizar" method="post">
            
                <label>Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" value="<?= $nome ?>" require>
                <br>
                
                <label>Preço:</label>
                <input type="number" class="form-control" name="preco" id="preco" require min="0" step="0.01" value="<?= $preco ?>">
                <br>
                
                <label>Tipo:</label>
                <select name="tipo" id="tipo" class="form-select">
                    <?= $tipo ?>
                </select>
                <br><br>
                    
                <label>Descrição:</label>
                <textarea class="form-control" name="descricao" id="descricao"><?= $descricao ?></textarea>
                <br>
                
                <label>Foto:</label>
                <input type="text" class="form-control" name="foto" id="foto" value="<?= $foto ?>">
                <br>
                
                <label>Status:</label>
                <input type="checkbox" class="form-check-input" name="status" id="status" value="1"<?= $status ?>>
                <br><br>

                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
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