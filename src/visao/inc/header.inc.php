<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script type="text/javascript" src="js/app.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar" style="background-color: #33A047;">

        <img style="float: left; margin: 0.5%; width:3%;" src="img/logoif.png" alt="logoif" />

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link navHeader" href="index.php" style="font-size:2em;">IFRS
                    <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse row" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle navHeader" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false"
                        aria-expanded="true">
                        Alunos
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="cadAluno.php">Cadastrar</a>
                        <a class="dropdown-item" href="listAluno.php">Listar</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle navHeader" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false"
                        aria-expanded="true">
                        Livros
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="cadLivro.php">Cadastrar</a>
                        <a class="dropdown-item" href="listLivro.php">Listar</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle navHeader" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false"
                        aria-expanded="true">
                        Empréstimos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="cadEmprestimo.php">Cadastrar</a>
                        <a class="dropdown-item" href="listEmprestimos.php">Listar</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle navHeader" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false"
                        aria-expanded="true">
                        Categorias
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="cadCat.php">Cadastrar</a>
                        <a class="dropdown-item" href="listCat.php">Listar</a>
                    </div>
                </li>
            </ul>

        </div>
    </nav>
</body>

</html>
