<?php
session_start();
require 'config.php';

if (isset($_POST['conta']) && empty($_POST['conta']) == false) {
    $conta = addslashes($_POST['conta']);
    $senha = addslashes($_POST['senha']);

    $sql = $pdo->prepare("SELECT * FROM contas WHERE conta = :conta AND senha = :senha");

    $sql->bindValue(":conta", $conta);
    $sql->bindValue(":senha", md5($senha));
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $sql = $sql->fetch();

        $_SESSION['banco'] = $sql['id'];
        header("Location: indexconta.php");
    } else {
        ?>
<script> alert('Email ou Senha Inválidos!')</script>
        <?php
    }
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Entrar na Conta</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/estiloLogin.css"/>
    </head>
    <body style="background-image:url('bank.jpg');">
        <div class="container">
            <nav class="navbar navbar-fixed-top" style="margin-left: 0px; width: 100%; border-radius: 2px; border-bottom: solid 1px cadetblue; background-color: #fff; opacity: 0.7 ">
                <div class="container-fluid">
                    <div class="navbar-header"> <a class="navbar-brand" href="index.php">DanBank.com</a></div>
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="">Empresa</a></li>
                        <li><a href="">Contato</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right ">
                        <li><a href="login.php">Login</a></li> 
                        <li><a href="cadastro.php">Criar Conta</a></li> 
                    </ul>

                </div>

            </nav>
            <hr class="hr1" style="margin-top: -17px"/>
             <div class="topologo" style="margin-top: 100px">
                 <img src="images/lm2.png" width="60" height="60" class="ims"/>
                <h1>DAN BANK</h1>
                <h4>O melhor para seu dinheiro</h4>
                <hr style="width: 200px; float: left"/>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <form method="POST" style="color:white; font-size: 21pt">
                        <div class="form-group">
                            Número da sua conta<br/>
                            <input type="text" name="conta" class="form-control"/>
                        </div>
                        <div class="form-group">
                            Senha<br/>
                            <input type="password" name="senha" class="form-control"/>
                        </div>
                        <input type="submit" value="Entrar" class="btn btn-default"/>
                    </form>
                    <p style="color:white; font-size: 21pt; text-shadow: 0 0 0.03em white;">ou<br/><a href="cadastro.php"> Faça seu Cadastro</a></p>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
         <footer class="rodape">
            <p>Design by: DANILOO</p>
            <div class="icones">
                <a href=""><img src="images/facebook.png"></a>
                <a href=""><img src="images/youtube.png"></a>
                <a href=""><img src="images/googleplus.png"></a>
            </div>
        </footer>
    </body>
</html>
