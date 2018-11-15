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
                    <th>Quantidade em estoque</th>
                    <th>Grande Área</th>

                    <th>Açao</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <tr>
                    <td>0013432</td>
                    <td>
                        <a href="#">Biologia 3</a>
                    </td>
                    <td>3</td>
                    <td>Marcos </td>
                    <td>10</td>
                    <td>Biologia</td>


                    <td>
                        <!-- Alterar -->
                        <button type="button" class="btn btn-warning text-light" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fas fa-edit"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">X &nbsp; </button>
                                    <?php 
		include_once "cadAluno.php";
	  ?>
                                </div>
                            </div>
                        </div>
                        <!-- Deletar -->
                        <button type="button" class="btn btn-danger text-light" data-toggle="modal" data-target="#cpp2">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="cpp2" tabindex="-1" role="dialog" aria-labelledby="cpp2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class='modal-body'>
                                        <p class='text-dark'>Deseja realmente excluir?</p>
                                    </div>
                                    <div class='modal-footer'>
                                        <a href='listcrianca.php?id={$registro[' id ']}' type='button' class='btn btn-success' id='delete'>Confirmar</a>
                                        <button type='button' data-dismiss='modal' class='btn btn-danger'>Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- -->
                        <!-- Mostrar todos -->
                        <button type="button" class="btn btn-info text-light" data-toggle="modal" data-target="#modalExemplares">
                            <i class="fas fa-clipboard-list"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="modalExemplares" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">X &nbsp; </button>
                                    <?php 
		include_once "listExemplares.php";
	  ?>
                    </td>
                </tr>


            </tbody>
        </table>
        </div>
</body>

</html>