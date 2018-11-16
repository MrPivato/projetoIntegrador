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
    $categoriaControle = new ControleCategoria();

    //Passa o POST desta View para o Controle
    $categoriaControle->setVisao($_POST);
    //Verifica qual ação (inserir ou alterar) vai passar para o Controle
    if(empty($_POST["id"])){
        $retorno = $categoriaControle->controleAcao("inserir");
        if($retorno) {$msg="Categoria inserida com sucesso!";}
        else{$erro="Houve um erro na inserção da categoria!";}
    }else{
        $retorno = $categoriaControle->controleAcao("alterar");
        if($retorno) {$msg="Categoria alterado com sucesso!";}
        else{$erro="Houve um erro na alteração da categoria!";}
    }
   
}elseif($_GET){ // Caso os dados sejam enviados via GET
   
    //Cria o Controle desta View (página)
    $categoriaControle = new ControleCategoria();
    //Passa o GET desta View para o Controle
    $categoriaControle->setVisao($_GET);
            
    //Verifico qual operação será realizada
    if(isset($_GET["op"])){
        
        //Verifico a existência dos campos obrigatórios
        if (isset($_GET["categoria"])) {
            
            //Verifica qual ação (excluir ou listar para alteração) vai passar para o Controle
            if($_GET["op"] == "exc"){
                // excluir o categoria do banco de dados
                $retorno=$categoriaControle->controleAcao("excluir");
                if($retorno) {$msg="Categoria excluído com sucesso!";}
                else{$erro="Houve um erro na exclusão do categoria!";}
            }elseif ($_GET["op"] == "alt") {
                // O $categoriaAlteracao será utilizado no formulário para preencher os dados do categoria 
                // que foram pesquisados no banco de dados
                $categoriaAlteracao = $categoriaControle->controleAcao("listarUnico",$_GET["id"]);
                
            }
        }    

    }  if(isset($_GET["pesquisa"])){
        
        // O $categoria será utilizado para preencher a tabela com os categorias cadastrados  
        $categoria = array();
        $categoria = $categoriaControle->controleAcao("listarTodos",$_GET["pesquisa"]);
        
    }  
}


?>






    <body id="cadLivroForm">
		<?php
			include "inc/header.inc.php";
		?>
	<form action="cadCat.php" method="POST" name="cad_livro">
        <div class="container">
		<br clear="all">
            <div class="main-div">
            <div class="cadLivro-form">
            <div class="form-group">
				<h2>Cadastro de Categorias</h2>

			<div class="form-group">
				<label for="nome">Informe a categoria</label>
                <input id="categoria" name="categoria" type="text" placeholder="Informe a categoria" class="form-control" required="">
            </div>
			
                <button id="login" name="login" class="btn btn-primary">Confirmar</button>
                        
                <button id="reset" name="cancelar" type="reset" class="btn btn-danger" class="btn btn-primary">Cancelar</button>
                    </form>
            </div>
            </div>
        </div>
	</body>
</html>
