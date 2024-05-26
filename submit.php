<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $priority = htmlspecialchars($_POST['priority']);
    
    // Prepare the issue data
    $issue = "$title|$description|$priority\n";
    
    // Save the issue to the file
    file_put_contents('issues.txt', $issue, FILE_APPEND);
    
    // Redirect back to the main page
    header('Location: index.php');
    exit();
} else {
    // If accessed directly, redirect to the form
    header('Location: index.php');
    exit();
}
