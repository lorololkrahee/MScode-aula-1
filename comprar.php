<?php
require_once('dados.php');
require_once('compraService.php');
require_once('whatsapp.php');
require_once('Correios.php');


try {
    $produtoId = $_GET['id'] ?? null;

    $cliente = $_SESSION['clientes'][1];

    $_SESSION['cliente'] = $cliente;
    $produto = $_SESSION['produtos'][$produtoId];

    $_SESSION['clientes'][1] = $cliente->registrarCompra($produto, 1);
    $_SESSION['produtos'][$produtoId] = $produto;


    header('Location: clientes.php');

} catch (\Throwable $th) {
    echo $th->getMessage();
}

