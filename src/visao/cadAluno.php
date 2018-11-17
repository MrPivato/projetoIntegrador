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
          $estudanteControle = new ControleEstudante();
      
          //Passa o POST desta View para o Controle
          $estudanteControle->setVisao($_POST);
          //Verifica qual ação (inserir ou alterar) vai passar para o Controle
          if(empty($_POST["alterar"])){
              $retorno = $estudanteControle->controleAcao("inserir");
              if($retorno) {$msg="Estudante inserido com sucesso!";}
              else{$erro="Houve um erro na inserção do estudante!";}
          }else{
              $retorno = $estudanteControle->controleAcao("alterar");
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
      <form action="cadAluno.php" method="POST" name="cad_livro">
      <div class="container">
         <br clear="all">
         <div class="main-div">
            <div class="cadLivro-form">
               <div class="form-group">
                  <h2>Cadastro de Alunos</h2>
               </div>
               <div class="form-group">
                  <label for="nome">Informe o nome</label>
                  <input id="nome" name="nome" type="text" placeholder="Informe o nome" class="form-control" required="">
               </div>
               <div class="form-group">
                  <label for="curso">Escolha o Curso</label>
                  <select id="curso" name="curso" class="form-control" required="">
<?php
$cursoControle = new ControleCurso();
$listCursos = new Curso;

$cursos = array();
$cursos = $cursoControle->controleAcao("listarTodos");

$listCursos->printTodos($cursos);
?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="email">Informe o email</label>
                  <input id="email" name="email" type="email" placeholder="Informe o email" class="form-control" required="">
               </div>
               <div class="form-group">
                  <label for="matricula">Informe o matricula</label>
                  <input  id="matricula" name="matricula" type="number" placeholder="Informe o matricula" class="form-control" required="" style="padding-top:0px;">
               </div>
               <div class="form-group">
                  <label for="curso">Escolha o Status do Estudante</label>
                  <select id="status" name="status" class="form-control" required="">
                     <option selected disabled selected>Escolha o status</option>
                     <option>Matriculado</option>
                     <option>Desmatriculado</option>
                  </select>
               </div>
               <button id="login" name="login" class="btn btn-primary">Confirmar</button>
               <button id="reset" name="cancelar" type="reset" class="botao-rst" class="btn btn-primary">Cancelar</button>
            </div>
         </div>
      </div>
   </body>
</html>
