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

} elseif ($method === 'POST') {
    // Recebe JSON com nome e email para inserir novo usuário
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

} elseif ($method === 'PUT') {
    // Atualiza usuário existente
    parse_str(file_get_contents("php://input"), $put_vars);

    if (!isset($_GET['id'])) {
        http_response_code(400);
        echo json_encode(['error' => 'ID do usuário é obrigatório para atualização']);
        exit;
    }

    $id = (int)$_GET['id'];
    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['name']) || !isset($data['email'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Campos name e email são obrigatórios']);
        exit;
    }

    $name = $conn->real_escape_string($data['name']);
    $email = $conn->real_escape_string($data['email']);

    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => 'Usuário atualizado com sucesso']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Erro ao atualizar: ' . $conn->error]);
    }

} elseif ($method === 'DELETE') {
    // Exclui usuário existente
    if (!isset($_GET['id'])) {
        http_response_code(400);
        echo json_encode(['error' => 'ID do usuário é obrigatório para exclusão']);
        exit;
    }

    $id = (int)$_GET['id'];

    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => 'Usuário excluído com sucesso']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Erro ao excluir: ' . $conn->error]);
    }

} else {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido']);
}

?>
