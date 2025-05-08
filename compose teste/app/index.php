<?php
include 'db.php';
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    // Retorna todos os usuários
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    $users = [];

    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }

    echo json_encode($users);
}
elseif ($method === 'POST') {
    // Recebe JSON com nome e email
    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['name']) || !isset($data['email'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Campos name e email são obrigatórios']);
        exit;
    }

    $name = $conn->real_escape_string($data['name']);
    $email = $conn->real_escape_string($data['email']);

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => 'Usuário inserido com sucesso']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Erro ao inserir: ' . $conn->error]);
    }
}
else {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido']);
}
?>
