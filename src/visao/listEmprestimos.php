<!DOCTYPE html>
<html lang="en">
    <head>
        <title>listagem</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <br><br><br>
        <div class="container">
            <h2>Pesquisar</h2>
            <p>Digite algo para filtrar</p>  
            <input class="form-control" id="myInput" type="text" placeholder="Digite algo aqui">
            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Período</th>
                        <th>Status</th>
                        <th>Açao</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <tr>
                        <td>1</td>
                        <td>Jose corno viado da silva</td>
                        <td>1 ano</td>
                        <td>ativo</td>
                        <td>
                            <button type="button" class="btn btn-success">Alterar</button>
                            <button type="button" class="btn btn-danger">Deletar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>sednei rossetti junior</td>
                        <td>3 anos</td>
                        <td>atrasado</td>
                        <td>
                            <button type="button" class="btn btn-success">Alterar</button>
                            <button type="button" class="btn btn-danger">Deletar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Dooley</td>
                        <td>2 anos</td>
                        <td>ativo</td>
                        <td>
                            <button type="button" class="btn btn-success">Alterar</button>
                            <button type="button" class="btn btn-danger">Deletar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>fico</td>
                        <td>muito</td>
                        <td>top</td>
                        <td>
                            <button type="button" class="btn btn-success">Alterar</button>
                            <button type="button" class="btn btn-danger">Deletar</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p>Nota: talvez seja um problema ja q filtra tudo q digitar</p>
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
