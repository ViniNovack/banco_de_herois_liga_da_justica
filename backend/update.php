<?php 
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
        http_response_code(200);
        exit;
    }

    $host = "localhost";
    $banco = "banco_de_herois_liga";
    $user = "root";
    $senha = "#Marvel08";

    $body = json_decode(file_get_contents("php://input"), true);
    $pdo = new PDO("mysql:host=$host;dbname=$banco",$user,$senha);
    $sql = $pdo -> prepare("
        
    "); // COMANDO SQL A SER INCERIDO
    $sql -> execute([

    ]); // VARIAVEIS A SER INCERIDAS
    
    // DEVOLUÇÃO

    
?>