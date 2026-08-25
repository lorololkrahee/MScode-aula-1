<?php
    require_once('calculadoraFrete.php');

    class Correios implements calculadoraFrete{
        public function calcularFrete(float $valorProduto): float{
            return $valorProduto * 0.10;
        }
    }
?>