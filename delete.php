<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $index = intval($_POST['index']);
    
    $file = 'issues.txt';
    if (file_exists($file) && is_writable($file)) {
        $issues = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (isset($issues[$index])) {
            unset($issues[$index]);
            file_put_contents($file, implode("\n", $issues) . "\n");
        }
    }
    // Redirect back to the main page
    header('Location: index.php');
    exit();
} else {
    // If accessed directly, redirect to the form
    header('Location: index.php');
    exit();
}
