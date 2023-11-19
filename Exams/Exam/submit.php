<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit FASTA</title>

    <link rel="stylesheet" href="stylesheet.css">
</head>
<body class="index">
    <div class="navbar">
        <?php
            include('navbar.html');
        ?>
    </div>
    
    <h1>Submit Protein Sequences</h1>
    <div class="index">
    <h3>Input</h3>
    <form action="visualise.php" method="POST" enctype="multipart/form-data">
        
        <label>Upload a .FASTA file<input type="radio" name="selection" value="upload" checked id=""></Label><br>
        <input type="file" name="uploaded_file" id=""><br><br>

        <label>Paste the FASTA sequence(s)<input type="radio" name="selection" value="paste" id=""></label><br>
        <textarea name="textarea" id="" cols="50" rows="10"></textarea><br><br>

        <h3>Adjustable Parameters</h3>
        <label><input type="checkbox" name="color" checked id="">Color amino Acid groups </label><br><br>

        <label><input type="checkbox" name="grouped" value="grouped" checked id="">Group NTs in groups of 10: </label><br><br>

        Number of nucleotides per row: <input type="number" name="maxperrow" value="<?php echo $_POST['maxperrow'] ?? 72;?>" id=""><br><br>

        <label><input type="radio" name="invalid" value="remove"> Remove invalid NTS</label><br>
        <label><input type="radio" name="invalid" value="highlight" checked>Highlight invalid NTS</label><br><br>

        <input type="submit" name="submit" value="Process Protein Sequences" id="">
    </form>
    </div>
</body>
</html>