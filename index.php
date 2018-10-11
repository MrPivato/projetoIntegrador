<?php
include_once 'model/cliente.php';
include_once 'dao/clienteDAO.php';

use dao\ClienteDAO;
use model\Cliente;

$cliente = new model\Cliente();
$cliente->nome = "aaaaa";
$cliente->idade = 23;
var_dump($cliente);

$dao = new dao\ClienteDAO();
$retorno = $dao->salvar();
echo "<br>" . $retorno;
