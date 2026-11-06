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
        UPDATE herois
        SET nome = ?, ano = ?, url_link = ?, origem = ?,
            identidade_secreta = ?, equipe = ?, classificacao = ?
        WHERE id = ?
    ");
    $sql -> execute([
        $body ["nome"],
        $body ["ano"],
        $body ["url_link"],
        $body ["origem"],
        $body ["identidade_secreta"],
        $body ["equipe"],
        $body ["classificacao"],
        $body ["id"]
    ]);

    $verificar = $pdo -> prepare("SELECT id FROM herois WHERE id = ?");
    $verificar -> execute([$body["id"]]);
    
    if($verificar -> fetch()){    // fetch() tenta recuperar o primeiro registro encontrado.
        echo json_encode(["success" => true]);
    } else{
        echo json_encode([
            "success" => false,
            "message" => "Herói não encontrado!"
        ]);
    }
?>