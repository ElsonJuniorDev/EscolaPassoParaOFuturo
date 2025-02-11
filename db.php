<?php
// Configurações do banco de dados
$host = "localhost"; // Servidor do MySQL (localhost para XAMPP)
$dbname = "alunos_db"; // Nome do banco de dados
$username = "root"; // Usuário padrão do XAMPP
$password = ""; // Senha padrão (vazia no XAMPP)

try {
    // Criando a conexão com PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Se houver erro, exibe a mensagem e encerra o script
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
