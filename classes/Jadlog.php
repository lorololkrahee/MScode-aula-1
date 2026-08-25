<?php

require_once('CalculadorFrete.php');

class Jadlog implements CalculadoraFrete{
    public function calcularFrete(float $valorProduto): float
    {
        return $valorProduto * 0.11;
    }
}