<?php

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]",$baseUrl , $header);

echo $header;
$nome = "";
$usuario = "";
$nivelacesso = "";
?>
 <section class="container mt-4">
 <div class="container mt-5">

<div class="row d-flex justify-content-center">
   <div class="col-md-5">
      <p class="text-center fs-3">Restaurante MVC</p>
      <div class="card mb-4 rounded-3 shadow-sm ">
         <div class="card-header bg-secondary py-3">
            <h4 class="my-0 fw-normal text-white">Login</h4>
         </div>
         <div class="card-body p-4">

        

            <p><small>Nova Senha</small></p>

            <form id="form1" name="form1" method="post" action="<?= $baseUrl ?>/usuario/atualizarSenha/<?= $idUsuario?>">
               
               
               <div class="form-floating mb-3">
                  <input type="password" name="senha" id="senha" class="form-control">
                  <label for="senha">Senha:</label>
               </div>
               
               
               <button type="submit" id="btnAcessar" name="btnAcessar" class="w-100 btn btn-lg btn-primary">Alterar a senha</button>
               
            </form>

         </div>
      </div>
   </div>
</div>
</div>
  </section>



<?php


echo $footer;