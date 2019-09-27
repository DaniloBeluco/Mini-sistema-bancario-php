<?php

try {
    $pdo = new PDO("mysql:dbname=caixaeletronico;host=localhost", "root", "");
} catch (PDOexception $e) {
echo "Erro: ".$e->getMessage();
exit;
}

