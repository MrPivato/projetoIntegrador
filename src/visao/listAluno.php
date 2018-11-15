<?php
     include_once 'inc/header.inc.php'
     ?>

<body>
    <br clear="all">
    <div class="container">
        <h2>Pesquisar</h2>
        <p>Selecione o filtro:</p>
        
        <input type="radio" name="filtro" value="0"> Matrícula
        <input type="radio" name="filtro" value="1"> Nome
        <input type="radio" name="filtro" value="2"> Curso
        <input type="radio" name="filtro" value="3"> Email
        <input type="radio" name="filtro" value="4"> Status

        <br clear="all"><br clear="all">       

        <input class="form-control" onkeyup="filtrar()" id="inputPesquisa" type="text" placeholder="Pesquise aqui">

        <br clear="all"> 

        <table class="table table-bordered">
            <thead class="headTable">
                <tr>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Curso</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <tr>
                    <td>0013432</td>
                    <td>Sidi </td>
                    <td>Info </td>
                    <td>sidigay@horsefucker.com </td>
                    <td>Fofo </td>

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
                        <!-- Mostrar todos -->
                        <a href='listEmprestimos.php?id={$registro[' id ']}' class="btn btn-info text-light">
                            <i class="fas fa-clipboard-list"></i>
                        </a>


                        <!-- -->

                    </td>
                </tr>


                <tr>
                    <td>3216546</td>
                    <td>Jose gay </td>
                    <td>Agro </td>
                    <td>josecorno@horsefucker.com </td>
                    <td>Lindo </td>

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
                        <!-- Mostrar todos -->
                        <a href='listEmprestimos.php?id={$registro[' id ']}' class="btn btn-info text-light">
                            <i class="fas fa-clipboard-list"></i>
                        </a>


                        <!-- -->

                    </td>
                </tr>



            </tbody>
        </table>

    </div>

</body>

</html>