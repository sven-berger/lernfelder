<?php
session_start();

if (isset($_SESSION['user'])) {
    $benutzer = htmlspecialchars($_SESSION['user']['benutzername']);
}

