<?php 

$header = file_get_contents("views/template/html/header.html");
$footer = file_get_contents("views/template/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);

echo $header;
?>

<main>
    <section class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <span class="fs-5"><i class="bi bi-grid-fill"></i> Cadastro e Edição de Itens do Cardápio</span>
            </div>

            <div class="col-md-6 text-end">
                <a href="<?= $baseUrl ?>cardapio-adm" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle"></i> Voltar
                </a>
            </div>
        </div>
    </section>
    
    <section class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <form action="<?= $baseUrl ?>/cardapio-adm/atualizar/<?=$idCardapio?>" method="post">
                    <label>Nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="<?= $nome?>"required> 
                    <br>

                    <label>Preco:</label>
                    <input type="number"class="form-control" name="preco" id="preco" required min="0" step="0.01" value="<?= $preco?>">
                    <br>

                    <label>Tipo:</label>
                    <select name="tipo"  id="tipo"  class="form-select">
                        <?= $tipo ?>
                    </select>     
                    <br>

                    <label>Descricao:</label>
                    <textarea name="descricao" id="descricao" class="form-control"><?= $descricao ?></textarea>                                    
                    <br>
                    

                    <label>Foto:</label>
                    <input type="text"class="form-control" name="foto" value="<?=$foto ?>">                    
                    <br></input>  

                    <label>Status:</label>
                    <input type="checkbox" class="form-check-input"value="1" <?=$status?> name="status" id="status"  checked> 
                    <br><br>

                    <button type="submit" class="btn btn-primary">Salvar Alteracoes</button>
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