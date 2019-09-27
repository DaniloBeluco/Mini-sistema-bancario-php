<?php
session_start();
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
        <title>DanBank</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/estiloIndex.css">
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

            <div class='banner1'>
                <h1>Um mundo<br/> de<br/> oportunidades</h1>
            </div>
            <div class='banner2'>
                <h1>Faça<br/> seu<br/> cadastro</h1>
            </div>

            <!--            <div class="row row1">
                            <div class="col-sm-3" style="text-align:center">A</div>
                            <div class="col-sm-6" style="text-align:center;">
                             
                            </div>
                            <div class="col-sm-3" style="text-align:center">C</div>
                        </div>-->
            
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
