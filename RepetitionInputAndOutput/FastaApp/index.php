<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <?php require('navbar.html');?>

    <h1>Coloring web app</h1>
    <p>This is a more elaborate example/exercise combining and intertwining HTM, CSS and PHP into a complete and working web application.</p>
    <p>We have a:</p>
    <ul>
        <li>Landing page (<a href="index.php">index.php</a>)</li>
        <li>Form submit page (<a href="submit.php">submit.php</a>)</li>
        <li>Processing page (<a href="process.php">process.php</a>)</li>
    </ul>
    <p>The navigation and styles shared between the pages are not repeated but extracted and included where required.</p>
    <a href="submit.php" class="button">Submit a new coloring job</a>
</body>
</html>