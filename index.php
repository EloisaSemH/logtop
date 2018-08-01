<?php
session_start();
require_once ("classes/DAO/usuarioDAO.class.php");
$usuarioDAO = new usuarioDAO();

if ($_SESSION['logado'] == 1) {
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
        <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-4 rounded border border-secondary shadow-sm p-3 mb-5 bg-white rounded">
            <div class="row mt-3 mb-3 mr-3 ml-3">
                <div class="col-md-12">
                    <form method="POST" enctype="multipart/form-data" name="login">
                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-3">
                                <label>Email:</label>
                                <input type="email" name="usEmail" class="form-control" required=""/>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-3">
                                <label>Senha:</label>
                                <input type="password" name="usSenha" class="form-control" required=""/>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-3 text-center">
                                <input type="submit" name="entrar" value="Entrar"  class="btn btn-dark form-control">
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-3 text-center">
                                <a href="cadastrar.php" class="btn btn-link">Cadastre-se</a>
                            </div>
                        </div>
                    </form>
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