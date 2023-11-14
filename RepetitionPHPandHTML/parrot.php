<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parrot</title>
</head>
<body>
    <?php
        $word = $_POST['words'] ?? "";
        $sentence = $_POST['sentence'] . ' ' .  $_POST['words'] ?? "";
    ?>
    <h1>Parrot application</h1>
    <form action="#" method="POST">
        Words which you want to print: <input type="text" name="words" value="" id="">
        <input type="submit" name="submit" value="Activate the parrot" id=""><br>
        <input type="hidden" name="sentence" value="<?php echo "$sentence" ?>" id="">
    </form>

    <?php
        if (isset($_POST['submit'])){
            echo "The just added words are: " . $_POST['words'];
            echo "<br>";
            echo "The sentence is: " . $sentence;
            echo "<br>";
        }
        # This piece of code is to show what is actually going on
        echo "<pre>";
            print_r($_POST);
        echo "</pre>";
    ?>
    
</body>
</html>