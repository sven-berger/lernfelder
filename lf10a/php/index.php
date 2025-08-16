<?php require_once("includes/header.php"); ?>
<div class="section">
    <?php
    // Standardseite setzen
    $page = $_GET['page'] ?? '';

    // Falls keine Seite gesetzt ist, auf index.php?page=index umleiten
    if ($page === '') {
        header("Location: index.php?page=erlkoenig");
        exit();
    }

    // Pfad zur Datei
    $filePath = "lib/" . $page . ".lib.php";

    // Datei einbinden, wenn sie existiert
    if (file_exists($filePath)) {
        include $filePath;
    } else {
        include "lib/errors/404.php";
    }
    ?>
</div>
<?php require_once("includes/footer.php"); ?>