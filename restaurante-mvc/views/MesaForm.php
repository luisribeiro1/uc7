<?php

$soemnte_leitura = $acao == "criar" ? "" : "readonly";

$header = file_get_contents("views/html/header.html");
$footer = file_get_contents("views/html/footer.html");
$header = str_replace("[[base-url]]",$baseUrl,$header);
$footer = str_replace("[[js]]","",$footer);

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



<form action="<?= $baseUrl ?>/mesa-adm/atualizar" method="post">
    <section class="container mt-4">
        <div class="row">
           <div class="col-md-3">

        
          <label>Numero:</label>
            <input type="number" class="form-control" name="id" id="id" require min="0" step="0.01" values="<?=$id?>" required <?= $soemnte_leitura ?>>
            <br>


            <label>Lugares:</label>
            <input type="number" class="form-select" name="lugares" id="lugares" values="<?=$lugares?>" min="2" max="8" required >
            <br>

         
            <label>tipo:</label>
            <select type="tipo" id="tipo" name="tipo" class="form-select" required>
                <?= $tipo ?>
           </select>
            <br>

            
          
           
           </div>
        </div>

        <div class="col-md-3 pt-3">
            <div class="card">
                <div class="card-body">
               <?= checkboxCaracteristicas("fumantes", "Fumantes",  $arrayCaracteristicas) ?>
               <?= checkboxCaracteristicas("pet-friendly", "Pet-friendly",  $arrayCaracteristicas) ?>
               <?= checkboxCaracteristicas("ar-condicionado", "Ar-condicionado",  $arrayCaracteristicas) ?>
               <?= checkboxCaracteristicas("area-aberta", "Área-aberta",  $arrayCaracteristicas) ?>
               <?= checkboxCaracteristicas("acessibilidade", "Acessebilidade",  $arrayCaracteristicas) ?>
               <?= checkboxCaracteristicas("privacidade", "Privacidade",  $arrayCaracteristicas) ?>
               <?= checkboxCaracteristicas("espaco-kids", "Espaco-kids",  $arrayCaracteristicas) ?>
                </div>
            </div>
        </div>

        <div class="col-md-6 pt-3">
            <div class="card">
                <div class="card-body">

               <div class="d-flex justify-content-between">
                <span class='w-25'>Segunda-feira</span>
                <?= checkboxDisponibilidade("segunda-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("segunda-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("segunda-noite", "Noite", $arrayPeriodos) ?>              
               </div>

               <div class="d-flex justify-content-between">
                <span class='w-25'>Terça-feira</span>
                <?= checkboxDisponibilidade("terca-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("terca-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("terca-noite", "Noite", $arrayPeriodos) ?>              
               </div>

               <div class="d-flex justify-content-between">
                <span class='w-25'>Quarta-feira</span>
                <?= checkboxDisponibilidade("quarta-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quarta-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quarta-noite", "Noite", $arrayPeriodos) ?>              
               </div>

               <div class="d-flex justify-content-between">
                <span class='w-25'>Quinta-feira</span>
                <?= checkboxDisponibilidade("quinta-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quinta-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quinta-noite", "Noite", $arrayPeriodos) ?>              
               </div>

               <div class="d-flex justify-content-between">
                <span class='w-25'>Sexta-feira</span>
                <?= checkboxDisponibilidade("sexta-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("sexta-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("sexta-noite", "Noite", $arrayPeriodos) ?>              
               </div>

               <div class="d-flex justify-content-between">
                <span class='w-25'>Sabado</span>
                <?= checkboxDisponibilidade("sabado-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("sabado-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("sabado-noite", "Noite", $arrayPeriodos) ?>              
               </div>

               <div class="d-flex justify-content-between">
                <span class='w-25'>Domingo</span>
                <?= checkboxDisponibilidade("domingo-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("domingo-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("domingo-noite", "Noite", $arrayPeriodos) ?>              
               </div>


              
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Salvar alterações</button>
            <input type="hidden" name="acao" value="<?=$acao?>">


          
    </section>
    </form>
</main>

<?php
echo $footer;

function checkboxCaracteristicas($id, $texto, $arrayCaracteristicas) {
//var_dump($arrayCaracteristicas);
    $marcado = in_array($id, $arrayCaracteristicas) ? "checked" : "";
    return "
      <div class=\"form-check form-switch\">
            <input class=\"form-check-input\" type=\"checkbox\" name='caracteristicas[]' $marcado value='$id' role=\"switch\" id=\"$id\">
            <label class=\"form-check-label\" for=\"$id\">$texto</label>
             </div>
    ";
}

function checkboxDisponibilidade($id, $texto, $arrayPeriodos) {

    # extrair apenas os dados da coluna periodo
    $periodos = array_column($arrayPeriodos, "periodo");

    # verificar se o ID esta no array de periodos 
    $marcado = in_array($id, $periodos) ? "checked" : "";
    
    return "
      <div class=\"form-check form-switch\">
            <input class=\"form-check-input\" type=\"checkbox\" name='disponibilidades[]' $marcado value='$id' role=\"switch\" id=\"$id\">
            <label class=\"form-check-label\" for=\"$id\">$texto</label>
             </div>
    ";
}
?>