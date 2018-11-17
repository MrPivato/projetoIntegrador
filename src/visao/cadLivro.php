<!DOCTYPE html>
<html>
   <head>
      <link href="css/Cadastro.css" rel="stylesheet" type="text/css"/>
      <link href="https://fonts.googleapis.com/css?family=Libre+Franklin" rel="stylesheet">
      <?php
         include_once 'inc/header.inc.php'
         ?>
   </head>
   <?php
      //Include das classes via autoload
      include_once '../autoload.php';
      //Caso tenha sido feito um POST da página
      if($_POST){
          //Cria o Controle desta View (página)
          $livroControle = new ControleLivro();
      
          //Passa o POST desta View para o Controle
          $livroControle->setVisao($_POST);
          //Verifica qual ação (inserir ou alterar) vai passar para o Controle
          if(empty($_POST["alterar"])){
              $retorno = $livroControle->controleAcao("inserir");
              if($retorno) {$msg="Livro inserido com sucesso!";}
              else{$erro="Houve um erro na inserção do livro!";}
          }else{
              $retorno = $livroControle->controleAcao("alterar");
              if($retorno) {$msg="Livro alterado com sucesso!";}
              else{$erro="Houve um erro na alteração do livro!";}
          }
         
      }
      
      ?>
   </head>
    <body id="cadLivroForm">
	<?php 
                    //Imprime as mensagens
                    if(isset($msg)){ 
                        echo "<div class='alert alert-success' id='msg' name='msg'>".$msg."</div>";                             
                        $msg=null;
                    }
                    if(isset($erro)){ 
                        echo "<div class='alert alert-danger' id='msg' name='erro'>".$erro."</div>"; 
                        $msg=null;
                    }                
               ?>          
	<form action="cadLivro.php" method="POST" name="cad_livro">
        <div class="container">
		<br clear="all">
            <div class="main-div">
            <div class="cadLivro-form">
           
				<h2>Cadastro de Livros</h2>
			
            <div class="form-group">
				<label for="categoria">Escolha a categoria</label>
					<select id="grande_area" name="grande_area" class="form-control" required="">
					<?php
$categoriaControle = new ControleCategoria;
$listCategoria = new Categoria;

$categorias = array();
$categorias = $categoriaControle->controleAcao("listarTodos");

$listCategoria->printCategorias($categorias);
?>
    
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
                <input  id="isbn" name="isbn" type="number" placeholder="Informe o ISBN" class="form-control" required="" style="padding-top:0px;">
			</div> 
			<div class="form-group">
				<label for="quantidade">Quantidade</label>
                <input  id="quantidade" name="quantidade" type="number" placeholder="Informe a quantidade" class="form-control" required="" style="padding-top:0px;">
			</div> 

			<div class="form-group">
				<label for="volume">Condições</label>
					<select id="condicao" name="condicao" class="form-control" required="">
						<option selected disabled selected>Escolha o volume</option>
						<option>Ótimo</option>
						<option>Regular</option>
						<option>Levemente estragado</option>
						<option>Estragado</option>
					</select>
			</div>

			<div class="form-group">
				<label for="volume">Status</label>
					<select id="status" name="status" class="form-control" required="">
						<option selected disabled selected>Escolha o volume</option>
						<option>Pendente</option>
						<option>Disponível</option>
					</select>
			</div>

                <button id="login" name="login" class="btn btn-primary">Confirmar</button>
                        
                <button id="reset" name="cancelar" type="reset" class="botao-rst" class="btn btn-primary">Cancelar</button>
                    </form>
            </div>
            </div>
        </div>
	</body>
</html>
