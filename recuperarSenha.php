<!DOCTYPE html>
<html>
    <head>
        <title>SITE TOP</title>
        <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body class="bg-dark text-white">
    <div class="container mt-4">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-12 col-lg-6 p-4 bg-light text-dark shadow-sm rounded">
                    <form method="POST" enctype="multipart/form-data" name="recuperarsenha">
                            <div class="form-group">
                                <label>Por favor, insira seu email cadastrado:</label>
                                <input type="email" name="usEmail" class="form-control" required=""/>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" name="btnSubmit" value="Recuperar"  class="btn btn-info">
                            </div>
                    </form>
                </div>
            </div>
    </body>
</html>
<?php

if(isset($_POST['btnSubmit'])){
    $email = $_POST['usEmail'];
    $mailCript = base64_encode($email);
    require_once('enviarEmail.php');

    $mensagem =" Você está recebendo esse e-mail para redefinição de senha no site dos Italianos em itu. Clique no link abaixo para redefini-la. </br><a href='http://localhost/logtop/refeinirSenha.php?conta={$mailCript}''>Redefina sua senha</a>";

    enviarEmail($email, 'Prezado', 'Redefinição de senha', $mensagem);
}

?>