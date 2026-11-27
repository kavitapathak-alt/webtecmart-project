<?php
if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return $needle === '' || strpos($haystack, $needle) !== false;
    }
}

if (!function_exists('str_starts_with')) {
    function str_starts_with(string $haystack, string $needle): bool
    {
        return $needle === '' || substr($haystack, 0, strlen($needle)) === $needle;
    }
}

if (!function_exists('str_ends_with')) {
    function str_ends_with(string $haystack, string $needle): bool
    {
        return $needle === '' || substr($haystack, -strlen($needle)) === $needle;
    }
}

session_start();
date_default_timezone_set('Asia/Kolkata');

const APP_NAME = 'WebTecMart Digital';
const APP_URL = 'http://localhost:8000';
const DB_PATH = __DIR__ . '/storage/site.db';

function formatDatabaseDateTime(string $value, string $format = 'd M Y, h:i A'): string
{
    $storedDate = new DateTimeImmutable($value, new DateTimeZone('UTC'));
    $appTimezone = new DateTimeZone(date_default_timezone_get());

    return $storedDate->setTimezone($appTimezone)->format($format);
}

function loadEnvironmentConfig(): void
{
    $path = __DIR__ . '/.env';
    if (!is_file($path) || !is_readable($path)) {
        return;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        error_log('Application environment configuration could not be read.');
        return;
    }

    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || $line[0] === '#' || strpos($line, '=') === false) {
            continue;
        }

        [$name, $value] = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        if (!preg_match('/^[A-Z][A-Z0-9_]*$/', $name) || getenv($name) !== false) {
            continue;
        }

        if (strlen($value) >= 2 && (($value[0] === '"' && substr($value, -1) === '"') || ($value[0] === "'" && substr($value, -1) === "'"))) {
            $value = substr($value, 1, -1);
        }

        putenv($name . '=' . $value);
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
}

loadEnvironmentConfig();

function ensureStorageDir(): void
{
    $dir = __DIR__ . '/storage';
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

function db(): PDO
{
    static $pdo;

    if (!databaseAvailable()) {
        throw new RuntimeException('The SQLite database extension is unavailable.');
    }

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    ensureStorageDir();
    if (!databaseAvailable()) {
        throw new RuntimeException('The SQLite database extension is unavailable.');
    }

    try {
        $pdo = new PDO('sqlite:' . DB_PATH);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $exception) {
        error_log('Database unavailable: ' . $exception->getMessage());
        throw new RuntimeException('The application database is unavailable.', 0, $exception);
    }

    return $pdo;
}

function databaseAvailable(): bool
{
    return class_exists('PDO') && in_array('sqlite', PDO::getAvailableDrivers(), true);
}

function initDatabase(): void
{
    $db = db();

    $db->exec(
        'CREATE TABLE IF NOT EXISTS leads (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT NOT NULL,
            phone TEXT,
            company TEXT,
            service TEXT,
            budget TEXT,
            message TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )'
    );

    $db->exec(
        'CREATE TABLE IF NOT EXISTS contacts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT NOT NULL,
            subject TEXT,
            message TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )'
    );

    $db->exec(
        'CREATE TABLE IF NOT EXISTS admin_users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT NOT NULL UNIQUE,
            password_hash TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )'
    );

    $db->exec(
        'CREATE TABLE IF NOT EXISTS content_items (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            content_type TEXT NOT NULL,
            title TEXT NOT NULL,
            summary TEXT,
            body TEXT,
            metadata TEXT,
            sort_order INTEGER DEFAULT 0,
            is_active INTEGER DEFAULT 1,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )'
    );

    $db->exec(
        'CREATE TABLE IF NOT EXISTS cms_content_type_state (
            content_type TEXT PRIMARY KEY,
            initialized_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )'
    );

    $adminCount = (int) $db->query('SELECT COUNT(*) FROM admin_users')->fetchColumn();
    if ($adminCount === 0) {
        $stmt = $db->prepare('INSERT INTO admin_users (name, email, password_hash) VALUES (:name, :email, :password_hash)');
        $stmt->execute([
            ':name' => 'WebTecMart Admin',
            ':email' => 'admin@webtecmart.com',
            ':password_hash' => password_hash('admin123', PASSWORD_DEFAULT),
        ]);
    }
}

function e(string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

function redirect(string $path): void
{
    header('Location: ' . $path);
    exit;
}

function currentPage(): string
{
    return basename($_SERVER['PHP_SELF']);
}

function isAdminLoggedIn(): bool
{
    return !empty($_SESSION['admin_logged_in']);
}

function ensureAdmin(): void
{
    if (!isAdminLoggedIn()) {
        redirect('login.php');
    }
}

try {
    initDatabase();
} catch (Throwable $exception) {
    error_log('Database initialization skipped: ' . $exception->getMessage());
}
