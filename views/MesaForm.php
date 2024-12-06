<?php

$somente_leitura = $acao == "criar" ? "" : "readonly";

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);
$footer = str_replace("[[js]]","", $header);

echo $header;
?>

<main>
    <section class="container mt-4">
        <div class="row">
            <div class="col-6">
                <span class="fs-4 fw-bold text-primary"><i class="bi bi-grid-fill"></i> Formulário de mesa</span>
            </div>
            <div class="col-6 text-end">
                <a class='btn btn-sm btn-primary' href='<?= $baseUrl ?>/mesa'><i class='bi bi-arrow-left'></i> VOLTAR</a> | 
            </div>
        </div>
    </section>
    <form action="<?= $baseUrl ?>/mesa-adm/atualizar/<?= $id ?>" method="post">
    <section class="container mt-3">
        <div class="row">
            <div class="col-md-3">

                
                    <label for="id">Número:</label>
                    <input type="number" class="form-control" name="id" id="id" value="<?= $id ?>" required<?=$somente_leitura?>><br>

                    <label for="lugares">Lugares:</label>
                    <select name="lugares"id="lugares"class="form-select"required><?= $lugaresOptions ?></select>
                    <!-- <input type="number" class="form-control" name="lugares" id="lugares" value="<?= $lugares ?>" min="2" max="8" required></input><br>  (erro tem que corrigir) -->
                    
                    <label for="estilo">Tipo:</label>
                    <input type="tipo" class="form-control" name="tipo" id="tipo" value="<?= $tipo ?>" required><br>
                    
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    <input type="hidden" id="acao" name="acao" value="<?= $acao ?>">
                    <input type="hidden" name="id" value="<?= $id ?>">
                

            </div>
 
        <div class="col-md-3 pt-3">
            <div class="card">
                <div class="card-body">
                    <?= checkboxCaracteristicas("fumantes","Fumantes" ,$arrayCaracteristicas)?>
                    <?= checkboxCaracteristicas("pet-friendy","Pet-friendy", $arrayCaracteristicas)?>
                    <?= checkboxCaracteristicas("ar=condicionado","Ar-condicionado", $arrayCaracteristicas)?>
                    <?= checkboxCaracteristicas("area-alerta","Area aberta", $arrayCaracteristicas)?>
                    <?= checkboxCaracteristicas("acessibilidade","Acessibilidade", $arrayCaracteristicas)?>
                    <?= checkboxCaracteristicas("privacidade","Privacidade", $arrayCaracteristicas)?>
                    <?= checkboxCaracteristicas("espaço-Kids","Espaço-Kids", $arrayCaracteristicas)?>
                </div>

            </div>
        </div>
        <div class="col-md-6 pt-3">
            <div class="card">
                <div class="card-body">
                    <div class ="d-flex justify-content-between">
                        <span class='w-25'>Segunda-feira</span> 
                      <?= checkboxDisponibilidade("segunda-manha","Manha",$arrayPeriodos)?>
                      <?= checkboxDisponibilidade("segunda-tarde","Tarde",$arrayPeriodos)?>
                      <?= checkboxDisponibilidade("segunda-noite","Noite",$arrayPeriodos)?>
                    </div>                   
                    <div class ="d-flex justify-content-between">
                        <span class='w-25'>Terca-feira</span> 
                      <?= checkboxDisponibilidade("terca-manha","Manha",$arrayPeriodos)?>
                      <?= checkboxDisponibilidade("terca-tarde","Tarde",$arrayPeriodos)?>
                      <?= checkboxDisponibilidade("terca-noite","Noite",$arrayPeriodos)?>
                    </div>                   
                    <div class ="d-flex justify-content-between">
                        <span class='w-25' >Quarta-feira</span> 
                      <?= checkboxDisponibilidade("quarta-manha","Manha",$arrayPeriodos)?>
                      <?= checkboxDisponibilidade("quarta-tarde","Tarde",$arrayPeriodos)?>
                      <?= checkboxDisponibilidade("quarta-noite","Noite",$arrayPeriodos)?>
                    </div>                   
                    <div class ="d-flex justify-content-between">
                        <span class='w-25'>Quinta-feira</span> 
                      <?= checkboxDisponibilidade("quinta-manha","Manha",$arrayPeriodos)?>
                      <?= checkboxDisponibilidade("quinta-tarde","Tarde",$arrayPeriodos)?>
                      <?= checkboxDisponibilidade("quinta-noite","Noite",$arrayPeriodos)?>
                    </div>                   
                    <div class ="d-flex justify-content-between">
                        <span class='w-25'>Sexta-feira</span> 
                      <?= checkboxDisponibilidade("sexta-manha","Manha",$arrayPeriodos)?>
                      <?= checkboxDisponibilidade("sexta-tarde","Tarde",$arrayPeriodos)?>
                      <?= checkboxDisponibilidade("sexta-noite","Noite",$arrayPeriodos)?>
                    </div>                   
                    <div class ="d-flex justify-content-between">
                        <span class='w-25'>Sabado</span> 
                      <?= checkboxDisponibilidade("sabado-manha","Manha",$arrayPeriodos)?>
                      <?= checkboxDisponibilidade("sabado-tarde","Tarde",$arrayPeriodos)?>
                      <?= checkboxDisponibilidade("sabado-noite","Noite",$arrayPeriodos)?>
                    </div>                   
                    <div class ="d-flex justify-content-between">
                        <span class='w-25'>Domingo</span> 
                      <?= checkboxDisponibilidade("domingo-manha","Manha",$arrayPeriodos)?>
                      <?= checkboxDisponibilidade("domingo-tarde","Tarde",$arrayPeriodos)?>
                      <?= checkboxDisponibilidade("domingo-noite","Noite",$arrayPeriodos)?>
                    </div>                   
                </div>

            </div>
        </div>
       </section>
       </form>
</main>

<?php
echo $footer;
function checkboxCaracteristicas($id, $texto, $arrayCaracteristicas,){
    # verifica se o id atual consta 
    $marcado = in_array($id, $arrayCaracteristicas)? "checked" : "";
    return "
     <div class=\"form-check form-switch\">
          <input class=\"form-check-input\" type=\"checkbox\" name='caracteristicas[]' $marcado value='$id' role=\"switch\" id=\"$id\">
          <label class=\"form-check-label\" for=\"$id\">$texto</label>
     </div>
    ";
}
function checkboxDisponibilidade($id, $texto,$arrayPeriodos){

    

    # Extrai apenas os dados de coluna periodo
    $periodos = array_column($arrayPeriodos, "periodo");
    # Verifica se o id esta no array de periodo
    $marcado = in_array($id, $periodos) ? "checked" : "";
    

    
    return "
        <div class=\"form-check form-switch\">
              <input class=\"form-check-input\" type=\"checkbox\" name='disponibilidade[]' $marcado value='$id' role=\"switch\" id=\"$id\">
             <label class=\"form-check-label\" for=\"$id\">$texto</label>
        </div>
    ";
}
?>


