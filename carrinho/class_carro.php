<?php

class Car {
    // Propriedades (atributos)
    private $brand;
    private $model;
    private $color;
    private $speed = 0;

    // Construtor
    public function __construct($brand, $model, $color) {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
    }

    // Métodos (funções)
    
    // Método para acelerar o carro
    public function acelerar($quantidade) {
        $this->speed += $quantidade;
        //echo "O carro acelerou para " . $this->speed . " km/h.\n";
    }

    // Método para frear o carro
    public function frear($quantidade) {
        $this->speed -= $quantidade;
        if ($this->speed < 0) {
            $this->speed = 0;
        }
        //echo "O carro desacelerou para " . $this->speed . " km/h.\n";
    }

    // Método para obter a velocidade atual
    public function getSpeed() {
        return $this->speed;
    }

    // Método para obter a descrição do carro
    public function getDescription() {
        return "Este carro é um " . $this->brand . " " . $this->model . " de cor " . $this->color . ".";
    }
}

// Criando uma instância da classe Car
$car1 = new Car("Toyota", "Corolla", "Azul");

// Usando os métodos da classe Car
echo $car1->getDescription() . "<br>"; // "Este carro é um Toyota Corolla de cor Azul."

$car1->acelerar(50); // Acelera para 50 km/h
echo "<br>Velocidade atual:".$car1->getSpeed();
$car1->frear(20);      // Desacelera para 30 km/h
echo "<br>Velocidade atual:".$car1->getSpeed();
$car1->acelerar(30); // Acelera para 60 km/h
echo "<br>Velocidade atual:".$car1->getSpeed();