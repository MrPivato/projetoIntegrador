
<?php 
	include_once 'inc/redirecionamento.inc.php';
?>




<?php
     include_once 'inc/header.inc.php'
     ?>

    <body>
        <div class="container">
            <h2>Pesquisar</h2>
            <p>Digite algo para filtrar</p>  
            <input class="form-control" id="myInput" type="text" placeholder="Digite algo aqui">
            <br><br>
            <table class="table table-bordered">
                <thead class="headTable">
                    <tr>
                        <th>Aluno</th>
                        <th>Livro</th>
                        <th>Código Livro</th>
                        <th>Condições Livro</th>
                       
                        
                    </tr>
                </thead>
                <tbody id="myTable">
                    <tr>
                        <td>Jonas</td>
                        <td>Biologia 1</td>
                        <td>BIO0014</td>
                        <td>Fudido</td>
                    </tr>
					
					

                </tbody>
            </table>


            <p>Nota: Pivato faz as coisa qnem tu fez na que tu fez</p>

        </div>


    </body>
</html>
