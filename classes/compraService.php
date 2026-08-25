<?php 

require_once('cliente.php');
require_once('canalComunicacao.php');
require_once('calculadoraFrete.php');   

class CompraService {

     public function __construct(
        private CanalComunicacao $canalComunicacao,
        private calculadoraFrete $calculadoraFrete
    ){

    }


    public function finalizarCompra(string $destinatario, string $nomeCliente, float $valorProduto): void  
    {
        $frete = $this->calculadoraFrete->calcularFrete($valorProduto);

        $total = $valorProduto + $frete;

        $mensagem = "Olá $nomeCliente, recebemos sua compra na moveis simonetti!";
        $mensagem .= "Valor do produto: R$ " . number_format($valorProduto, 2, ',', '.') . "\n";
        $mensagem .= "Frete: R$ " . number_format($frete, 2, ',', '.') . "\n";
        $mensagem .= "Total: R$ " . number_format($total, 2, ',', '.');
        $enviado = $this->canalComunicacao->enviarMensagem($destinatario, $mensagem);

        if($enviado) {
            echo "{$this->canalComunicacao->nome()} enviada com sucesso!";
        }
    }
}