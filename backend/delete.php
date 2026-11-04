<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){  // Tem a função de responder a requisição do navegador dizendo que ele pode mandar quequisições sem nem um problema
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
        DELETE FROM herois
        WHERE nome = ?
    ");
    $sql -> execute([
        $body ["nome"]
    ]);
    
    if($sql -> rowCount() > 0){
        echo json_encode(["success" => true]);
    } else{
        echo json_encode([
            "success" => false,
            "message" => "Herói não encontrado!"
        ]);
    }
?>