<?php
// inicializa a sessao, permitindo que variaveis de sessao sejam criadas e usadas
session_start();

# Captar a URL reridicionada no .htaccess  ($_indica uma super global)
# trim() limpa caracteres vazios no inicio e final do texto.
# srttolower() converte para minuscula
$requisicao = trim(strtolower($_SERVER["REQUEST_URI"]));

# Subistitui a parte da url que não é util
$requisicao = str_replace("/uc7/restaurante-mvc/","", $requisicao);

//$requisicao = strtolower($requisicao);
//echo $requisicao;

#Divide em partes , usando a barra como separador. Cria um array de indice
$segmentos = explode("/",$requisicao);
//var_dump($segmentos);

# verifica o padrao da rota
$controlador = isset($segmentos[0]) ? $segmentos[0] : "mesa-adm";
$metodo = isset($segmentos[1]) ? $segmentos[1] : "index";
$identificador = isset($segmentos[2]) ? $segmentos[2] : null;

// echo "<br>". $controlador;
// echo "<br>". $metodo;
// echo "<br>". $identificador;

# mesa/editar/4
# controller     (mesa)
# metodo         (editar)
# identificador   (4)
# mesa/novo 
switch($controlador){
    case "mesa-adm":
        validaSessao();
        require "controllers/MesaController.php";
        $controller = new MesaController();
        // $controller->index();
        break;
                 

    case "cardapio-adm":
        validaSessao();
        require "controllers/CardapioController.php";
        $controller = new CardapioController();
        // $controller->index();
        break;
    
        
        
    case "avaliacoes-adm":
        validaSessao();
        require "controllers/AvaliacoesController.php";
        $controller = new AvaliacoesController();
        // $controller->index();
        break;

    case "login":
        require "controllers/LoginController.php";
        $controller = new LoginController();
        // $controller->index();
        break;
    case "usuario":
        validaSessao();
        require "controllers/UsuarioController.php";
        $controller = new UsuarioController();
        // $controller->index();
        break;

    case "cardapio":
        require "controllers/CardapioController.php";
        $controller = new CardapioController();
        $metodo = "ver_cardapio";
        // $controller->index();
        break;
    case "reserva":
        require "controllers/ReservaController.php";
        $controller = new ReservaController();
        // $controller->index();
        break;
        
    
    case "sair":
        require "controllers/SairController.php";
        $controller = new SairController();
        // $controller->index();
        break;
        
    default:
        echo "Página não encontrada";     
        break; 
    
        
}

# Chama o metodo do controlador com ou sem o parametro $id
if($identificador){
    # Usado para os metodos excluir e editar, poambos usam o identificador 
    $controller->$metodo($identificador);

}else{
    # usado para os metodos index e criar
    $controller->$metodo();
}

function validaSessao(){
    
    # se nao existir o cookie do usuario
    if(!isset($_COOKIE["usuario"])){    

      # se não existir a sessão de nome_usuario
      if(!isset($_SESSION["nome_usuario"])){
          $baseUrl = "http://localhost/uc7/restaurante-mvc";
  
          # Reridiciona o usuario para a pagina de login
          header("location:" . $baseUrl . "/login");
        }  
  
  
    }

}
