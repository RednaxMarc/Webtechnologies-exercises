<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FASTA sequence generator</title>
</head>
<body>
    <h1>FASTA sequence generator</h1>

    <form action="#" method="POST">
        Sequence header: <input type="text" name="header" value="<?php echo $_POST['header'] ?? "Random sequence"; ?>"id=""><br>
        Alphabet: <input type="text" name="alphabet" value="<?php echo $_POST['alphabet'] ?? "ATGC"; ?>" id=""><br>
        Total number of nucleotides: <input type="number" name="totalNucleotides" value="<?= $_POST['totalNucleotides'] ?? 250; ?>" id=""><br>
        Nucleotides per line: <input type="number" name="nucleotidesPerLine" value="<?= $_POST['nucleotidesPerLine'] ?? 50; ?>" id=""><br>
        Number of sequences: <input type="number" name="totalSequences" value="<?= $_POST['totalSequences'] ?? 1;?>" id=""><br>
        <input type="submit" name="submit" id=""><br>
    </form>

    <hr>

    <?php
        if (isset($_POST['submit'])){
            // Create the variables, and use str_split to convert alphabet from a string to a array
            $alphabet = $_POST['alphabet'];
            $alphabet = str_split($alphabet);
            
            // Printing the header
            for ($seq = 1; $seq <= $_POST['totalSequences']; $seq ++){
                echo ">$_POST[header] $seq <br>";
                // Printing the random sequence
                for ($i = 1; $i <= $_POST['totalNucleotides']; $i ++){
                    $randomIndex = rand(0, count($alphabet) -1);
                    echo $alphabet[$randomIndex];
                    // Create a new line if the maximum of NT's per line is achieved
                    if ($i % $_POST['nucleotidesPerLine'] == 0){
                        echo "<br>";
                    }
                }
                echo "<br><br>";
            }
        }
    ?>
</body>
</html>