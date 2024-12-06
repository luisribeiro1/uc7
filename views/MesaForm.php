<?php

$bloqueio = $acao == "criar" ? "" : "readonly";
$texto_cab = $acao == "criar" ? "Cadastro " : "Edição ";

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header  );
$footer = str_replace("[[js]]", " ", $footer);

echo $header;
?>

<main>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <span class="fs-4"><i class="bi bi-pencil-square"></i> <?= $texto_cab ?>de Mesa</span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl ?>/mesa-adm" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i> Voltar</a>
      </div>
    </div>
  </section>
  <form action="<?= $baseUrl ?>/mesa-adm/atualizar" method="post">
  <section class="container mt-3">
    <div class="row">
        <div class="col-md-3">  
                <label>Número da mesa:</label>
                <input type="number" class="form-control" name="mesa" id="mesa" value="<?= $id ?>" min="1" step="1" required <?= $bloqueio ?>>
                <br>

                <label>Números de Lugares:</label>
                <select name="lugares" id="lugares" class="form-select" required>
                  <?= $lugares ?>
                </select>
                <!-- <input type="number" class="form-control" name="lugares" id="lugares" value="<?= $lugares ?>"min="2" max="8" step="2" required> -->
                <br>
                
                <label>Formato da Mesa:</label>
                <select name="tipo" id="tipo" class="form-select" required>
                  <?= $tipo ?>
                </select>
                <br>

                <button type="Submit" class="btn btn-primary">Salvar alterações</button>
                <input type="hidden" name="acao" value="<?= $acao ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
            

        </div>
        <div class="col-md-3 pt-3">
          <div class="card">
          <div class="card-header">
              <span class="fw-semibold fs-5">Permissões:</span>
            </div>
            <div class="card-body">

              <?= checkboxCaracteristicas("fumantes","Fumantes",$arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("pet-friendly","Pet Friendly",$arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("ar-condicionado","Ar Condicionado",$arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("area-aberta","Área aberta",$arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("acessibilidade","Acessibilidade",$arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("privacidade","Privativo",$arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("espaco-kids","Espaço Kids",$arrayCaracteristicas) ?>

            </div>
          
          </div>
        </div>
        <div class="col-md-6 pt-3">
          <div class="card">
            <div class="card-header">
              <span class="fw-semibold fs-5">Horarios de atuação:</span>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-semibold w-25">Segunda-feira:</span>
                <?= checkboxDisponibilidade("segunda-manha","Manhã",$arrayPeriodos) ?>
                <?= checkboxDisponibilidade("segunda-tarde","Tarde",$arrayPeriodos) ?>
                <?= checkboxDisponibilidade("segunda-noite","Noite",$arrayPeriodos) ?>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-semibold w-25">Terça-feira:</span>
                <?= checkboxDisponibilidade("terça-manha","Manhã",$arrayPeriodos) ?>
                <?= checkboxDisponibilidade("terça-tarde","Tarde",$arrayPeriodos) ?>
                <?= checkboxDisponibilidade("terça-noite","Noite",$arrayPeriodos) ?>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-semibold w-25">Quarta-feira:</span>
                <?= checkboxDisponibilidade("quarta-manha","Manhã",$arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quarta-tarde","Tarde",$arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quarta-noite","Noite",$arrayPeriodos) ?>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-semibold w-25">Quinta-feira:</span>
                <?= checkboxDisponibilidade("quinta-manha","Manhã",$arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quinta-tarde","Tarde",$arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quinta-noite","Noite",$arrayPeriodos) ?>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-semibold w-25">Sexta-feira:</span>
                <?= checkboxDisponibilidade("sexta-manha","Manhã",$arrayPeriodos) ?>
                <?= checkboxDisponibilidade("sexta-tarde","Tarde",$arrayPeriodos) ?>
                <?= checkboxDisponibilidade("sexta-noite","Noite",$arrayPeriodos) ?>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-semibold w-25">Sábado:</span>
                <?= checkboxDisponibilidade("sabado-manha","Manhã",$arrayPeriodos) ?>
                <?= checkboxDisponibilidade("sabado-tarde","Tarde",$arrayPeriodos) ?>
                <?= checkboxDisponibilidade("sabado-noite","Noite",$arrayPeriodos) ?>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-semibold w-25">Domingo:</span>
                <?= checkboxDisponibilidade("domingo-manha","Manhã",$arrayPeriodos) ?>
                <?= checkboxDisponibilidade("domingo-tarde","Tarde",$arrayPeriodos) ?>
                <?= checkboxDisponibilidade("domingo-noite","Noite",$arrayPeriodos) ?>
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

function checkboxCaracteristicas($id,$texto,$arrayCaracteristicas){
  
  # Verifica se o Id atual consta no array. se sim cria e atribui checked.
  $marcado = in_array($id, $arrayCaracteristicas) ? "checked" : "";
  return "
      <div class='form-check form-switch'>
      <input class='form-check-input' type='checkbox' name='caracteristicas[]' $marcado value='$id' role='switch' id='$id'>
      <label class='form-check-label' for='$id'>$texto</label>
    </div>
  ";
}

function checkboxDisponibilidade($id,$texto,$arrayPeriodos){

  # Extrai apenas os dados da coluna periodo.
  $periodos = array_column($arrayPeriodos, "periodo");
  # Verifica se o Id atual consta no array. se sim cria e atribui checked.
  $marcado = in_array($id, $periodos) ? "checked" : "";

  return "
    <div class='form-check form-switch'>
      <input class='form-check-input' type='checkbox' name='disponibilidade[]' $marcado value='$id' role='switch' id='$id'>
      <label class='form-check-label' for='$id'>$texto</label>
    </div>
  ";

}
?>