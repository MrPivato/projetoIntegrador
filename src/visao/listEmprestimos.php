<?php
    include_once 'inc/header.inc.php'
?>
<body>
    <br clear="all">
    <div class="container">
        <h2>Pesquisar</h2>
        <p>Digite algo para filtrar</p>
        <input class="form-control" id="myInput" type="text" placeholder="Digite algo aqui">
        <br>
        <table class="table table-bordered">
            <thead class="headTable">
                <tr>
                    <th>Curso</th>
                    <th>Nome</th>
                    <th>Dados Livro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <tr>
                    <td>INFO</td>
                    <td>
                        <a href="#">Jose corno viado da silva</a>
                        <hr>
                        <b>201710040123</b>
                    </td>
                    <td>
                        <div class="container">
                            <p>
                                <button class="btn btn-info bot-list" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                Mostrar todas informações do livro
                                </button>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="#">MAT1-030</a> 
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="#">Funcionário que verificou</a> 
                                        <span class="badge badge-info badge-pill">Verificador</span>
                                        <!-- fica aqui para ser preenchido -->
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Condição de recebimento
                                        <span class="badge badge-success badge-pill">Novo</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Condição de entrega
                                        <span class="badge badge-warning badge-pill">Usado</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Status entrega
                                        <span class="badge badge-warning badge-pill">Pendente</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Data de recebimento
                                        <span class="badge badge-primary badge-pill">20/01/2018</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Data de devolução
                                        <span class="badge badge-secondary badge-pill">20/01/2018</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Prazo para entrega
                                        <span class="badge badge-danger badge-pill">20/12/2018</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Periodo de entrega
                                        <span class="badge badge-dark badge-pill">01/01/2018 - 20/12/2018</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                    <td>
                        <!-- Alterar -->
                        <button type="button" class="btn btn-warning text-light" data-toggle="modal" data-target="#cpp"> 
                        <i class="fas fa-edit"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="cpp" tabindex="-1" role="dialog" aria-labelledby="cpp" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">X &nbsp; </button>
                                    <?php 
                                        include_once "cadAluno.php";
                                        ?>
                                </div>
                            </div>
                        </div>
                        <!-- -->
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
                                        <a href='listcrianca.php?id={$registro['id']}' type='button' class='btn btn-success' id='delete'>Confirmar</a>
                                        <button type='button' data-dismiss='modal' class='btn btn-danger'>Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- -->
                        <!-- Mostrar todos -->
                        <button type="button" class="btn btn-primary text-light" data-toggle="modal" data-target="#cpp3"> 
                        <i class="fas fa-clipboard-list"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="cpp3" tabindex="-1" role="dialog" aria-labelledby="cpp3" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">X &nbsp; </button>
                                    <?php 
                                        include_once "listAluno.php";
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- -->
                    </td>
                </tr>
            </tbody>
        </table>
        <!--
        <p>Nota: talvez seja um problema ja q filtra tudo q digitar</p>
        <p>Nota: link aluno para detalhes dele</p>
        <p>Nota: adicionar carrosel home </p>
        <p>Nota: tooltips</p>
        <p>Nota: Quando clicar em mostrar todos empréstimos, só mostra tabela</p>
        -->
    </div>
</body>
</html>
