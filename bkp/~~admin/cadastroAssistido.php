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


    <!-- Atendimento Inicial -->
    <section id="painel">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Cadastro do Assistido
                </div>
                <div class="panel-body">
                    <?php
                        if(isset($_SESSION['status_cadastroAssistido'])):
                        ?>

                    <div class="alert alert-sucess" role="alert">
                        <h5 class="alert-heading">Cadastro do Assistido Realizado com Sucesso!</h5>
                    </div>

                    <?php
                        endif;
                        unset($_SESSION['status_cadastroAssistido']);
                        ?>
                    <?php
                        if(isset($_SESSION['rg_assistido_existe'])):
                        ?>

                    <div class="alert alert-danger" role="alert">
                        <p class="mb-0">Este usuário-assistido já existe. Informe outro e tente novamente.
                        </p>
                    </div>

                    <?php
                        endif;
                        unset($_SESSION['rg_assistido_existe']);
                        ?>
                    <div class="box">
                        <form action="cadastrarAssistido.php" method="POST">
                            <div class="row">
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Campo Obrigatório *</div>
                            </div>
                            <br />
                            <!--          NOVO FORM           -->

                            <!-- Nome e Sexo-->
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 control">
                                        <label class="control-label" for="nome_ass">Nome Completo <h11>*</h11>
                                        </label>
                                        <input id="nome_ass" name="nome_ass" placeholder=""
                                            class="form-control input-md" required="" type="text">
                                    </div>
                                    <label class="col-md-1 control-label" for="radios">Sexo <h11>*</h11></label>
                                    <div class="col-md-4">
                                        <label required="" class="radio-inline" for="radios-0">
                                            <input name="sexo_ass" id="sexo_ass" value="F" type="radio" required>
                                            Feminino
                                        </label>
                                        <label class="radio-inline" for="radios-1">
                                            <input name="sexo_ass" id="sexo_ass" value="M" type="radio">
                                            Masculino
                                        </label>
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
                                        <input id="rg_ass" name="rg_ass" placeholder="Apenas números"
                                            class="form-control input-md" required="" type="text" maxlength="9"
                                            pattern="[0-9]+$">
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control"></div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control">
                                        <label class="control-label" for="Estado Civil">Telefone <h11>*</h11>
                                        </label>
                                        <input type="text" class="form-control" name="telefone_ass" id="inputFone"
                                            placeholder="(xx)xxxx-xxxx" pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$"
                                            required>
                                        <div class="help-block with-errors"></div>
                                    </div>
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
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input id="email_ass" name="email_ass" class="form-control"
                                        placeholder="email@email.com" required="" type="text"
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />

                    <!-- Button (Double) -->
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label" for="cadastrar_atendimento"></label>
                            <div class="col-md-2">
                                <button class="btn btn-success btn-block" type="Submit">Cadastrar</button>
                            </div>
                            <div class="col-md-2">
                                <button id="Cancelar" name="Cancelar" class="btn btn-danger btn-block"
                                    type="Reset">Cancelar</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        </form>
    </section>

    <!-- JAVASCRIPT-->
    <script type="text/javascript">
    $('#myForm').validator();
    $('#inputFone').mask("(99)9999-9999");

    function limpa_formulario_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('rua').value = ("");
        document.getElementById('bairro').value = ("");
        document.getElementById('cidade').value = ("");
        document.getElementById('estado').value = ("");

    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value = (conteudo.logradouro);
            document.getElementById('bairro').value = (conteudo.bairro);
            document.getElementById('cidade').value = (conteudo.localidade);
            document.getElementById('estado').value = (conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulario_cep();
            alert("CEP não encontrado.");
            document.getElementById('cep').value = ("");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep !== "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value = "...";
                document.getElementById('bairro').value = "...";
                document.getElementById('cidade').value = "...";
                document.getElementById('estado').value = "...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulario_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulario_cep();
        }
    }

    function formatar(mascara, documento) {
        var i = documento.value.length;
        var saida = mascara.substring(0, 1);
        var texto = mascara.substring(i);

        if (texto.substring(0, 1) != saida) {
            documento.value += texto.substring(0, 1);
        }

    }

    function idade() {
        var data = document.getElementById("dtnasc").value;
        var dia = data.substr(0, 2);
        var mes = data.substr(3, 2);
        var ano = data.substr(6, 4);
        var d = new Date();
        var ano_atual = d.getFullYear(),
            mes_atual = d.getMonth() + 1,
            dia_atual = d.getDate();

        ano = +ano,
            mes = +mes,
            dia = +dia;

        var idade = ano_atual - ano;

        if (mes_atual < mes || mes_atual == mes_aniversario && dia_atual < dia) {
            idade--;
        }
        return idade;
    }


    function exibe(i) {



        document.getElementById(i).readOnly = true;




    }

    function desabilita(i) {

        document.getElementById(i).disabled = true;
    }

    function habilita(i) {
        document.getElementById(i).disabled = false;
    }


    function showhide() {
        var div = document.getElementById("newpost");

        if (idade() >= 18) {

            div.style.display = "none";
        } else if (idade() < 18) {
            div.style.display = "inline";
        }

    }
    </script>

    <script>
    $(function() {
        var dominioDireitos = [
            "Civel",
            "Familia",
            "Consumidor",
            "BasFazenda Publica",
            "Criminal",
        ];
        $("#dominioDireito1").autocomplete({
            source: dominioDireitos
        });
    });
    </script>

    <script src="https://ajasx.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>