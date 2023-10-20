<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word count</title>
</head>
<?php
    $text=$_POST['text'];
?>
<body>
    <h2>Word calculator</h2>
    <form action="#" method="POST">
        Enter text: <br><textarea name="text" id="" cols="50" rows="5"></textarea><br>
        <input type="submit" value="Calculate" name="submit"> 
    </form>

    <hr>

    <?php
        echo "Entered Text: " . $text . "<br>";
        echo "Number of lines: " . "<br>";
        echo "Number of words: " . str_word_count($text) . "<br>"; 
        echo "Number of characters: " . strlen($text) . "<br>";
    ?>
</body>
</html>