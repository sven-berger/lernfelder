<?php
    session_unset(); // Alle Session-Variablen löschen
    session_destroy(); // Session beenden
    header("Location: index.php"); //
    exit;
?>