<?php
session_start();
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
                        <!--<li>
                            <a href="cadastro.php" class="dropdown-item">Cadastrar Estagiário</a>
                        </li>-->
                        <li>
                            <a href="cadastroAssistido.php" class="dropdown-item">Cadastrar Assistido</a>
                        </li>
                        <!--<li>
                            <a href="listaFuncionarios.php" class="dropdown-item">Listar Funcionários</a>
                        </li>-->
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
                        <?php echo $_SESSION['nome_func'];?><b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="perfil.php?id=<?php echo $_SESSION['mat_func']; ?>" class="dropdown-item"><i class="fa fa-user"></i>Perfil
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
                    Funcionário
                </div>
                <div class="panel-body">
                    <?php
                    //SELECT
                    if(isset($_GET['id'])):
                        $id = mysqli_escape_string($conexao, $_GET['id']);
                        $sql = "SELECT * FROM funcionario  
                        INNER JOIN tipo_funcionario ON tipo_funcionario.ID_TIPO_FUNC = funcionario.ID_TIPO_FUNC
                        WHERE funcionario.MAT_FUNC = '$id'"; 
                        //INNER JOIN atendimento ON atendimento.MAT_FUNC = funcionario.MAT_FUNC
                        //";
                      
                        /*$sql = "SELECT * FROM atendimento 
                        INNER JOIN funcionario ON funcionario.MAT_FUNC = atendimento.MAT_FUNC
                        INNER JOIN assistido ON assistido.RG_ASS = atendimento.RG_ASS
                        INNER JOIN area_do_direito ON area_do_direito.ID_DIREITO = atendimento.ID_DIREITO
                        INNER JOIN tipo_funcionario ON tipo_funcionario.ID_TIPO_FUNC = funcionario.ID_TIPO_FUNC
                        WHERE funcionario.MAT_FUNC = '$id'";*/
                         
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

                                    <br />
                                    <!--          NOVO FORM           -->

                                    <!-- matrícula  -->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control">
                                                <label for="matricula">Matrícula <h11>*</h11></label>
                                                <input name="mat_func" type="text" class="form-control" required="true"
                                                    id="matricula" placeholder="<?php echo $dados['MAT_FUNC']; ?>"
                                                    min="00001" max="99999" maxlength="5" pattern="[0-9]+$" disabled>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control"></div>

                                            <!-- CPF FUNCIONARIO -->
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control">
                                                <label for="CPF">CPF <h11>*</h11></label>
                                                <input name="cpf_func" type="text" class="form-control" required="true"
                                                    id="cpf_func" placeholder="<?php echo $dados['CPF_FUNC']; ?>"
                                                    maxlength="11" pattern="[0-9]+$" disabled>
                                            </div>

                                        </div>
                                    </div>

                                    <br />

                                    <!-- Nome Completo -->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control">
                                                <label for="nome">Nome Completo <h11>*</h11></label>
                                                <input name="nome_func" type="text" class="form-control" required="true"
                                                    id="nome" placeholder="<?php echo $dados['NOME_FUNC']; ?>" disabled>
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 control"></div>

                                            <!-- RG FUNCIONARIO -->
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control">
                                                <label for="RG">RG <h11>*</h11></label>
                                                <input name="rg_func" type="text" class="form-control" required="true"
                                                    id="rg_func" placeholder="<?php echo $dados['RG_FUNC']; ?>"
                                                    min="000000000" max="999999999" maxlength="9" pattern="[0-9]+$"
                                                    disabled>
                                            </div>

                                        </div>
                                    </div>
                                    <br />

                                    <!-- E-mail -->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control">
                                                <label for="Endereco">Endereço <h11>*</h11></label>
                                                <input name="endereco_func" type="text" class="form-control"
                                                    required="true" id="endereco_func"
                                                    placeholder="<?php echo $dados['ENDERECO_FUNC']; ?>" disabled>
                                            </div>

                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 control"></div>

                                            <!-- Tipo do Estagiário -->
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control">
                                                <label for="Tipo de Estagiário">Tipo do Estagiário <h11>*</h11></label>

                                                <input name="endereco_func" type="text" class="form-control"
                                                    required="true" id="endereco_func"
                                                    placeholder="<?php echo $dados['CARGO_FUNC']; ?>" disabled>
                                            </div>

                                        </div>
                                    </div>
                                    <br />
                                    <!-- Instituição de Ensino e  Matrícula da Instituição de Ensino-->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control">
                                                <label for="instituicaoensino">Instituição de Ensino <h11>*</h11>
                                                </label>
                                                <input name="instituicao_func" type="text" class="form-control"
                                                    required="true" id="instituicaoensino"
                                                    placeholder="<?php echo $dados['INSTITUICAO_FUNC']; ?>" disabled>
                                            </div>

                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 control"></div>

                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control">
                                                <label for="matricula instituicao">Matrícula da Instituição de Ensino
                                                    <h11>*
                                                    </h11></label>
                                                <input name="matricula_inst_func" type="text" class="form-control"
                                                    required="true" id="matricula_inst_func"
                                                    placeholder="<?php echo $dados['MATRICULA_INST_FUNC']; ?>" disabled
                                                    min="0000000000" max="9999999999" maxlength="10" pattern="[0-9]+$">
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <!-- EMAIL e HORÁRIO-->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control">
                                                <label for="email">E-mail <h11>*</h11></label>
                                                <input name="email_func" type="email" class="form-control"
                                                    required="true" id="email"
                                                    placeholder="<?php echo $dados['EMAIL_FUNC']; ?>" disabled>
                                            </div>

                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 control"></div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control">
                                                <label for=" Horario de Estagiário">Horário do Estagiário<h11>*</h11>
                                                </label>
                                                <input name="email_func" type="email" class="form-control"
                                                    required="true" id="email"
                                                    placeholder="<?php echo $dados['HORA_EXPEDIENTE_FUNC']; ?>"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <br />

                                </form>
                                <br /><br />

                                <div class="row">
                                    <div class="col-sm-10">

                                    </div>
                                    <div class="col-sm-2">
                                        <a href="listaFuncionarios.php" class="btn btn-danger btn-block">
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