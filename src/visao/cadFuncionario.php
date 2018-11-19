<?php 
include_once 'inc/redirecionamento.inc.php';
?>
<?php
//Include das classes via autoload
include_once '../autoload.php';
//Caso tenha sido feito um POST da página
if($_POST){
        //Cria o Controle desta View (página)
        $funcionarioControle = new ControleFuncionario();

        //Passa o POST desta View para o Controle
        $funcionarioControle->setVisao($_POST);
        //Verifica qual ação (inserir ou alterar) vai passar para o Controle
        if(empty($_POST["id"])){
                $retorno = $funcionarioControle->controleAcao("inserir");
                if($retorno) {$msg="Funcionário inserido com sucesso!";}
                else{$erro="Houve um erro na inserção do funcionario";}
        }else{
                $retorno = $funcionarioControle->controleAcao("alterar");
                if($retorno) {
                        $msg="Funcionário alterado com sucesso!";
                }
                else{$erro="Houve um erro na alteração do funcionario";}
        }

}elseif($_GET){ // Caso os dados sejam enviados via GET

        //Cria o Controle desta View (página)
        $funcionarioControle = new ControleFuncionario();
        //Passa o GET desta View para o Controle
        $funcionarioControle->setVisao($_GET);

        //Verifico qual operação será realizada
        if(isset($_GET["op"])){

                //Verifico a existência dos campos obrigatórios
                if (isset($_GET["matricula"])) {

                        //Verifica qual ação (excluir ou listar para alteração) vai passar para o Controle
                        if($_GET["op"] == "exc"){
                                // excluir o Funcionário do banco de dados
                                $retorno=$funcionarioControle->controleAcao("excluir");
                                if($retorno) {$msg="Funcionário excluído com sucesso!";}
                                else{$erro="Houve um erro na exclusão do funcionario";}
                        }elseif ($_GET["op"] == "alt") {
                                // O $funcionarioAlteracao será utilizado no formulário para preencher os dados do Funcionário 
                                // que foram pesquisados no banco de dados
                                $funcionarioAlteracao = $funcionarioControle->controleAcao("listarUnico",$_GET["matricula"]);

                        }
                }    

        }  if(isset($_GET["pesquisa"])){

        // O $funcionarios será utilizado para preencher a tabela com os funcionarios cadastrados  
        $funcionarios = array();
        $funcionarios = $funcionarioControle->controleAcao("listarTodos",$_GET["pesquisa"]);
                }  
}


$cursoControle = new ControleCurso();
$listCursos = new Curso;

$cursos = array();
$cursos = $cursoControle->controleAcao("listarTodos"); 
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
      <form action="cadFuncionario.php" method="POST" name="cad_livro">
      <div class="container">
         <br clear="all">
         <div class="main-div">
            <div class="cadLivro-form">
               <div class="form-group">
                  <h2>Cadastro de Funcionários</h2>
               </div>
               <div class="form-group">
                  <label for="nome">Informe o nome</label>
                  <input value="<?php isset($funcionarioAlteracao) ? print($funcionarioAlteracao->getNome()) : '';?>" id="nome" name="nome" type="text" placeholder="Informe o nome" class="form-control" required="">
               </div>
               
               <div class="form-group">
                  <label for="email">Informe o email</label>
                  <input value="<?php isset($funcionarioAlteracao) ? print($funcionarioAlteracao->getEmail()) : '';?>" id="email" name="email" type="email" placeholder="Informe o email" class="form-control" required="">
               </div>
               
               <div class="form-group">
                  <label for="matricula">Informe a senha</label>
                  <input value="<?php isset($funcionarioAlteracao) ? print($funcionarioAlteracao->getMatricula()) : '';?>" id="senha" name="senha" type="password" placeholder="Informe a senha" class="form-control" required="" style="padding-top:0px;">
               </div>


               <div class="form-group">
                  <label for="curso">Escolha o Status do Funcionário</label>
                  <select id="status" name="status" class="form-control" required="">
                     <option selected disabled selected>Escolha o status</option>
                     <option>Empregado</option>
                     <option>Afastado</option>
                  </select>
                <input type="hidden" name="id" value="<?php isset($funcionarioAlteracao) ? print($funcionarioAlteracao->getMatricula()) : '';?>">
               </div>
               <button  id="login" name="login" class="btn btn-primary">Confirmar</button>
               <button id="reset" name="cancelar" type="reset" class="botao-rst" class="btn btn-primary">Cancelar</button>
            </div>
         </div>
      </div>
   </body>
</html>
