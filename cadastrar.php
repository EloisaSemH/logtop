<?php
//Setando a linguagem e localização
setlocale(LC_ALL, 'pt_BR');
//Setando a localização do fuso horário
date_default_timezone_set('America/Sao_Paulo');

require_once("classes/DAO/usuarioDAO.class.php");
require_once("./classes/Entidade/usuario.class.php");
$usuarioDAO = new usuarioDAO();
$usuario = new usuario();

require_once("classes/DAO/senhaDAO.class.php");
require_once("./classes/Entidade/senha.class.php");
$senhaDAO = new senhaDAO;
$senha = new senha;
?>

<!DOCTYPE html>
<html>

<head>
    <title>SITE TOP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script type="text/javascript" src="js/script.js"></script>
</head>

<body class="bg-dark text-white">
    <div class="container mt-4">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-12 col-lg-6 p-4 bg-light text-dark shadow-sm rounded">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control" name="usNome" id="nome" maxlength="50" required="">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="usEmail" id="email" maxlength="100" required="">
                    </div>
                    <div class="form-group">
                        <label>Sexo:</label>
                        <select name="slSexo" class="form-control">
                            <option value="f">Feminino</option>
                            <option value="m">Masculino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Senha:</label>
                        <input onKeyUp="validarSenha('senha1', 'senha2', 'senhasCoin')" type="password" class="form-control" name="usSenha" id="senha1" maxlength="40" required="">
                    </div>
                    <div class="form-group">
                        <label>Repita a senha:</label>
                        <input onKeyUp="validarSenha('senha1', 'senha2', 'senhasCoin')" type="password" class="form-control" name="usSenhaRep" id="senha2" maxlength="40" required="">
                    </div>
                    <div class="form-group">
                        <p id="senhasCoin">&nbsp;</p>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Registrar" id="registrar" name="registrar" class="btn btn-info">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST["registrar"])) {
        $usuario->setUs_nome($_POST["usNome"]);
        $usuario->setUs_email($_POST["usEmail"]);
        $usuario->setUs_sexo($_POST["slSexo"]);

        if (!$usuarioDAO->consultarEmail($_POST['usEmail'])) {
            if ($usuarioDAO->cadastrar($usuario)) {
                $codUsu = $usuarioDAO->consultarCodUsuario($_POST['usEmail']);
                $senha->setSe_senha($_POST['usSenhaRep']);
                $senha->setUs_cod($codUsu);

                if ($senhaDAO->cadastrar($senha)) {
    ?>
                    <script type="text/javascript">
                        alert("Cadastrado com sucesso!");
                        document.location.href = "index.php";
                    </script>
                <?php
                } else {
                ?>
                    <script type="text/javascript">
                        alert("Erro ao cadastrar");
                    </script>
            <?php
                }
            }
        } else {
            ?>
            <script type="text/javascript">
                alert("O E-mail informado já foi cadastrado");
            </script>
    <?php
        }
    }
    ?>
</body>

</html>