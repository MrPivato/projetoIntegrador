
<?php 
	include_once 'inc/redirecionamento.inc.php';
?>



<?php
//Include das classes via autoload
include_once '../autoload.php';
//Cria o Controle desta View e instaância o Funcionário
$funcionarioControle = new ControleFuncionario();
$list = new Funcionario;

$funcionarios = array();
$funcionarios = $funcionarioControle->controleAcao("listarTodos");
// Vamos fazer um include só com o form, que passa informaçoes para
// outra página, e está faz as alterações
// daí redireciona pra esta aqui
?>

<?php
include_once 'inc/header.inc.php'
?>

<body>
   <br clear="all">
   <div class="container">
      <h2>Pesquisar</h2>
      <p>Selecione o filtro:</p>
      <input type="radio" name="filtro" value="0"> Id
      <input type="radio" name="filtro" value="1"> Nome
      <input type="radio" name="filtro" value="2"> Senha
      <input type="radio" name="filtro" value="3"> Email
      <input type="radio" name="filtro" value="4"> Status
      <br clear="all"><br clear="all">       
      <input class="form-control" onkeyup="filtrar()" id="inputPesquisa" type="text" placeholder="Pesquise aqui">
      <br clear="all"> 
      <table class="table table-bordered">
         <thead class="headTable">
            <tr>
               <th>Id</th>
               <th>Nome</th>
               <th>Senha</th>
               <th>Email</th>
               <th>Status</th>
               <th style="width: 20%">Ação</th>
            </tr>
         </thead>
         <tbody id="myTable">
            <tr>
<?php 
$list->printTodos($funcionarios);
?>
            </tr>
         </tbody>
      </table>
   </div>
</body>
</html>
