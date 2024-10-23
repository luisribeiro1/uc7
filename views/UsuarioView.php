<?php 

$formulario = "";

foreach($form_usuario as $form){

    $idUsuario = $form["idUsuario"];
    $nome = $form["nome"];
    $usuario = $form["usuario"];
    $nivelAcesso = $form["nivelAcesso"];

    $formulario.="
        <main>
    <div class='container mt-5'>

       <div class='row d-flex justify-content-center'>
          <div class='col-md-5'>
             <p class='text-center fs-3'>Restaurante MVC</p>
             <div class='card mb-4 rounded-3 shadow-sm '>
                <div class='card-header bg-secondary py-3'>
                   <h4 class='my-0 fw-normal text-white'>Formulario</h4>
                </div>
                <div class='card-body p-4'>

                   <?= $erro ?>

                   <p><small>Informe o usuário e senha para acessar</small></p>

                   <form id='form1' name='form1' method='post' action='<?= $baseUrl ?>/login/autenticar'>
                      <div class='form-floating mb-3'>
                         <input type='usuario' name='usuario' id='usuario' class='form-control'>
                         <label for='usuario'>Usuário:</label>
                      </div>
                      <div class='form-floating mb-3'>
                         <input type='password' name='senha' id='senha' class='form-control'>
                         <label for='senha'>Senha:</label>
                      </div>
                      <div class='form-floating mb-3'>
                         <input type='checkbox' name='manter_logado' id='manter_logado' value='1' class='form-check-input'>
                         Lembrar de mim
                      </div>
                      <a class='text-danger text-decoration-none' href='[[base-url]]/criar/$idCardapio' onclick=\"return confirm('Confirmar e Salvar os dados $idUsuario?')\">Salvar dados</a>
                   </form>

                </div>
             </div>
          </div>
       </div>
    </div>

 </main>
    ";

    $header = file_get_contents("views/templates/html/header.html");
    $footer = file_get_contents("views/templates/html/footer.html");
    $html = file_get_contents("views/templates/html/usuario.html");

    $html = str_replace("[[header]]",$header,$html);
    $html = str_replace("[[footer]]",$footer,$html);
    $html = str_replace("[[formulario]]",$formulario,$html);
    $html = str_replace("[[base-url]]",$baseUrl,$html);

    echo $html;
}