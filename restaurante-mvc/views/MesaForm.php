<?php

$somente_leitura = $acao == "criar" ? "" : "readonly";

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);

echo $header;
?>

<main>
  <form action="<?= $baseUrl ?>/mesa-adm/atualizar" method="post">

    <section class="container mt-4">
      <div class="row">

        <div class="col-md-6">
          <span class="fs-3"><span class="text-primary"><i class="bi bi-pencil-square"></i></span><strong> Cadastro e edição de Mesas</strong></span>
        </div>
        <div class="col-md-6 text-end">
          <a href="<?= $baseUrl ?>/mesa-adm" class="btn btn-sm btn-primary btns"><b><i class="bi bi-arrow-left me-1"></i></b>VOLTAR</a>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-md-3">

          <label for="id">Número da mesa:</label>
          <input class="form-control" type="number" name="id" id="id" min="1" value="<?= $id ?>" required <?= $somente_leitura ?>>
          <br>

          <label for="lugares">Quantidade de lugares:</label>
          <input class="form-control" type="number" name="lugares" id="lugares" min="2" max="8" value="<?= $lugares ?>" required>
          <br>

          <label for="tipo">Tipo de mesa:</label>
          <select class="form-select" type="text" name="tipo" id="tipo" value="<?= $tipo ?>" required>
            <?= $tipo ?>
          </select>
          <br>

          <button class="btn btn-primary mt-3" type="submit">Salvar alterações</button>

          <input type="hidden" name="acao" value="<?= $acao ?>">

        </div>

        <div class="col-md-3 pt-3">
          <div class="card">
            <div class="card-body">

              <?= checkboxCaracteristicas("fumantes", "Fumantes", $arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("pet-friendly", "Pet Friendly", $arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("ar-condicionado", "Ar condicionado", $arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("area-aberta", "Área aberta", $arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("acessibilidade", "Acessibilidade", $arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("privacidade", "Privacdade", $arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("espaco-kids", "Espaço kids", $arrayCaracteristicas) ?>

            </div>
          </div>
        </div>

        <div class="col-md-6 pt-3">
          <div class="card">
            <div class="card-body">

              <div class="d-flex justify-content-between">
                <span class="w-25">Segunda feira</span>
                <?= checkboxDisponibilidade("segunda-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("segunda-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("segunda-noite", "Noite", $arrayPeriodos) ?>
              </div>

              <div class="d-flex justify-content-between">
                <span class="w-25">Terça feira</span>
                <?= checkboxDisponibilidade("terça-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("terça-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("terça-noite", "Noite", $arrayPeriodos) ?>
              </div>

              <div class="d-flex justify-content-between">
                <span class="w-25">Quarta feira</span>
                <?= checkboxDisponibilidade("quarta-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quarta-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quarta-noite", "Noite", $arrayPeriodos) ?>
              </div>

              <div class="d-flex justify-content-between">
                <span class="w-25">Quinta feira</span>
                <?= checkboxDisponibilidade("quinta-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quinta-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("quinta-noite", "Noite", $arrayPeriodos) ?>
              </div>

              <div class="d-flex justify-content-between">
                <span class="w-25">Sexta feira</span>
                <?= checkboxDisponibilidade("sexta-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("sexta-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("sexta-noite", "Noite", $arrayPeriodos) ?>
              </div>

              <div class="d-flex justify-content-between">
                <span class="w-25">Sábado</span>
                <?= checkboxDisponibilidade("sabado-manha", "Manhã", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("sabado-tarde", "Tarde", $arrayPeriodos) ?>
                <?= checkboxDisponibilidade("sabado-noite", "Noite", $arrayPeriodos) ?>
              </div>

              <div class="d-flex justify-content-between">
                <span class="w-25">Domingo</span>
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

function checkboxCaracteristicas($id, $texto, $arrayCaracteristicas)
{

  # in_array verifica qual o valor do $id dentro do array associativo $arrayCaracteristicas e compara o valor para colocar o attibuto checked no html
  $marcado = in_array($id, $arrayCaracteristicas) ? "checked" : "";

  return "
    <div class='form-check form-switch'>
      <input class='form-check-input' name='caracteristicas[]' value='$id' $marcado type='checkbox' role='switch' id='$id'>
      <label class='form-check-label' for='$id'>$texto</label>
    </div>";
}

function checkboxDisponibilidade($id, $texto, $arrayPeriodos)
{

  # extrai apenas os dados da coluna periodo
  $periodos = array_column($arrayPeriodos, "periodo");

  # verifica se oID está no array d periodos
  $marcado = in_array($id, $periodos) ? "checked" : "";

  return "
    <div class='form-check form-switch'>
      <input class='form-check-input' name='disponibilidade[]' value='$id' $marcado type='checkbox' role='switch' id='$id'>
      <label class='form-check-label' for='$id'>$texto</label>
    </div>";
}

?>