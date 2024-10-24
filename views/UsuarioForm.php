<?php
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer_site.html");
$html = file_get_contents("views/templates/html/usuarioList.html");
echo $header;
?>

<main>
      <div class="container mt-5">

         <div class="row d-flex justify-content-center">
            <div class="col-md-5">
               <p class="text-center fs-3">Restaurante MVC</p>
               <div class="card mb-4 rounded-3 shadow-sm ">
                  <div class="card-header bg-secondary py-3">
                     <h4 class="my-0 fw-normal text-white">Usuario</h4>
                  </div>
                  <div class="card-body p-4">


                     <form id="form1" name="form1" method="post" action="<?= $baseUrl ?>/usuario/atualizar">
                        <div class="form-floating mb-3">
                           <input type="text" name="nome" id="nome" class="form-control" value="<?=$nome?>">
                           <label for="nome">Nome:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="text" name="usuario" id="usuario" class="form-control" value="<?=$usuario?>">
                           <label for="usuario">Usuario:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="text" name="nivelAcesso" id="nivelAcesso" class="form-control" value="<?=$nivelAcesso?>">
                           <label for="nivelAcesso">Nivel De Acesso:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="checkbox" name="manter_logado" id="manter_logado" value="1" class="form-check-input" >
                           Lembrar de Mim
                        </div>
                        <button type="submit" id="btnAcessar" name="btnAcessar" class="w-100 btn btn-lg btn-primary">Acessar</button>
                        <input type='hidden' name='acao' value='<?= $acao?>'></input>
                        <input type='hidden' name='idUsuario' value='<?= $idUsuario?>'></input>
                     </form>

                     <div>
                        <a href='usuario/atualizar'>Criar nova conta</a>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>

<?php
echo $footer;
