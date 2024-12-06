<?php

require_once 'models/ProdutoModel.php';

class ProdutoController
{
    public function index()
    {
        // Obter dados do modelo
        $produtoModel = new Produto();
        $produtos = $produtoModel->getAllProdutos();

        // Passar dados para a view
        require 'views/ProdutoView.php';
    }

    public function listar($indice)
    {
        switch($indice){
            case 1:
                echo "listar...1";
                break;
            case 2:
                echo "listar..2";
                break;
            case 3:
                echo "listar...3";
                break;
        }
        
    }
    
}
