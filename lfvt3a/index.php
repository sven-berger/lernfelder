<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/lfvt3a/includes/header.php"); ?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Standardseite setzen
$page = $_GET['page'] ?? '';
if ($page === '') {
    header("Location: index.php?page=index");
    exit();
}

// Pfad zur Datei
$filePath = $_SERVER['DOCUMENT_ROOT'] . "/lfvt3a/pages/" . $page . ".page.php";
if (file_exists($filePath)) {
    include $filePath;
} else {
    require_once($_SERVER['DOCUMENT_ROOT'] . "/lfvt3a/includes/404.php");
}
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/lfvt3a/includes/footer.php"); ?>