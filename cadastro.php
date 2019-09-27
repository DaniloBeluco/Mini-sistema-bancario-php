<?php
require 'config.php';

if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $conta = addslashes($_POST['conta']);
    $agencia = addslashes($_POST['agencia']);
   $senha = addslashes(md5($_POST['senha']));
    
    $sql = "INSERT INTO contas SET titular = '$nome', email = '$email', conta='$conta', agencia='$agencia', senha='$senha' ";
    $sql = $pdo->query($sql);
    session_abort();
header("Location: index.php");
    
} else {
    
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
        <title>Crie sua Conta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/estiloCadastro.css">
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
                <div class="col-sm-4">
           
                </div>
                <div class="col-sm-4">
                               <form method="POST" style="color:white; font-size: 21pt">
                        <div class="form-group form-group-sm">
                            Insira seu nome<br/>
                            <input type="text" name="nome" class="form-control"/><br/>
                    
                            Insira seu e-mail<br/>
                            <input type="text" name="email" class="form-control"/><br/>
                       
                            Insira o número da conta<br/>
                            <input type="text" name="conta" class="form-control"/><br/>
                       
                            Insira o número da agência<br/>
                            <input type="text" name="agencia" class="form-control"/><br/>
                        
                           Digite uma senha<br/>
                           <input type="password" name="senha" class="form-control"/>
                       </div>
                        <input type="submit" value="Criar conta" class="btn btn-default"/>
                    </form> 
                </div>
                <div class="col-sm-3">
                   
                </div>
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
