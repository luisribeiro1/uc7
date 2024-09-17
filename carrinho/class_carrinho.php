<?php
session_start();

class Carrinho {
    public function __construct() {
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
            $_SESSION['desconto'] = 0;
        }
    }

    public function adicionarItem($item) {
        $_SESSION['carrinho'][] = $item;
    }

    public function removerItem($indice) {
        if (isset($_SESSION['carrinho'][$indice])) {
            unset($_SESSION['carrinho'][$indice]);
            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
        }
    }

    public function listarItens() {
        return $_SESSION['carrinho'];
    }

    
    public function aplicarDesconto($desconto) {
        $_SESSION['desconto'] = $desconto;
    }

    public function pegarDesconto() {
        return $_SESSION['desconto'];
    }
}