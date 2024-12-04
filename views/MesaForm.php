<?php

$somente_leitura = $acao == "criar" ? "" : "readonly";
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);
$footer = str_replace("[[js]]", " ", $footer);


echo $header;
?>

<main>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <span class="fs-4"><i class="bi bi-pencil-square"></i> Cadastro e edição de Mesas</span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl ?>/mesa-adm" class="btn btn-primary btn-sm">
          <i class="bi bi-arrow-left"></i> Voltar</a>
      </div>
    </div>
  </section>

  <form action="<?= $baseUrl ?>/mesa-adm/atualizar" method="post">
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-3">
        
            <label>Número da Mesa:</label>
            <input type="number" class="form-control" name="id" id="id" require min="0" step="1" value="<?= $id ?>" required <?= $somente_leitura ?>>
            <br>
            
            <label>Quantidade de Lugares:</label>
            <!-- <input type="number" class="form-control" name="lugares" id="lugares" require min="0" step="1" value="<?= $lugares ?>" min="2" max="8" required> -->
            <select name="lugares" id="lugares" class="form-select" required>
              <?= $lugares ?>
            </select>
            <br>
            
            <label>Formato da Mesa:</label>
            <select name="tipo" id="tipo" class="form-select" required>
                <?= $tipo ?>
            </select> 
           
            <br>
            <br>

            <button type="submit" class="btn btn-primary">Salvar alterações</button>
            <input type="hidden" name="acao" value="<?= $acao ?>">
            
            

      </div>
      <div class="col-md-3 pt-3">
          <div class="card">
            <div class="card-body">
              
              <?= checkboxCaracteristicas("fumantes", "Fumantes", $arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("pet-friendly", "Pet friendly", $arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("ar-condicionado", "Ar condicionado", $arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("area-aberta", "Área aberta", $arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("acessibilidade", "Acessibilidade", $arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("privacidade", "Privacidade", $arrayCaracteristicas) ?>
              <?= checkboxCaracteristicas("espaco-kids", "Espaço Kids", $arrayCaracteristicas) ?>

            </div>
          </div>  
    </div>

      <div class="col-md-6 pt-3">
          <div class="card">
            <div class="card-body">

            <div class="d-flex justify-content-between">
              <span>Segunda-feira</span>
              <?= checkboxDisponibilidade("segunda-manha", "Manhã") ?>
              <?= checkboxDisponibilidade("segunda-tarde", "Tarde") ?>
              <?= checkboxDisponibilidade("segunda-noite", "Noite") ?>

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
                </div>";
}

function checkboxDisponibilidade($id, $texto){

    $marcado = "";

    return "
      <div class=\"form-check form-switch\">
                <input class=\"form-check-input\" type=\"checkbox\" name='disponibilidade[]' $marcado value='$id' role=\"switch\" id=\"$id\">
                <label class=\"form-check-label\" for=\"$id\">$texto</label>
                </div>";
}

?>