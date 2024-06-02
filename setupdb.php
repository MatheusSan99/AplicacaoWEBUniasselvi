<?php

declare(strict_types=1);

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$createUsersTable = '
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT NOT NULL,
        password TEXT NOT NULL
    );
';

$createNewsTable = '
    CREATE TABLE IF NOT EXISTS news (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        content TEXT NOT NULL,
        author TEXT NOT NULL,
        date TEXT NOT NULL
    );
';

$verificaUsuarioPadrao = 'SELECT * FROM users WHERE email = "admin@gmail.com";';

$statement = $pdo->query($verificaUsuarioPadrao);

if ($statement->fetchAll()) {
    return;
} else {
    $pdo->exec($createUsersTable);
    $pdo->exec($createNewsTable);

    $usuarioPadrao = '
    INSERT INTO users (email, password) VALUES ("admin@gmail.com", "admin"
    );  
';

    $pdo->exec($usuarioPadrao);
}


