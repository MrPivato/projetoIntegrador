<?php
    session_start();
    if (isset($_COOKIE["logado"])) {
        if ($_COOKIE["logado"] == 'on') {
            $_SESSION["usuario"] = $_COOKIE["usuario"];
        }
    }
    if (!isset($_SESSION["usuario"])) {
        header("Location: login.php");
        exit;
    }
    $usuario = $_SESSION['usuario'];
	
?>


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
          $emprestimoControle = new ControleEmprestimo();
      
          //Passa o POST desta View para o Controle
          $emprestimoControle->setVisao($_POST);
          //Verifica qual ação (inserir ou alterar) vai passar para o Controle
          if(empty($_POST["alterar"])){
              $retorno = $emprestimoControle->controleAcao("inserir");
              if($retorno) {$msg="Estudante inserido com sucesso!";}
              else{$erro="Houve um erro na inserção do estudante!";}
          }else{
              $retorno = $emprestimoControle->controleAcao("alterar");
              if($retorno) {$msg="Estudante alterado com sucesso!";}
              else{$erro="Houve um erro na alteração do estudante!";}
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
      <form action="cadEmprestimo.php" method="POST" name="cad_emprestimo">
      <div class="container">
         <br clear="all">
         <div class="main-div">
            <div class="cadLivro-form">
               <div class="form-group">
                  <h2>Cadastro de Emprestimos</h2>
                  <p>NOTA: acho q vai ter q tira esse h2 de cima "Cadastro de Emprestimos", por causa do alterar</p>
                  <p>NOTA: coloquei tudo q eu achei, ctz que tem coisa a mais, dai tu tira, ctz que é mais rapido q coloca"</p>
                  <p>NOTA: tem varios hidden q acho q vai ser removido, verifica ai"</p>
               </div>
               <div class="form-group">
                  <label for="nome">Informe o nome do estudante</label>
                  <input id="nome" name="nome" type="text" placeholder="Informe o nome do estudante" class="form-control" required="">
               </div>
			     <div class="form-group">
                  <label for="matricula">Informe a matrícula do estudante(opcional)</label>
                  <input id="matricula" name="matricula" type="number" placeholder="Informe a matrícula do estudante" class="form-control">
               </div>
               <div class="form-group">
                  <label for="curso">Escolha o Curso</label>
                  <select id="curso" name="curso" class="form-control" >
				  <option selected disabled selected>Escolha o Curso</option>
				<?php
					$cursoControle = new ControleCurso();
					$listCursos = new Curso;
					$cursos = array();
					$cursos = $cursoControle->controleAcao("listarTodos");
					$listCursos->printCursos($cursos);
				?>
                  </select>
               </div>
			   
               <div class="form-group">
                  <label for="livro">Informe o livro</label>
                  <input id="livro" name="livro" type="text" placeholder="Informe o livro" class="form-control" required="">
               </div>
			   
               <div class="form-group">
                  <label for="curso">Escolha o Status do Estudante</label>
                  <select id="status" name="status" class="form-control" required="">
                     <option selected disabled selected>Escolha o status</option>
                     <option>Matriculado</option>
                     <option>Desmatriculado</option>
                  </select>
               </div>
			   
			     <div class="form-group">
                  <label for="curso">Escolha a condiçao de entrega</label>
                  <select id="condicaoEntrega" name="condicaoEntrega" class="form-control" required="">
                     <option selected disabled selected>Escolha a condicao de entrega</option>
                     <option>Novo</option>
                     <option>Usado</option>
                     <option>Velho</option>
                     <option>Estraviado</option>
                  </select>
               </div>
			   
			    <div class="form-group">
                  <label for="dataDeEntrega">Informe a data de entrega</label>
                  <input id="dataDeEntrega" name="dataDeEntrega" type="date" placeholder="Informe a data de entrega" class="form-control" required="">
               </div>
			
<!-- hidden -->			   
			   <div class="form-group">
                  <input id="statusEntrega" name="statusEntrega" type="hidden" value="ativo" placeholder="Informe o status de entrega" class="form-control" >
               </div>
			   
			    <div class="form-group">
                  <input id="condicaoEntrega" name="condicaoEntrega" type="hidden" value="" placeholder="Informe a 	condicao de entrega" class="form-control" >
               </div>
			   
			    <div class="form-group">
                  <input id="codBarrasLivro" name="codBarrasLivro" type="hidden" value="" placeholder="Informe o codigo de barras" class="form-control" >
               </div>
			   
			    <div class="form-group">
                  <input id="verificacaoEntrega" name="verificacaoEntrega" type="hidden" value="" placeholder="Informe a verificacao de entrega" class="form-control" >
               </div>
			   
			   <div class="form-group">
                  <input id="id" name="id" type="hidden" value="" placeholder="Informe o id" class="form-control" >
               </div>
<!-- fim hidden -->				   
			
               <button id="login" name="login" class="btn btn-primary">Confirmar</button>
			   
               <button id="reset" name="cancelar" type="reset" class="botao-rst" class="btn btn-primary">Cancelar</button>
            </div>
         </div>
      </div>
   </body>
</html>
