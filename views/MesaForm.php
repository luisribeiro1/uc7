<?php

$somente_leitura = $acao == "criar" ? "" : "readonly";

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);
$footer = str_replace("[[js]]", "", $footer);

echo $header;

?>

<main>
<section class="container mt-4">
  <div class="row">
    <div class="col-md-6">
      <span class="fs-4">Adicionar uma mesa</span>
    </div>
    <div class="col-md-6 text-end">
      <a href="<?= $baseUrl ?>/mesa-adm" class="btn btn-primary btn-md rounded-4">
        <i class="bi bi-arrow-left"></i>Voltar
      </a>
    </div>
  </div>
</section>
<form action="<?= $baseUrl ?>/mesa-adm/atualizar" method="post" >
  <section class="container mt-4">
    <div class="row">
        <div class="col-md-3">
                <label>Número da Mesa:</label>
                <input type="number" class="form-control" name="id" id="id" value='<?= $id?>' required <?=$id?>></input>
                <br>
                
                <label>Quantidade de Lugares:</label>
                <select class="form-select" name="lugares" id="lugares" required>
                  <?= $lugares?>
                </select>
                <br>
                
                <label>Tipo da Mesa:</label>
                    <select class="form-select" name="tipo" id="tipo" required>    
                        <?= $tipo?>
                    </select>
                <br>

                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <input type='hidden' name='acao' value='<?= $acao?>'></input>
        </div>

        <div class="col-md-3 pt-3">
          <div class="card">
            <div class="card-body">

            <?= checkboxCaracteristicas("fumantes", "Fumantes", $arrayCaracteristicas)?>
            <?= checkboxCaracteristicas("pet-friendly", "Pet Friendly", $arrayCaracteristicas)?>
            <?= checkboxCaracteristicas("ar-condicionado", "Ar-Condicionado", $arrayCaracteristicas)?>
            <?= checkboxCaracteristicas("area-aberta", "Area Aberta", $arrayCaracteristicas)?>
            <?= checkboxCaracteristicas("acessibilidade", "Acessibilidade", $arrayCaracteristicas)?>
            <?= checkboxCaracteristicas("privacidade", "Privacidade", $arrayCaracteristicas)?>
            <?= checkboxCaracteristicas("espaco-kids", "Espaço Infantil", $arrayCaracteristicas)?>
            </div>
          </div>
        </div>
    </div>
    <div class="col-md-6 pt-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <span class='w-25'>Segunda-Feira</span>
                <?= checkboxDisponibilidade("segunda-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("segunda-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("segunda-noite", "Noite", $arrayPeriodos) ?>
              </div>
              <div class="d-flex justify-content-between">
                <span class='w-25'>Terça-Feira</span>
                <?= checkboxDisponibilidade("terca-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("terca-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("terca-noite", "Noite", $arrayPeriodos) ?>
              </div>
              <div class="d-flex justify-content-between">
                <span class='w-25'>Quarta-Feira</span>
                <?= checkboxDisponibilidade("quarta-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quarta-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quarta-noite", "Noite", $arrayPeriodos) ?>
              </div>
              <div class="d-flex justify-content-between">
                <span class='w-25'>Quinta-Feira</span>
                <?= checkboxDisponibilidade("quinta-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quinta-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quinta-noite", "Noite", $arrayPeriodos) ?>
              </div>
              <div class="d-flex justify-content-between">
                <span class='w-25'>Sexta-Feira</span>
                <?= checkboxDisponibilidade("sexta-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("sexta-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("sexta-noite", "Noite", $arrayPeriodos) ?>
              </div>
              <div class="d-flex justify-content-between">
                <span class='w-25'>Sábado</span>
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
    </section>
  </form> 
  </section>
</main>

<?php

echo $footer;

function checkboxCaracteristicas($id, $texto, $arrayCaracteristicas) {
  $marcado = in_array($id,$arrayCaracteristicas) ? "checked" : "";

  return "
    <div class=\"form-check form-switch\">
      <input class=\"form-check-input\" type=\"checkbox\" name='caracteristicas[]' value='$id' role=\"switch\" id=\"$id\">
      <label class=\"form-check-label\" for=\"$id\">$texto</label>
    </div>
  ";
}

function checkboxDisponibilidade($id, $texto, $arrayPeriodos) {
  $periodos = array_column($arrayPeriodos, "periodo");

  $marcado = in_array($id, $periodos) ? "checked" : "";

  return "
    <div class=\"form-check form-switch\">
      <input class=\"form-check-input\" type=\"checkbox\" name='disponibilidade[]' $marcado value='$id' role=\"switch\" id=\"$id\">
      <label class=\"form-check-label\" for=\"$id\">$texto</label>
    </div>
  ";
}

?>