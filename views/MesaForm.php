<?php

$ler = $acao == "criar" ? "" : "readonly";

$header = file_get_contents('views/templates/html/header.html');
$footer = file_get_contents('views/templates/html/footer.html');
$header = str_replace("[[base-url]]", $baseUrl, $header);
$footer = str_replace("[[js]]", "", $footer);

echo $header;
?>

<main>
<section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <span class="fs-4"><i class="bi bi-grid-fill me-1"></i>Cadastro e edição de mesas</span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl?>/mesa-adm" class="btn btn-warning btn-sm"><i class="bi bi-arrow-left me-1"></i>VOLTAR</a>
      </div>
    </div>
  </section>

  <form action="<?= $baseUrl ?>/mesa-adm/atualizar" method="post" >
  <section class="container mt-4">
    <div class="row">
        <div class="col-md-3">
                <label>Número da Mesa:</label>
                <input type="number" class="form-control" name="id" id="id" value='<?= $id?>' required <?=$ler?>></input>
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

            <?= checkboxCaractersiticas("fumantes", "Fumantes", $arrayCaracteristicas)?>
            <?= checkboxCaractersiticas("pet-friendly", "Pet Friendly", $arrayCaracteristicas)?>
            <?= checkboxCaractersiticas("ar-condicionado", "Ar-Condicionado", $arrayCaracteristicas)?>
            <?= checkboxCaractersiticas("area-aberta", "Area Aberta", $arrayCaracteristicas)?>
            <?= checkboxCaractersiticas("acessibilidade", "Acessibilidade", $arrayCaracteristicas)?>
            <?= checkboxCaractersiticas("privacidade", "Privacidade", $arrayCaracteristicas)?>
            <?= checkboxCaractersiticas("espaco-kids", "Espaço Infantil", $arrayCaracteristicas)?>
            </div>
          </div>
        </div>
    </div>
    </section>
  </form>
</main>

<?php
echo $footer;


function checkboxCaractersiticas($id, $texto, $arrayCaracteristicas){
  
  # verificar se o id atual consta no array. Se sim cria o checked
  $marcado = in_array($id, $arrayCaracteristicas) ? $marcado = "checked" : $marcado = "";

  return "<div class=\"form-check form-switch\">
                <input class=\"form-check-input\" type=\"checkbox\" name= 'caracteristicas[]' $marcado value='$id' role=\"switch\" id=\"$id\">
                <label class=\"form-check-label\" for=\"$id\">$texto</label>
              </div>";
}
?>

