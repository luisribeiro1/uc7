<?php

class Produto
{
    private $lista_produtos = [
        ['id' => 1, 'name' => 'Produto 1', 'price' => 100],
        ['id' => 2, 'name' => 'Produto 2', 'price' => 200],
        ['id' => 3, 'name' => 'Produto 3', 'price' => 300],
        ['id' => 4, 'name' => 'Produto 4', 'price' => 400],
        ['id' => 5, 'name' => 'Produto 5', 'price' => 500],
    ];

    public function getAllProdutos()
    {
        return $this->lista_produtos;
    }

    public function getProdutoById($id)
    {
        foreach ($this->lista_produtos as $produto) {
            if ($produto['id'] == $id) {
                return $produto;
            }
        }
        return null;
    }

    public function addProduto($name, $price)
    {
        $id = end($this->lista_produtos)['id'] + 1;
        $this->lista_produtos[] = ['id' => $id, 'name' => $name, 'price' => $price];
    }

    public function updateProduto($id, $name, $price)
    {
        foreach ($this->lista_produtos as $produto) {
            if ($produto['id'] == $id) {
                $produto['name'] = $name;
                $produto['price'] = $price;
                break;
            }
        }
    }

    public function deleteProduto($id)
    {
        foreach ($this->lista_produtos as $key => $produto) {
            if ($produto['id'] == $id) {
                unset($this->lista_produtos[$key]);
                break;
            }
        }
    }
}
