<?php
// Vérifier si le fichier .env existe
$envFile = __DIR__ . '/../.env';
if (!file_exists($envFile)) {
    throw new Exception('Le fichier .env n\'existe pas. Copiez .env.example vers .env et configurez-le.');
}

// Lire le fichier .env ligne par ligne
$lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($lines as $line) {
    // Ignorer les commentaires
    if (strpos(trim($line), '#') === 0) {
        continue;
    }
    
    // Séparer la clé et la valeur
    if (strpos($line, '=') !== false) {
        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);
        
        // Ne pas écraser les variables d'environnement existantes
        if (!isset($_ENV[$key])) {
            $_ENV[$key] = $value;
        }
    }
}

// Construire le DSN si les variables DB_* sont définies
if (!defined('SQL_DSN')) {
    if (isset($_ENV['SQL_DSN'])) {
        define('SQL_DSN', $_ENV['SQL_DSN']);
    } elseif (isset($_ENV['DB_HOST']) && isset($_ENV['DB_NAME'])) {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'] ?? '3306';
        $dbname = $_ENV['DB_NAME'];
        define('SQL_DSN', "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4");
    } else {
        throw new Exception('SQL_DSN ou DB_HOST/DB_NAME doivent être définis dans le fichier .env');
    }
}

// Définir les constantes pour le nom d'utilisateur et le mot de passe
if (!defined('SQL_USERNAME')) {
    define('SQL_USERNAME', $_ENV['DB_USER'] ?? $_ENV['SQL_USERNAME'] ?? '');
}

if (!defined('SQL_PASSWORD')) {
    define('SQL_PASSWORD', $_ENV['DB_PASSWORD'] ?? $_ENV['SQL_PASSWORD'] ?? '');
}
