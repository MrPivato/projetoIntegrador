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
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <tr>
                    <td>0013432</td>
                    <td>
                        Biologia
                    </td>

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

                    </td>
                </tr>



            </tbody>
        </table>




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