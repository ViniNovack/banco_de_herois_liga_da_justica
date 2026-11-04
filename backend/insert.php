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
        INSERT INTO herois (nome, ano, url_link, origem, identidade_secreta, equipe, classificacao)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $sql -> execute([
        $body ["nome"],
        $body ["ano"],
        $bosy ["url_link"] ? : null,
        $body ["origem"] ? : null,
        $body ["identidade_secreta"],
        $body ["equipe"],
        $body ["classificacao"]
    ]);
    echo json_encode(["success" => "success"]);
?>