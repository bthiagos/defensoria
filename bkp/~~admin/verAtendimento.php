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
                    Visualizar Atendimento
                </div>
                <div class="panel-body">
                    <?php
                    //SELECT
                    if(isset($_GET['id'])):
                        $id = mysqli_escape_string($conexao, $_GET['id']);
                        $sql = "SELECT * FROM atendimento 
                        INNER JOIN funcionario ON funcionario.MAT_FUNC = atendimento.MAT_FUNC
                        INNER JOIN assistido ON assistido.RG_ASS = atendimento.RG_ASS
                        INNER JOIN area_do_direito ON area_do_direito.ID_DIREITO = atendimento.ID_DIREITO
                        WHERE ID_ATENDIMENTO = '$id'";
                        $resultado = mysqli_query($conexao, $sql);
                        $dados =  mysqli_fetch_array($resultado);
                    endif;    
                     ?>

                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td class="col-sm-2">Nº Atendimento: </td>
                                        <td class="col-sm-8"><?php echo $dados['ID_ATENDIMENTO']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nome:</td>
                                        <td><?php echo $dados['NOME_ASS']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>RG:</td>
                                        <td><?php echo $dados['RG_ASS']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sexo:</td>
                                        <td><?php echo $dados['SEXO_ASS']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>E-mail: </td>
                                        <td><?php echo $dados['EMAIL_ASS']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Área do Direito:</td>
                                        <td><?php echo $dados['NOME_DIREITO']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Prioridade:</td>
                                        <td><?php echo $dados['PRIORIDADE_ATENDIMENTO']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Comentário:</td>
                                        <td><?php echo $dados['COMENTARIO_ATENDIMENTO']; ?></td>
                                    </tr>
                                    <td>Estagiário:</td>
                                    <td><?php echo $dados['NOME_FUNC']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-10">

                                </div>
                                <div class="col-sm-2">
                                    <a href="consultarAtendimento.php" class="btn btn-danger btn-block">
                                        <i class='fa fa-arrow-left'></i>
                                        Voltar</a>
                                </div>
                            </div>
                        </div>
                    </div>
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