<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/lfzq8a/assets/header.php"); ?>

<?php
$page = $_GET['page'] ?? 'index';
$filePath = __DIR__ . "/libary/{$page}.lib.php";

ob_start();
if (is_file($filePath)) {
    // Eine Seite kann am Anfang $page_full = true setzen, um den Wrapper zu überspringen
    $page_full = false;
    include $filePath;
} else {
    $page_full = false;
    $filePath404 = __DIR__ . "/libary/errors/404.lib.php";
    if (is_file($filePath404)) {
        include $filePath404;
    } else {
        echo "<h2 class='text-xl font-semibold'>Seite nicht gefunden</h2>";
    }
}
$content = ob_get_clean();

if ($page_full !== true) {
    echo "<section><article class='mt-5 bg-gray-50 p-10 rounded-xl border border-gray-200 shadow-sm'>";
    echo $content;
    echo "</article></section>";
} else {
    echo $content;
}
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/lfzq8a/assets/footer.php"); ?>
