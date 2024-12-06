<?php

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);

echo $header;
?>

<main>
    <section class="container mt-4">
        <div class="row">
            <div class="col-6">
                <span class="fs-4 fw-bold text-primary"><i class="bi bi-grid-fill"></i> Formulário de cardápio</span>
            </div>
            <div class="col-6 text-end">
                <a class='btn btn-sm btn-primary' href='<?= $baseUrl ?>/cardapio-adm'><i class='bi bi-arrow-left'></i> VOLTAR</a> | 
            </div>
        </div>
    </section>
    <section class="container mt-3">
        <div class="row">
            <div class="col-md-6">

                <form action="<?= $baseUrl ?>/cardapio-adm/atualizar/<?= $idCardapio ?>" method="post">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="<?= $nome ?>" required><br>

                    <label for="preco">Preço:</label>
                    <input type="number" class="form-control" name="preco" id="preco" value="<?= $preco ?>" required min="0" step="0.01"><br>

                    <label for="tipo">Tipo:</label>
                    <select name="tipo" id="tipo" class="form-select" required>
                        <?= $tipo ?>
                    </select>
                    <br>

                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" id="descricao" class="form-control"minlength="30" required><?= $descricao ?></textarea>

                    <label for="foto">Foto:</label>
                    <input type="url" class="form-control" name="foto" id="foto" value="<?= $foto ?>" required><br>
                    
                    <label for="foto">Status:</label>
                    <input type="checkbox" class="form-check-input" name="status" id="status" value="1" <?= $status ?>><br><br>
                    
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    <input type="hidden" id="acao" name="acao" value="<?= $acao ?>">
                    <input type="hidden" id="idCardapio" name="idCardapio" value="<?= $idCardapio ?>">
                </form>

            </div>
        </div>
    </section>
</main>

<?php
echo $footer;
?>