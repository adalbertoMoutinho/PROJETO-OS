<?php
include_once "conectar.php";

$nome  = $_POST['nome']  ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if ($nome === '' || $email === '' || $senha === '') {
    echo "ERRO: Campos obrigatórios";
    exit;
}

try {
    $stmt = $con->prepare(
        "INSERT INTO empresa (nome, email, senha)
         VALUES (:n, :e, :s)"
    );

    $stmt->execute([
        ':n' => $nome,
        ':e' => $email,
        ':s' => password_hash($senha, PASSWORD_DEFAULT)
    ]);

    echo "OK";
} catch (Exception $e) {
    echo "ERRO: Banco de dados";
}
