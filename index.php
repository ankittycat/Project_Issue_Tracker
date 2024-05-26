<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Tracking System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id='div1'>
        <h1>Issue Tracking System</h1>
        <form action="submit.php" method="post">
            <label for="title">Issue Title:</label><br>
            <input type="text" id="title" name="title" required><br><br>
            
            <label for="description">Issue Description:</label><br>
            <textarea id="description" name="description" required></textarea><br><br>
            
            <label for="priority">Priority:</label><br>
            <select id="priority" name="priority" required>
                <option value="Low" style="background-color: #b0e57c;">Low</option>
                <option value="Medium" style="background-color: #ffec8b;">Medium</option>
                <option value="High" style="background-color: #ffcccb;">High</option>
            </select><br><br>
            
            <input type="submit" value="Submit Issue" class="submit-button">
        </form>
    </div>

    <div id='div2'>
        <h2>Current Issues</h2>
        <?php
        $file = 'issues.txt';
        if (file_exists($file) && is_readable($file)) {
            $issues = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            if (count($issues) > 0) {
                echo "<ul>";
                foreach ($issues as $index => $issue) {
                    list($title, $description, $priority) = explode('|', $issue);
                    $priorityClass = strtolower($priority);
                    echo "<li>
                            <strong>Title:</strong> $title <br>
                            <strong>Description:</strong> $description <br>
                            <strong>Priority:</strong> <span class='priority-label priority-$priorityClass'>$priority</span> <br>
                            <form action='delete.php' method='post' style='display:inline;'>
                                <input type='hidden' name='index' value='$index'>
                                <input type='submit' value='Delete' class='delete-button'>
                            </form>
                          </li><hr>";
                }
                echo "</ul>";
            } else {
                echo "<p>No issues reported yet.</p>";
            }
        } else {
            echo "<p>Error: Unable to read the issues file.</p>";
        }
        ?>
    </div>
</body>
</html>
