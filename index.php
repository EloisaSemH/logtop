<?php
session_start();
require_once("classes/DAO/usuarioDAO.class.php");
$usuarioDAO = new usuarioDAO();

if (isset($_SESSION['logado']) && $_SESSION['logado'] == 1) {
?>
    <script type="text/javascript">
        document.location.href = "painel.php";
    </script>
<?php
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>SITE TOP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="bg-dark text-white">
    <div class="container mt-4">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-12 col-lg-6 p-4 bg-light text-dark shadow-sm rounded">
                <form method="POST" enctype="multipart/form-data" name="login">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="usEmail" class="form-control" required="" />
                    </div>
                    <div class="form-group">
                        <label>Senha:</label>
                        <input type="password" name="usSenha" class="form-control" required="" />
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="entrar" value="Entrar" class="btn btn-info">
                    </div>
                    <div class="form-group text-center">
                        <a href="cadastrar.php" class="btn btn-link">Cadastre-se</a><br>
                        <a href="recuperarsenha.php" class="btn btn-link">Esqueceu a senha? Recupere-a!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['entrar'])) {
    if ($usuarioDAO->login($_POST['usEmail'], $_POST['usSenha'])) {

        $_SESSION['logado'] = 1;
?>
        <script type="text/javascript">
            document.location.href = "painel.php";
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert("Email ou senha incorretos");
        </script>
        <?php
    }
}

if (isset($_GET['erro'])) {
    switch ($_GET['erro']) {
        case '1':
        ?>
            <script type="text/javascript">
                alert("Você não tem permissão para acessar o painel!");
            </script>
    <?php
            break;
        case '2':

            break;
    }
}
if (isset($_GET['logout'])) {
    ?>
    <script type="text/javascript">
        alert("Até breve!");
    </script>
<?php
}
?>