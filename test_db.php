<?php
require_once "db.php"; // Inclui a conexão

if ($pdo) {
    echo "✅ Conexão bem-sucedida!";
} else {
    echo "❌ Falha na conexão!";
}
?>
