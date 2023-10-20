<?php
    $word = $_POST['input'] ?? "";
    $sentence = $_POST['sentence'] . ' ' .  $_POST['input'] ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parrot</title>
</head>
<body>
    <h2>Parrot Application</h2>
    <form action="#" method="POST">
        <!--input-->
        Enter a word: <input type="text" name="input">
        <input type="hidden" value="<?php echo $sentence ?>" name="sentence">
        <input type="submit" value="submit" name="submit">
    </form>
    <hr>
    <?php

        if(isset($_POST['submit'])){
            echo "Current word is: " . $_POST['input'];
            echo "<br>";
            echo "The sentence is: " . $sentence;
            echo "<br>";
        }
    ?>
</body>
</html>