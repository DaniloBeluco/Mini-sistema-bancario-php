<?php
session_start();
require 'config.php';

if (isset($_POST['tipo'])) {
    
    $tipo = $_POST['tipo'];
    $valor = str_replace(",", ".", $_POST['valor']);
    $valor = floatval($valor);
    
    $sql = $pdo->prepare("INSERT INTO historico (id_conta, tipo, valor, data_operacao) VALUES (:id_conta, :tipo, :valor, NOW())");
    $sql->bindValue(":id_conta", $_SESSION['banco']);
    $sql->bindValue(":tipo", $tipo);
    $sql->bindValue(":valor", $valor);
    $sql->execute();

    if ($tipo == 0) {
        $sql = $pdo->prepare("UPDATE contas SET saldo = saldo + :valor WHERE id = :id ");
       
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":id", $_SESSION['banco']);
        $sql->execute();
    } else {
        
        $sql = $pdo->prepare("UPDATE contas SET saldo = saldo - :valor WHERE id = :id ");

        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":id", $_SESSION['banco']);
        $sql->execute();
    }
    header("Location: indexconta.php");
    exit;
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
        <title>DanBank Transação</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/estiloIndex.css">
        <link rel="stylesheet" href="css/estiloAdd-transacao.css">
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
            <hr class="hr1"/>
             <div class="topologo" style="margin-top: 100px">
                 <img src="images/lm2.png" width="60" height="60" class="ims"/>
                <h1>DAN BANK</h1>
                <h4>O melhor para seu dinheiro</h4>
                <hr class="hr2"/>
            </div>
            <div class="row row1">
                <div class="col-sm-3" style="text-align:center"></div>
                <div class="col-sm-6" style="text-align:center">
                    <div class="jumbo">
                        <form method="POST">
                            <div class="form-group">
                                <label for="sel1" style="font-size: 25pt">Transação</label>
                                <select class="form-control" id="sel1" name="tipo">
                                    <option value="0">Depósito</option>
                                    <option value="1">Retirada</option>
                                    <option value="2">Transferência (Em breve)</option>
                                </select>
                                <hr/>
                                <label for="sell" style="font-size: 25pt">Valor</label><br/>
                                <input class="form-control" type="text" name="valor" pattern="[0-9.,]{1,}"/><br/>
                                <hr/>
                                <input class="btn btn-default" style="font-size: 15pt" type="submit" value="Efetuar Transação"/>
                            </div> 
                        </form>
                    </div>
                </div>
                <div class="col-sm-3" style="text-align:center"></div>
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
