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
              <span class="fw-semibold fs-5">Horarios de atuação:</span>
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

              <hr class="my-1">
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Segunda-feira:</span>
                <?= checkboxDisponibilidade("seguda-manha","Manhã") ?>
                <?= checkboxDisponibilidade("seguda-tarde","Tarde") ?>
                <?= checkboxDisponibilidade("seguda-noite","Noite") ?>
              </div>
              <hr class="my-1">



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
  
  # Verifica se o Id atual consta no array. se sim cria o atribuo checked.
  $marcado = in_array($id, $arrayCaracteristicas) ? "checked" : "";
  return "
      <div class='form-check form-switch'>
      <input class='form-check-input' type='checkbox' name='caracteristicas[]' $marcado value='$id' role='switch' id='$id'>
      <label class='form-check-label' for='$id'>$texto</label>
    </div>
  ";
}

function checkboxDisponibilidade($id,$texto){

  return "
    <div class='form-check form-switch'>
      <input class='form-check-input' type='checkbox' name='disponibilidade[]' value='$id' role='switch' id='$id'>
      <label class='form-check-label' for='$id'>$texto</label>
    </div>
  ";

}
?>