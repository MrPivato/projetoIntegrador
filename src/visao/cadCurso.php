<!DOCTYPE html>
<html>
    <head>
        <link href="css/Cadastro.css" rel="stylesheet" type="text/css"/>   
		<link href="https://fonts.googleapis.com/css?family=Libre+Franklin" rel="stylesheet">

<?php


//Include das classes via autoload
include_once '../autoload.php';
//Caso tenha sido feito um POST da página
if($_POST){
    //Cria o Controle desta View (página)
    $cursoControle = new ControleCurso();

    //Passa o POST desta View para o Controle
    $cursoControle->setVisao($_POST);
    //Verifica qual ação (inserir ou alterar) vai passar para o Controle
    if(empty($_POST["id"])){
        $retorno = $cursoControle->controleAcao("inserir");
        if($retorno) {$msg="Curso inserida com sucesso!";}
        else{$erro="Houve um erro na inserção do curso!";}
    }else{
        $retorno = $cursoControle->controleAcao("alterar");
        if($retorno) {$msg="Curso alterado com sucesso!";}
        else{$erro="Houve um erro na alteração do curso!";}
    }
   
}elseif($_GET){ // Caso os dados sejam enviados via GET
   
    //Cria o Controle desta View (página)
    $cursoControle = new ControleCurso();
    //Passa o GET desta View para o Controle
    $cursoControle->setVisao($_GET);
            
    //Verifico qual operação será realizada
    if(isset($_GET["op"])){
        
        //Verifico a existência dos campos obrigatórios
        if (isset($_GET["curso"])) {
            
            //Verifica qual ação (excluir ou listar para alteração) vai passar para o Controle
            if($_GET["op"] == "exc"){
                // excluir o curso do banco de dados
                $retorno=$cursoControle->controleAcao("excluir");
                if($retorno) {$msg="Curso excluído com sucesso!";}
                else{$erro="Houve um erro na exclusão do curso!";}
            }elseif ($_GET["op"] == "alt") {
                // O $cursoAlteracao será utilizado no formulário para preencher os dados do curso 
                // que foram pesquisados no banco de dados
                $cursoAlteracao = $cursoControle->controleAcao("listarUnico",$_GET["id"]);
                
            }
        }    

    }  if(isset($_GET["pesquisa"])){
        
        // O $curso será utilizado para preencher a tabela com os cursos cadastrados  
        $curso = array();
        $curso = $cursoControle->controleAcao("listarTodos",$_GET["pesquisa"]);
        
    }  
}


?>






    <body id="cadLivroForm">
		<?php
			include "inc/header.inc.php";
		?>
	<form action="cadCurso.php" method="POST" name="cad_livro">
        <div class="container">
		<br clear="all">
            <div class="main-div">
            <div class="cadLivro-form">
            <div class="form-group">
				<h2>Cadastro de Cursos</h2>

			<div class="form-group">
				<label for="nome">Informe o curso</label>
                <input id="curso" name="curso" type="text" placeholder="Informe o curso" class="form-control" required="">
            </div>
			
                <button id="login" name="login" class="btn btn-primary">Confirmar</button>
                        
                <button id="reset" name="cancelar" type="reset" class="btn btn-danger" class="btn btn-primary">Cancelar</button>
                    </form>
            </div>
            </div>
        </div>
	</body>
</html>
