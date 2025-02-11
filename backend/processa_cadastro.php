<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $sobrenome = trim($_POST["sobrenome"]);
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);
    $confirmar_senha = trim($_POST["confirmar_senha"]);

    // Verifica se as senhas coincidem
    if ($senha !== $confirmar_senha) {
        echo "Erro: As senhas não coincidem!";
        exit;
    }

    // Criptografar a senha
    $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

    // Preparar a inserção no banco de dados
    $sql = "INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nome, $sobrenome, $email, $senha_hashed])) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar!";
    }
}
?>
