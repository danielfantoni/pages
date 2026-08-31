<?php
/* 
Use require_once para arquivos vitais (conexão com banco de dados, funções de segurança). Se eles falharem, o site não deve funcionar.
Use include_once para elementos visuais ou opcionais (um rodapé, um banner de aviso). Se eles falharem, o resto da página ainda carrega.


 */

/* $title = "Tbyte - Dashboard"; */

$port = ':3308';
$dbHost = 'localhost'.$port;
$dbName = 'tbyte_portifolio';
$dbUser = base64_decode('dGJ5dGVfcm9vdA==');
$dbPass = base64_decode('dGJ5dGVfcm9vdFBAJCQmMjAyNiMwNw==');
$charset = 'utf8mb4';

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Creates or opens the SQLite database file
    $pdo = new PDO($dsn, $dbUser, $dbPass, $options);

} catch (\PDOException $e) {
    // Registra o erro em log interno e mostra mensagem genérica ao usuário
    error_log($e->getMessage());
    exit("Erro na conexão com o banco de dados.");
}

?>
