<?php

use App\Model\PedidoDAO;

require 'vendor/autoload.php';

$pedidoDao = new PedidoDAO;

print_r($pedidoDao->getAllPedidos());
