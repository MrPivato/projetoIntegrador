<?php
session_start();
if (isset($_COOKIE["logado"])) {
    if ($_COOKIE["logado"] == 'on') {
        $_SESSION["usuario"] = $_COOKIE["usuario"];
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body id="LoginForm">
        <div class="container">
		
            <h1 class="form-heading">Biblioteca IFRS</h1>
             <div class="main-div">
                 <div class="panel">
                        <h2>IFRS</h2>
                    </div>
                 <div class="ifrs-image"> 
                     <img class="backIMG" src="img/logo_vertical.png" alt=""/>
                 </div> 
            <div class="login-form">
                    
                    <form action="seguranca.php" method="post" class="form-horizontal">
                        <div class="form-group">
                            <input id="usuario" name="usuario" type="text" placeholder="Informe seu login" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input id="senha" name="senha" placeholder="Senha" type="password" class="form-control">
                        </div>
                        <button id="login" name="login" class="btn btn-primary">Logar</button>
                        <br>
                        <button class="botao-rst" id="reset" name="cancelar" type="reset" class="btn btn-primary">Cancelar</button>
                    </form>
                    <br>
                    
                </div>
            </div>
        </div>
