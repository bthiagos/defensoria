<?php
if($_SESSION['id_tipo_func'] == 1){
    session_start();
}
else{
    session_destroy();
}
include('verifica_login.php');
include("conexao.php");
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Defensoria</title>
    <link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="img/favicon16x16.ico" sizes="16x16">
    <link rel="icon" href="img/favicon32x32.ico" sizes="32x32">
    <link rel="icon" href="img/favicon48x48.ico" sizes="48x48">
    <link rel="icon" href="img/favicon64x64.ico" sizes="64x64">
    <link rel="icon" href="img/favicon128x128.ico" sizes="128x128">
</head>

<body>
    <nav class="navbar navbar-default navbar-expand-xl navbar-light">
        <div class="navbar-header d-flex col">
            <a class="navbar-brand" href="painel.php"><i class="fa fa-cube"></i>Portal<b>Defensoria</b></a>
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
                <li class="nav-item active">
                    <a href="painel.php" class="nav-link">Atendimento</a>
                </li>
                <li class="nav-item dropdown">
                    <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Cadastros <b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="cadastro.php" class="dropdown-item">Cadastrar Estagiário</a>
                        </li>
                        <li>
                            <a href="cadastroAssistido.php" class="dropdown-item">Cadastrar Assistido</a>
                        </li>
                        <li>
                            <a href="listaFuncionarios.php" class="dropdown-item">Listar Funcionários</a>
                        </li>
                        <li>
                            <a href="listaAssistido.php" class="dropdown-item">Listar Assistidos</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Serviços <b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="relDesempenho.php" class="dropdown-item">Relatório de Desempenho</a>
                        </li>
                        <li>
                            <a href="relAtividadeComplementar.php" class="dropdown-item">Relatório de Atividade
                                Complementar</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right ml-auto">

                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
                        <img src="https://img.icons8.com/ios-filled/30/000000/user-male-circle.png">
                        <?php echo $_SESSION['nome_func'];?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="perfil.php" class="dropdown-item"><i class="fa fa-user"></i>Perfil
                            </a>
                        </li>
                        <li>
                            <a href="logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Sair
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <section id="painel">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Relatórios de Desempenho
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <h4>Lista de Estagiários</h4>
                        </div>
                        <div class="col-sm-3">
                            <!-- <a href="novoAtendimento.php" class="btn btn-primary btn-block">Adicionar Atendimento</a>-->
                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>Matrícula</th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Instituição de Ensino</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = "SELECT * FROM funcionario"; 
                                    $resultado = mysqli_query($conexao, $sql);
                                    while($dados = mysqli_fetch_array($resultado)):  
                                    ?>
                                    <tr>
                                        <td><?php echo $dados['MAT_FUNC']; ?></td>
                                        <td><?php echo $dados['NOME_FUNC']; ?></td>
                                        <td><?php echo $dados['EMAIL_FUNC']; ?></td>
                                        <td><?php echo $dados['INSTITUICAO_FUNC']; ?></td>

                                        <td>
                                            <a href="verDesempenho.php?id=<?php echo $dados['MAT_FUNC']; ?>"
                                                class="btn btn-success btn-custom">
                                                <i class="material-icons">visibility</i>
                                            </a>

                                        </td>

                                    </tr>
                                    <?php endwhile; ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <br /><br />
                </div>
            </div>
        </div>
        </div>

    </section>

    <script src="https://ajasx.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>