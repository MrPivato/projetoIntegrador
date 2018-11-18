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




<?php
//Include das classes via autoload
include_once '../autoload.php';
//Cria o Controle desta View e instaância o Estudante
$categoriaControle = new ControleCategoria();
$list = new Categoria;

$categoria = array();
$categoria = $categoriaControle->controleAcao("listarTodos");
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

        <input type="radio" name="filtro" value="0" checked> Nome


        <br clear="all">
        <br clear="all">

        <input class="form-control" onkeyup="filtrar()" id="inputPesquisa" type="text" placeholder="Pesquise aqui">

        <br clear="all">
        <table class="table table-bordered">
            <thead class="headTable">
                <tr>

                    <th style="width:80%">Nome</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <tr>
                    <?php 
$list->printTodos($categoria);
?>
                </tr>

            </tbody>
        </table>

    </div>

</body>

</html>
