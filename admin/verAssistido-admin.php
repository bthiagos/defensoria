<?php
header('Content-Type: text/html; charset=utf-8');
include("../conexao.php");
include('verifica_login-admin.php');
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
            <a class="navbar-brand" href="painel-admin.php"><i class="fa fa-cube"></i>Portal<b>Defensoria</b></a>
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
                    <a href="painel-admin.php" class="nav-link">Atendimento</a>
                </li>
                <li class="nav-item dropdown">
                    <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Cadastros <b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="cadastro-admin.php" class="dropdown-item">Cadastrar Estagiário</a>
                        </li>
                        <li>
                            <a href="cadastroAssistido-admin.php" class="dropdown-item">Cadastrar Assistido</a>
                        </li>
                        <li>
                            <a href="listaFuncionarios-admin.php" class="dropdown-item">Listar Funcionários</a>
                        </li>
                        <li>
                            <a href="listaAssistido-admin.php" class="dropdown-item">Listar Assistidos</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Serviços <b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="relDesempenho-admin.php" class="dropdown-item">Relatório de Desempenho</a>
                        </li>
                        <li>
                            <a href="relAtividadeComplementar-admin.php" class="dropdown-item">Relatório de Atividade
                                Complementar</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right ml-auto">

                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
                        <img src="https://img.icons8.com/ios-filled/30/000000/user-male-circle.png">
                        <?php echo $_SESSION['nome_func'];?><b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="perfil-admin.php" class="dropdown-item"><i class="fa fa-user"></i>Perfil
                            </a>
                        </li>
                        <li>
                            <a href="logout-admin.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Sair
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
                    Funcionário
                </div>
                <div class="panel-body">
                    <?php
                    //SELECT
                    if(isset($_GET['id'])):
                        $id = mysqli_escape_string($conexao, $_GET['id']);
                        $sql = "SELECT * FROM assistido  
                        INNER JOIN tipo_funcionario 
                        WHERE assistido.RG_ASS = '$id'"; 
                                               
                        $resultado = mysqli_query($conexao, $sql);
                        $dados =  mysqli_fetch_array($resultado);
                    endif;    
                     ?>

                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="box" style="padding-left: 10px;">
                                <form>
                                    <!--          NOVO FORM           -->
                                    <br />
                                    <!-- Nome e Sexo-->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 control">
                                                <label class="control-label" for="nome_ass">Nome Completo <h11>*</h11>
                                                </label>
                                                <input id="nome_ass" placeholder="<?php echo $dados['NOME_ASS']; ?>"
                                                    class="form-control input-md" required="" type="text" disabled>
                                            </div>
                                            <label class="col-md-1 control-label" for="radios">Sexo <h11>*</h11></label>
                                            <div class="col-md-4">
                                                <input id="sexo_ass" placeholder="<?php echo $dados['SEXO_ASS']; ?>"
                                                    class="form-control input-md" required="" type="text" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <br />

                                    <!-- RG e Estado Civil-->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control">
                                                <label class="control-label" for="rg_ass">RG <h11>*</h11>
                                                </label>
                                                <input id="rg_ass" placeholder="<?php echo $dados['RG_ASS']; ?>"
                                                    class="form-control input-md" required="" type="text" maxlength="9"
                                                    pattern="[0-9]+$" disabled>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control"></div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control">
                                                <label class="control-label" for="Estado Civil">Telefone <h11>*</h11>
                                                </label>
                                                <input type="text" class="form-control" id="telefone_ass"
                                                    placeholder="<?php echo $dados['TELEFONE_ASS']; ?>"
                                                    pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" disabled>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <br />
                                    <!-- E-mail e Estad-->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 control">
                                                <label class="control-label" for="email_ass">Email <h11>*</h11>
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-envelope"></i></span>
                                                    <input id="email_ass" name="email_ass" class="form-control"
                                                        placeholder="<?php echo $dados['EMAIL_ASS']; ?>" disabled
                                                        type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br />

                            </div>
                        </div>
                    </div>

                    </form>
                    <br /><br />

                    <div class="row">
                        <div class="col-sm-10">

                        </div>
                        <div class="col-sm-2">
                            <a href="listaAssistido-admin.php" class="btn btn-danger btn-block">
                                <i class='fa fa-arrow-left'></i>
                                Voltar</a>
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