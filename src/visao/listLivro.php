
<?php 
	include_once 'inc/redirecionamento.inc.php';
?>



<?php
//Include das classes via autoload
include_once '../autoload.php';
//Cria o Controle desta View e instaância o Livro
$livroControle = new ControleLivro();
$list = new Livro;

$livros = array();
$livros = $livroControle->controleAcao("listarTodos");
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

        <input type="radio" name="filtro" value="0"> ISBN
        <input type="radio" name="filtro" value="1"> Nome
        <input type="radio" name="filtro" value="2"> Volume
        <input type="radio" name="filtro" value="3"> Autor
        <input type="radio" name="filtro" value="4"> Quantidade em estoque
        <input type="radio" name="filtro" value="5"> Grande Área

        <br clear="all">
        <br clear="all">

        <input class="form-control" onkeyup="filtrar()" id="inputPesquisa" type="text" placeholder="Pesquise aqui">

        <br clear="all">
        <table class="table table-bordered">
            <thead class="headTable">
                <tr>
                    <th>ISBN</th>
                    <th>Nome</th>
                    <th>Volume</th>
                    <th>Autor</th>
                    <th>Grande Área</th>
                    <th>Status</th>
                    <th>Condição</th>
                    <th>Açao</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <tr>


<?php 
$list->printTodos($livros);
?>
</tr>
            </tbody>
        </table>
        </div>
</body>

</html>
