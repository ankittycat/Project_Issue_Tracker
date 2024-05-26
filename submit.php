<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $priority = htmlspecialchars($_POST['priority']);
    
    $issue = "$title|$description|$priority\n";
    
    file_put_contents('issues.txt', $issue, FILE_APPEND);
    
    header('Location: index.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
