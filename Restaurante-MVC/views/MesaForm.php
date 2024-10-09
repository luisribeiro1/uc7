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
                <span class="fs-5"><i class="bi bi-grid-fill"></i> Cadastro e Edição de Mesas</span>
            </div>

            <div class="col-md-6 text-end">
                <a href="<?= $baseUrl ?>mesa-adm" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle"></i> Voltar
                </a>
            </div>
        </div>
    </section>
    
    <section class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <form action="<?= $baseUrl ?>/mesa-adm/atualizar/<?=$idMesas?>" method="post">
                    <label>Número da Mesa:</label>
                    <input type="text" class="form-control" name="numero" id="numero" required> 
                    <br>

                    <label>lugares:</label>
                    <input type="number" class="form-control" name="lugares" id="lugares" required min="1"> 
                    <br>

                    <label>Tipo de Mesa:</label>
                    <select name="tipo" id="tipo" class="form-select"> 
                        <?= $tipo ?>                    
                    </select>
                    <br>

                    <label>Status:</label>
                    <input type="checkbox" class="form-check-input" name="status" id="status" value="1"> 
                    <br><br>

                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                   
                </form>
            </div>  
        </div>
    </section>
</main>

<?php 
echo $footer;
?>
