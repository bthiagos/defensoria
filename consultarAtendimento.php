<?php
session_start();
include('verifica_login.php');
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="en">

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
                    <a href="painel.php" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item"><a href="#" class="nav-link">Tutorial</a></li>
                <li class="nav-item dropdown">
                    <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Serviços <b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="cadastro.php" class="dropdown-item">Cadastrar Estagiário</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item">Relatório de Desempenho</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item">Relatório de Atividade Complementar</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right ml-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link notifications"><i class="fa fa-bell-o"></i><span
                            class="badge">1</span></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link messages"><i class="fa fa-envelope-o"></i><span
                            class="badge">10</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img
                            src="https://www.tutorialrepublic.com/examples/images/avatar/2.jpg" class="avatar"
                            alt="Avatar" />
                        <?php echo $_SESSION['nome'];?> <b class="caret"></b>
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
                    Atendimentos
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-9"></div>
                        <div class="col-sm-3">
                            <a href="novoAtendimento.php" class="btn btn-primary btn-block">Adicionar Atendimento</a>
                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>Nº Atendimento</th>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Sexo</th>
                                        <th>E-mail</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM atendimento";
                                    $resultado = mysqli_query($conexao, $sql);
                                    while($dados = mysqli_fetch_array($resultado)):
                                    ?>
                                    <tr>
                                        <td><?php echo $dados['idatendimento']; ?></td>
                                        <td><?php echo $dados['nome_assistido']; ?></td>
                                        <td><?php echo $dados['cpf_assistido']; ?></td>
                                        <td><?php echo $dados['sexo_assistido']; ?></td>
                                        <td><?php echo $dados['email_assistido']; ?></td>
                                        <td>
                                            <a href="verAtendimento.php?id=<?php echo $dados['idatendimento']; ?>"
                                                class="btn btn-success btn-custom">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a href="#myModal<?php echo $dados['idatendimento']; ?>"
                                                class="btn btn-danger btn-custom"
                                                data-toggle="modal" data-target="#myModal">
                                                <i class="material-icons">delete</i></a>
                                        </td>
                                        <!-- Modal -->
                                        <div id="myModal<?php echo $dados['idatendimento']; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Modal Header</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Some text in the modal.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
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