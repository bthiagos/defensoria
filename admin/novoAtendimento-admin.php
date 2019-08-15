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
    <!-- Atendimento Inicial -->
    <section id="painel">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Novo Atendimento
                </div>
                <div class="panel-body">
                    <br />
                    <?php
                    if(isset($_SESSION['status_atendimento'])):
                    ?>
                    <div class="alert alert-sucess" role="alert">
                        <h5 class="alert-heading">Atendimento efetuado!</h5>
                        <p class="mb-0">Consulte <a href="consultarAtendimento.php">aqui</a></p>
                    </div>

                    <?php
                    endif;
                    unset($_SESSION['status_atendimento']);
                    ?>

                    <div class="box">
                        <form action="cadastrar_atendimento.php" method="POST">
                            <div class="row">
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Campo Obrigatório *</div>
                            </div>
                            <br />

                            <!-- Assistido -->
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control">
                                        <label for="matricula">Assistido<h11>*</h11></label>
                                        <?php
                                            $sql = "SELECT * FROM assistido";
                                            $resultado = mysqli_query($conexao, $sql);
                                             ?>
                                        <select required id="assistido" name="RG_ASS" class="form-control">
                                            <option value="">Selecione o Assistido</option>
                                            <?php
                                                while($dados = mysqli_fetch_array($resultado)):
                                                ?>
                                            <option value="<?php echo $dados['RG_ASS']; ?>">
                                                <?php echo $dados['NOME_ASS']; ?>
                                            </option>
                                            <?php
                                                endwhile;
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control"></div>

                                <!-- Área do Direito -->
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control">
                                    <label for="Tipo de Estagiário">Área do Direito <h11>*</h11></label>
                                    <?php
                                            $sql = "SELECT * FROM area_do_direito";
                                            $resultado = mysqli_query($conexao, $sql);
                                        ?>
                                    <select required id="direito" name="ID_DIREITO" class="form-control">
                                        <option value="">Selecione a Área do Direito</option>
                                        <?php
                                            while($dados = mysqli_fetch_array($resultado)):
                                        ?>
                                        <option value="<?php echo $dados['ID_DIREITO']; ?>">
                                            <?php echo $dados['NOME_DIREITO']; ?>
                                        </option>
                                        <?php
                                            endwhile;
                                        ?>
                                    </select>

                                </div>
                            </div>
                    </div>

                    <br />

                    <!-- Prioridade Atendimento -->
                    <div class="row">
                        <div class="form-group">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control">
                                <label for="Prioridade">Prioridade do Atendimento <h11>*</h11> :</label>

                                <label required="" class="radio-inline" for="radios-0">
                                    <input name="PRIORIDADE_ATENDIMENTO" id="prioridade" value="Alta" type="radio"
                                        required>
                                    Alta
                                </label>
                                <label class="radio-inline" for="radios-1">
                                    <input name="PRIORIDADE_ATENDIMENTO" id="prioridade" value="Media" type="radio">
                                    Média
                                </label>
                                <label class="radio-inline" for="radios-2">
                                    <input name="PRIORIDADE_ATENDIMENTO" id="prioridade" value="Baixa" type="radio">
                                    Baixa
                                </label>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 control"></div>

                            <!-- Estagiário do Atendimento -->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control">
                                <label for=" Horario de Estagiário">Estagiário do Atendimento<h11>*</h11></label>
                                <?php
                                    $sql = "SELECT * FROM funcionario";
                                    $resultado = mysqli_query($conexao, $sql);
                                ?>
                                <select required id="funcionario" name="MAT_FUNC" class="form-control">
                                    <option value="">Selecione o Estagiário</option>
                                    <?php
                                        //while($dados = mysqli_fetch_array($resultado)):
                                        $dados = mysqli_fetch_array($resultado);
                                    ?>
                                    <option value="<?php echo $_SESSION['mat_func'];?>">
                                        <?php echo $_SESSION['nome_func']; ?>
                                    </option>
                                    <?php
                                        //endwhile;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br />
                    <!-- Comentário do Atendimento -->
                    <div class="row">
                        <div class="form-group">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control">
                                <label for="comentario_atendimento">Comentário do Atendimento <h11>*</h11>
                                </label>
                                <textarea name="COMENTARIO_ATENDIMENTO" type="text" class="form-control noresize"
                                    required="true" id="comentario_atendimento" placeholder="Comentário do Atendimento"
                                    rows="5"></textarea>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 control"></div>

                           

                        </div>
                    </div>
                    <br />
                    <br />
                    <!-- Botão de Envio / Cadastro -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary is-block is-link"> Atendimento
                        </button>
                    </div>
                    </form>


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