<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"); ?>

<?php
    // Standardseite setzen
    $page = $_GET['page'] ?? '';
    if ($page === '') {
        header("Location: index.php?page=index");
        exit();
    }

    // Pfad zur Datei
    $filePath = __DIR__ . "/pages/" . $page . ".page.php";

    // Datei einbinden, wenn sie existiert
    if (file_exists($filePath)) {
        include $filePath;
    } else {
        require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/404.php");
    }
?>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"); ?>