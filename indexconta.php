<?php
session_start();
require 'config.php';

if (isset($_SESSION['banco']) && empty($_SESSION['banco']) == false) {
    $id = $_SESSION['banco'];

    $sql = $pdo->prepare("SELECT * FROM contas WHERE id = :id");

    $sql->bindValue(":id", $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $info = $sql->fetch();
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
    exit;
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
        <title>DanBank</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/estiloIndexconta.css">
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
                <div class="col-sm-1" style="text-align:center"></div>
                <div class="col-sm-5" style="text-align:center">
                    <div class="jumbo1" style="height: 400px; border: solid 1px white; color: white">
                        <h3>INFORMAÇÕES</h3>
                        <hr/>
                        <ul class="list-inline">
                            <li class="l"> <strong>Titular:</strong> <?php echo $info['titular']; ?></li>
                            <li class="l"> <strong>E-mail:</strong> <?php echo $info['email']; ?></li>
                            <li class="l"> <strong>Agência: </strong><?php echo $info['agencia']; ?></li>
                            <li class="l"> <strong>Conta:</strong> <?php echo $info['conta']; ?></li> 
                            <li class="l"> <strong>Saldo:</strong> <?php echo "R$ " . $info['saldo']; ?></li>
                        </ul>
                        <button class="btn breadcrumb"><a href="add-transacao.php">Efetuar Transação</a></button>
                    </div>

                </div>
                <div class="col-sm-5" style="text-align:center">
                    <div class="jumbo">
                        <h3 style="color: white">EXTRATO</h3>

                        <table class="table" style="color: white">
                            <tr>
                                <th>Data</th>
                                <th>Valor</th>
                            </tr>

                            <?php
                            $total = 0;
                            $sql = "SELECT COUNT(*) as c FROM historico";
                            $sql = $pdo->query($sql);
                            $sql = $sql->fetch();
                            $total = $sql['c'];
                            $paginas = $total / 6;

                            $pg = 1;
                            if (isset($_GET['p']) && !empty($_GET['p'])) {
                                $pg = $_GET['p'];
                            }
                            $p = ($pg - 1) * 10;
                            ?>
                            <?php
                            $sql = $pdo->prepare("SELECT * FROM historico WHERE id_conta = :id_conta LIMIT $p, 10");
                            $sql->bindValue(":id_conta", $id);
                            $sql->execute();

                            if ($sql->rowCount() > 0) {
                                foreach ($sql->fetchAll() as $item) {
                                    ?>
                                    <tr>
                                        <td><?php echo date('d/m/Y H:i', strtotime($item['data_operacao'])); ?></td>
                                        <td style="text-shadow: 0 0 0.1em white;">
                                            <?php if ($item['tipo'] == 0) { ?><font color="green"/><strong><?php echo "Depositou " . $item['valor'] . " R$"; ?></strong> </font><?php
                                            } else {
                                                ?><font color="red"/><strong><?php echo "Retirou " . $item['valor'] . " R$"; ?></strong> </font>  <?php
                                                }
                                                ?>


                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                        </table>

                    </div>
                     <ul class="pagination pagination-sm">
                    <?php
                    for ($q = 0; $q < $paginas; $q++) {
                        ?>
                       
                            <?php
                            echo '<li><a class="" href="indexconta.php?p=' . ($q + 1) . '">' . ($q + 1) . '</a></li>';
                        }
                        ?> </ul><?php ?>
                </div>
            </div>
            <div class="col-sm-1" style="text-align:center"></div>
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
