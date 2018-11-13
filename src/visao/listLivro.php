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
        <br>
        <table class="table table-bordered">
            <thead class="headTabela">
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
                        <button type="button" class="btn btn-warning text-light" data-toggle="modal" data-target="#exampleModalCenter"> Alterar</button>
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
                        <button type="button" class="btn btn-danger">Deletar</button>
                        <hr>
                        <button type="button" class="btn btn-info text-light" data-toggle="modal" data-target="#modalExemplares"> Mostrar todos exemplares</button>
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

                <tr>
                    <td>49456</td>
                    <td>
                        <a href="#">História 2</a>
                    </td>
                    <td>2</td>
                    <td>Jefferson </td>
                    <td>15</td>
                    <td>Biologia</td>

                    <td>
                        <button type="button" class="btn btn-warning text-light" data-toggle="modal" data-target="#exampleModalCenter"> Alterar</button>
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
                        <button type="button" class="btn btn-danger">Deletar</button>
                        <hr>
                        <button type="button" class="btn btn-info"> Mostrar todos empréstimos</button>
                    </td>
                </tr>

            </tbody>
        </table>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <?php 
		include_once "login.php";
	  ?>
                </div>
            </div>
        </div>

        <p>Nota: talvez seja um problema ja q filtra tudo q digitar</p>
        <p>Nota: link aluno para detalhes dele</p>
        <p>Nota: botaozinho nao clicavel para atrasado ativo</p>
        <p>Nota: adicionar carrosel home </p>
        <p>Nota: tooltips</p>
        <p>Nota: alterar usa motals cor amarela</p>
        </div>

        <script>
            $(document).ready(function () {
                $("#myInput").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
</body>

</html>