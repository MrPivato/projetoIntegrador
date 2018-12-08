<!DOCTYPE html>
<html>
    <head>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300i" rel="stylesheet">
		<?php 
			include_once 'inc/redirecionamento.inc.php';
		?>
		<?php
			include_once 'inc/header.inc.php'
		?>
	<style>
		a.sidi{
			color:whitesmoke;
			font-size:40px;
			font-family: 'Roboto', sans-serif;
		}
		img{
			border-radius:3%;
		}
	
	</style>
<body>
<br/>
<div class="container">
    <div class="row justify-content-center ">
        <h1 style="font-family: 'Roboto', sans-serif;">Seja bem vindo!</h1>
    </div>
    <br/>
    <div class="row justify-content-center imghome">

        <div id="carouselHome" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselHome" data-slide-to="0" class="active"></li>
                <li data-target="#carouselHome" data-slide-to="1"></li>
                <li data-target="#carouselHome" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="im" src="img/oo.jpg" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><a class="sidi" class="ahome2 nav-link" href="cadLivro.php">Cadastrar Livros</a></h5>
                        
                    </div>
                </div>
                <div class="carousel-item">
                        <img class="im" src="img/p.png" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5><a class="sidi" class="ahome2 nav-link" href="cadAluno.php">Cadastrar Alunos</a></h5>
                        
                        </div>
                </div>
               
                <div class="carousel-item">
                        <img class="im" src="img/b.jpg" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5><a class="sidi" class="ahome2 nav-link" href="cadEmprestimo.php">Cadastrar Empréstimos</a></h5>
                        
                        </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</div>

</body>
</html>
