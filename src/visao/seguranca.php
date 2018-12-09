<?php

// session_start inicia a sessão
session_start();

// resgata variáveis do formulário
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$codificada = base64_encode($senha);
 
if (empty($usuario) || empty($senha))
{
    echo "<p><strong>Informe usuário e/ou senha!</strong></p>";
    echo "<a href='login.php'>Voltar</a>";
    exit;
}


$conexao = new mysqli("localhost", "root","", "projetoIntegrador");
if ($conexao->connect_error) {
    die("Erro na conexão: ".$conexao->connect_error);
}
$sql = "SELECT email,senha FROM Funcionario Where email = '{$_POST["usuario"]}' and senha = '{$codificada}'";

$resultado = $conexao->query($sql);
$registro = $resultado->fetch_array();
if(!$registro){
    unset($_SESSION['usuario']);
    setcookie("logado");
    setcookie("usuario");    
    echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos!');".
        "window.location.href='login.php';</script>";    
}else{
    $_SESSION['usuario'] = $usuario;
    if($_POST['lembrar']=="on"){
        setcookie("logado","on");
        setcookie("usuario",$usuario);    
    }
    header('location:index.php');
}

