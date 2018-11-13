<!DOCTYPE html>
<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>   
    </head>
    <?php
    
    include 'inc/cabecalho.inc.php';
    
    ?>
    <body id="LoginForm">
        <br>
        <br>
        <h1>Cadastro de Alunos</h1>
        <div class="container">
             <div class="main-div">
                 <img src="logo_vertical.png" alt=""/>
            <div class="login-form">
                    
                    <form action="#" method="post" class="form-horizontal">
                        <div class="form-group">
                            <input id="usuario" name="usuario" type="text" placeholder="informe seu ..." class="form-control" required="">
                        </div>
                         <div class="form-group">
                            <input id="usuario" name="usuario" type="text" placeholder="informe seu ..." class="form-control" required="">
                        </div>
                         <div class="form-group">
                            <input id="usuario" name="usuario" type="text" placeholder="informe seu ..." class="form-control" required="">
                        </div> 
                        <div class="form-group">
                            <input id="usuario" name="usuario" type="text" placeholder="informe seu ..." class="form-control" required="">
                        </div>
                         <div class="form-group">
                            <input id="usuario" name="usuario" type="text" placeholder="informe seu ..." class="form-control" required="">
                        </div>
                        
                        <button id="login" name="login" class="btn btn-primary">Confirmar</button>
                        <br>
                        <br>
                        <button id="reset" name="cancelar" type="reset" class="btn btn-primary">Cancelar</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
