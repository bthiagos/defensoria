<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Defensoria</title>
    <link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-default navbar-expand-xl navbar-light">
        <div class="navbar-header d-flex col">
            <a class="navbar-brand" href="#"><i class="fa fa-cube"></i>Portal<b>Defensoria</b></a>
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse"
                class="navbar-toggle navbar-toggler ml-auto">
                <span class="navbar-toggler-icon"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <ul class="nav navbar-nav">
                <li class="nav-item active"><a href="#" class="nav-link">Inicio</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Tutorial</a></li>

            </ul>
            <form class="navbar-form form-inline">

            </form>
            <ul class="nav navbar-nav navbar-right ml-auto">


                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img
                            src="https://img.icons8.com/ios-glyphs/64/000000/person-male.png" class="avatar"
                            alt="Avatar"> Entrar <b class="caret"></b></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="login-form">
        <form action="login.php" method="POST">
            <h2 class="text-center">Login</h2>
            <?php
              if(isset($_SESSION['nao_autenticado'])):
             ?>

            <!-- Modal -->
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Erro!</h4>
                <hr>
                <p class="mb-0">Matrícula ou senha inválidos.</p>
            </div>
            <?php
              endif;
              unset($_SESSION['nao_autenticado']);
            ?>
            <div class="form-group">
                <input name="mat_func" type="number" class="form-control" placeholder="Matrícula" required="required">
            </div>
            <div class="form-group">
                <input name="senha_func" type="password" class="form-control" placeholder="Senha" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <div class="clearfix">
                <label class="pull-left checkbox-inline"><input type="checkbox"> Lembrar</label>
                <a href="#" class="pull-right">Esqueceu a senha?</a>
            </div>
        </form>
        <p class="text-center"><a href="#">Portal Defensoria</a></p>
    </div>


    <script src="https://ajasx.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>