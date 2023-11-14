<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old exam2</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

    <?php require('navbar.html'); ?>

    <div class="content">

        <h1>Welcome to the DNA visualiser</h1>
        <div class="white"></div>
        <img src="screenshot.png" alt="screenshot">
        <p class="subtitle">
        This application ingest multifasta DNA sequences and displays the nucleotides nicely formatted. 
        </p>
              
        <p>
        The user can upload multifasta sequences in two ways:
            <ol>
                <li>Upload a multifasta file.</li>
                <li>Paste multifasta sequences in the provided input field</li>
            </ol>
        </p>
        <p>
        The user is in control of the output and can define:
            <ol>
                <li>the number of nucleotides allowed per line</li>
                <li>if nucleotides should be grouped by 12</li>
                <li>if all nucleotides should receive a different background color.</li>
            </ol>
        </p>
        <p>
        The application is also able to output RNA instead of DNA.
        </p>
        <p>
        Invalid input - nucleotides different from ATGC – is also handled. The options are:
            <ul>
                <li>Highlight the invalid nucleotides</li>
                <li>Remove the nucleotides from the generated output</li>
            </ul>
        </p>
        <p>
            But enough talk, <a href="submit.php">let's generate some complements!</a>
        </p>
    </div>
    
    <?php require('navbar.html'); ?>
</body>
</html>