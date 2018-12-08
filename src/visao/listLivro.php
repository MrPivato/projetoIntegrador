
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

<body id="cadLivroForm">
    <br clear="all">
    <div class="container">
        <h2>Pesquisar</h2>
        <p>Selecione o filtro:</p>

        <input type="radio" name="filtro" value="0"> ISBN
        <input type="radio" name="filtro" value="1"> Código
        <input type="radio" name="filtro" value="2"> Nome
        <input type="radio" name="filtro" value="3"> Volume
        <input type="radio" name="filtro" value="4"> Autor
        <input type="radio" name="filtro" value="5"> Grande Área
        <input type="radio" name="filtro" value="6"> Status
        <input type="radio" name="filtro" value="7"> Condição

        <br clear="all">
        <br clear="all">

        <input class="form-control" onkeyup="filtrar()" id="inputPesquisa" type="text" placeholder="Pesquise aqui">

        <br clear="all">
        <table class="table table-bordered">
            <thead class="headTable">
                <tr>
                    <th>ISBN</th>
                    <th>Código</th>
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
