    <?php
     include_once 'inc/header.inc.php'
     ?>

    <body>

        <div class="container">
        
        <br clear="all"> 
            <table class="table table-bordered">
                <thead class="headTable">
                    <tr>
                        <th>Código</th>
                        <th>Status</th>
                        <th>Condições do livro</th>

                       
                        
                    </tr>
                </thead>
                <tbody id="myTable">
                    <tr>
                        <td>BIO0014</td>
                        <td><a  class="navbar-link" href="#modalDetalhe" data-toggle="modal"> Emprestado</a>
							<!-- Modal -->
<div class="modal fade" id="modalDetalhe" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
	 <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">X &nbsp; </button>
	 <?php 
		include_once "detalheEmprestimo.php";
	  ?>
    </div>
  </div>
</div>		</td>
                        <td>Fudido</td>

                    </tr>
					 <tr>
                        <td>BIO0015</td>
                        <td>Emprestado</td>
                        <td>Fudido</td>

                    </tr>
					 <tr>
                        <td>BIO0016</td>
                        <td>Disponível</td>
                        <td>Fudido</td>

                    </tr>
					
					

                </tbody>
            </table>


            <p>Nota: Pivato faz as coisa qnem tu fez na que tu fez</p>

        </div>


    </body>
</html>