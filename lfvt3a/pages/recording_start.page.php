<?php
// Arbeitszeit-Start: setzt Login-Datum/-Uhrzeit; Logout bleibt NULL
// Voraussetzung: $pdo (PDO) existiert und Session enthält Nutzer-ID

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Deine Session setzt laut login.page.php: $_SESSION['user_id'] und $_SESSION['user']
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=login');
    exit;
}

$userId = (int) $_SESSION['user_id']; // Fremdschlüssel auf user.id
try {
    $stmt = $pdo->prepare(
        'INSERT INTO timestamps (user_id, login_date, login_time, logout_date, logout_time)
         VALUES (:uid, CURDATE(), CURTIME(), NULL, NULL)'
    );
    $stmt->bindValue(':uid', $userId, PDO::PARAM_INT);
    $stmt->execute();

    header('Location: index.php?page=index&started=1');
    exit;
} catch (PDOException $e) {
    // Optional: Fehler loggen
    // error_log($e->getMessage());
    header('Location: index.php?page=index&started=0&err=insert');
    exit;
}