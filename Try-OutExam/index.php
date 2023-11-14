<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <?php
        include('navbar.html');
    ?>

    <hr>
    <h1>DNA Visualiser</h1>
    
    <p>
        This tool makes viewing sequences peanuts. Via this tool you can paste of upload 
        FASTA sequences, and via some clever code, you can view the sequence with statistics
        on a very clever way.
    </p>
    
    <img src="screenshot.png" width=50% alt="">

    <p>
        The screenshot above shows how the sequence wil be visualised.
        You will have the oppurtunity to select the max line lenght and the grouping of the sequence.
        Also, It is possible to give every NT a different color, and hightlight invalid NTs.
    </p>

    <a href="submit.php"><div class="button">Start!</div></a>
        
    

</body>
</html>