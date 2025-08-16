<?php

$username = "lernfelder";
$password = "GkiD7inEbrRRLjdA";
$hostname = "i3pz.your-database.de";
$database = "lernfelder";

try {
    $connection = new PDO ("mysql:host=$hostname;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Fehler bei der Verbindung zur Datenbank: " . $e->getMessage();
    die();
}