<?php 
	include_once 'inc/redirecionamento.inc.php';

//Include das classes via autoload
include_once '../autoload.php';
//Cria o Controle desta View e instaância o Estudante
$emprestimoControle = new ControleEmprestimo();
$list = new Emprestimo;

$emprestimos = array();
$emprestimos = $emprestimoControle->controleAcao("listarTodos");
// Vamos fazer um include só com o form, que passa informaçoes para
// outra página, e está faz as alterações
// daí redireciona pra esta aqui


    include_once 'inc/header.inc.php'
    ?>
<body>
    <br clear="all">
    <div class="container">

        <h2>Pesquisar</h2>
        <p>Selecione o filtro:</p>
        
        <input type="radio" name="filtro" value="0"> Curso
        <input type="radio" name="filtro" value="1"> Nome
        <input type="radio" name="filtro" value="2"> Dados Livro
        <br clear="all"><br clear="all">       

        <input class="form-control" onkeyup="filtrar()" id="inputPesquisa" type="text" placeholder="Pesquise aqui">

        <br clear="all"> 

        <table class="table table-bordered">
            <thead class="headTable">
                <tr>
                    <th>Matrícula</th>
                    <th>Código de Barras</th>
                    <th>Data para devolução</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <tr>

                    <?php 
$list->printTodos($emprestimos);
?>
                </tr>
            </tbody>
        </table>
       
    </div>
</body>
</html>
