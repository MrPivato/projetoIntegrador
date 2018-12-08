<?php 
include_once 'inc/redirecionamento.inc.php';
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
                if($retorno) {$msg="Emprestimo inserido com sucesso!";}
                else{$erro="Houve um erro na inserção do Emprestimo!";}
        }else{
                $retorno = $emprestimoControle->controleAcao("alterar");
                if($retorno) {$msg="Emprestimo alterado com sucesso!";}
                else{$erro="Houve um erro na alteração do Emprestimo!";}
        }

}elseif($_GET){ // Caso os dados sejam enviados via GET

        //Cria o Controle desta View (página)
        $emprestimoControle = new ControleEmprestimo();
        //Passa o GET desta View para o Controle
        $emprestimoControle->setVisao($_GET);

        //Verifico qual operação será realizada
        if(isset($_GET["op"])){

                //Verifico a existência dos campos obrigatórios
                if (isset($_GET["codBarrasLivro"])) {

                        //Verifica qual ação (excluir ou listar para alteração) vai passar para o Controle
                        if($_GET["op"] == "exc"){
                                // excluir o estudante do banco de dados
                                $retorno=$emprestimoControle->controleAcao("excluir");
                                if($retorno) {$msg="Emprestimo excluído com sucesso!";}
                                else{$erro="Houve um erro na exclusão do Emprestimo!";}
                        }
                }
        }
}

$estudanteControle = new ControleEstudante();
$listEstudante = new Estudante;
$estudantes = array();
$estudantes = $estudanteControle->controleAcao("listarTodos");
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
               </div>


                 <div class="form-group">
                  <label for="matricula">Informe a matrícula do estudante</label>
                  <select id="matricula" name="matriculaEstudante" class="form-control" >
                  <option selected disabled selected>Escolha a matricula</option>
                    <?php $listEstudante->printEstudanteMatricula($estudantes);?>
                  </select>
               </div>

               <div class="form-group">
                  <label for="livro">Informe o livro</label>
                  <select id="livro" name="codBarrasLivro" class="form-control" >
                  <option selected disabled selected>Escolha o livro</option>
<?php
$livroControle = new ControleLivro();
$listLivro = new Livro;
$livros = array();
$livros = $livroControle->controleAcao("listarTodos");
$listLivro->printLivroCod($livros);
?>
                  </select>
               </div>

                <div class="form-group">
                  <label for="dataDeEntrega">Informe a data de entrega ao estudante</label>
                  <input id	="dataDeEntrega" name="dataDeEntrega" type="date" placeholder="Informe a data de entrega" class="form-control" required="">
               </div>

                <div class="form-group">
                  <label for="dataDeDevolucao">Informe a data de devolucao</label>
                  <input id	="dataDeDevolucao" name="dataDevolucao" type="date" placeholder="Informe a data de devolucao" class="form-control" required="">
               </div>

<!-- hidden -->			   
                <div class="form-group">
                  <input id="condicaoDevolucao" name="condicaoDevolucao" type="hidden" value="" placeholder="Informe a 	condicao de Devolucao" class="form-control" >
               </div>
<!-- fim hidden -->				   

               <button id="login" name="login" class="btn btn-primary">Confirmar</button>

               <button id="reset" name="cancelar" type="reset" class="botao-rst" class="btn btn-primary">Cancelar</button>
            </div>
         </div>
      </div>
   </body>
</html>
