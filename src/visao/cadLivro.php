<!DOCTYPE html>
<html>
    <head>
        <link href="css/Cadastro.css" rel="stylesheet" type="text/css"/>   
		<link href="https://fonts.googleapis.com/css?family=Libre+Franklin" rel="stylesheet">
    <body id="cadLivroForm">
		<?php
			include "inc/header.inc.php";
		?>
	<form action="cadLivro.php" method="POST" name="cad_livro">
        <div class="container">
		<br clear="all">
            <div class="main-div">
            <div class="cadLivro-form">
            <div class="form-group">
				<h2>Cadastro de Livros</h2>
			<div class="custom-file">
				<input type="file" name="custom-file" class="custom-file-input" id="customFile">
				<label for="imagem" class="custom-file-label" for="customFile">Escolha uma imagem</label>
			</div>
			</div>
            <div class="form-group">
				<label for="categoria">Escolha a categoria</label>
					<select id="categoria" name="categoria" class="form-control" required="">
						<option selected disabled selected>Escolha a categoria</option>
						<option>Biologia</option>
						<option>Matemática</option>
						<option>Física</option>
						<option>Geografia</option>
						<option>Português</option>
						<option>Quimica</option>
					</select>
			</div>	
			<div class="form-group">
				<label for="nome">Informe o nome</label>
                <input id="nome" name="nome" type="text" placeholder="Informe o nome" class="form-control" required="">
            </div>
			<div class="form-group">
				<label for="volume">Escolha o volume</label>
					<select id="volume" name="volume" class="form-control" required="">
						<option selected disabled selected>Escolha o volume</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
					</select>
			</div>
            <div class="form-group">
					<label for="autor">Informe o autor</label>
                    <input id="autor" name="autor" type="text" placeholder="Informe o autor" class="form-control" required="">
            </div>
			<div class="form-group">
				<label for="ISBN">Informe o ISBN</label>
                <input  id="ISBN" name="ISBN" type="number" placeholder="Informe o ISBN" class="form-control" required="" style="padding-top:0px;">
            </div> 
                <button id="login" name="login" class="btn btn-primary">Confirmar</button>
                        
                <button id="reset" name="cancelar" type="reset" class="botao-rst" class="btn btn-primary">Cancelar</button>
                    </form>
            </div>
            </div>
        </div>
	</body>
</html>
