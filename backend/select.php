<?php 
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");

    $host = "localhost";
    $banco = "banco_de_herois_liga";
    $user = "root";
    $senha = "#Marvel08";

    $pdo = new PDO("mysql:host=$host;dbname=$banco",$user,$senha);
    $sql = $pdo -> query("SELECT * FROM banco_de_herois_liga.herois;");
    $dados = $sql -> fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($dados);
?>