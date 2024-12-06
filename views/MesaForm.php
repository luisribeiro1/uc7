<?php

# Faz a leitura dos arquivos de templates e armazena nas variaveis
$somente_leitura = $acao == "criar" ? "" : "readonly";
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);

echo $header;
?>

<main>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <span class="fs-4"><i class="bi bi-grid-fill me-1"></i>Cadastro e edição de Mesas</span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl ?>/mesa-adm" class="btn btn-primary btn-sm">
        <i class="bi bi-arrow-left me-1"></i>Voltar
      </a>
      
    </div>

  </section>

  <form action="<?= $baseUrl ?>/mesa-adm/atualizar" method="post">
    <section class="container mt-4">
      <div class="row">
          <div class="col-md-3">
            
               
            <label>Numero da Mesa:</label>
                <input type="number" name="id" id="id" class="form-control" value='<?= $id ?>' required><br>
                </select>
                <br><br>
    
                <label>Tipo:</label>
                <select name="tipo" id="tipo" class="form-select" required>
                    <?= $tipo ?>
                </select>
                <br><br>
                
                <label>Lugares:</label>
                <select class="form-select" name="lugares" id="lugares" required>
                    <?= $lugares ?>
                </select>
                <br><br>

                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                <input type="hidden" name="acao" value="<?= $acao ?>">

            
        </div>

        <div class="col-md-3 pt-3">
               <div class="card">
                  <div class="card-body">
                    <?= checkboxCaracteristicas("fumantes", "Fumantes", $arrayCaracteristicas) ?>
                    <?= checkboxCaracteristicas("pet-friendly", "Pet-Friendly", $arrayCaracteristicas) ?>
                    <?= checkboxCaracteristicas("ar-condicionado", "Ar- Condicionado", $arrayCaracteristicas) ?>
                    <?= checkboxCaracteristicas("area-aberta", "Área Aberta", $arrayCaracteristicas) ?>
                    <?= checkboxCaracteristicas("acessibilidade", "Acessibilidade", $arrayCaracteristicas) ?>
                    <?= checkboxCaracteristicas("privacidade", "Privacidade", $arrayCaracteristicas) ?>
                    <?= checkboxCaracteristicas("espaço-kids", "Espaço Kids", $arrayCaracteristicas) ?>
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
                      <span class='w-25'>Sábado</span>
                      <?= checkboxDisponibilidade("sabadoo-manha", "Manhã", $arrayPeriodos) ?>
                      <?= checkboxDisponibilidade("sabadoo-tarde", "Tarde", $arrayPeriodos) ?>
                      <?= checkboxDisponibilidade("sabadoo-noite", "Noite", $arrayPeriodos) ?>
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

      </div>
    </section>
  </form>
</main>

<?php

echo $footer;

function checkboxCaracteristicas($id, $texto, $arrayCaracteristicas){
  
  $marcado = in_array($id, $arrayCaracteristicas) ? "checked" : "";  

  
  return "
    <div class=\"form-check form-switch\">
        <input class=\"form-check-input\" type=\"checkbox\" name='caracteristicas[]' $marcado value='$id' role=\"switch\" id=\"$id\">
        <label class=\"form-check-label\" for=\"$id\">$texto</label>
    </div>
  ";
}

function checkboxDisponibilidade($id, $texto, $arrayPeriodos){

    # Extrai apenas os dados da coluna periodo
    $periodos = array_column($arrayPeriodos, "periodo");
    # Verifica se o ID está no array períodos 
    $marcado = in_array($id, $periodos) ? "checked" : "";

  
  return "
    <div class=\"form-check form-switch\">
        <input class=\"form-check-input\" type=\"checkbox\" name='disponibilidade[]' $marcado value='$id' role=\"switch\" id=\"$id\">
        <label class=\"form-check-label\" for=\"$id\">$texto</label>
    </div>
  ";
}
?>