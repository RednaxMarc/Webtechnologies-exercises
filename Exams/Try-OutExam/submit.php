<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit FASTA</title>

    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <?php
        include('navbar.html');
    ?>
    
    <hr>
    
    <h1>Submit your FASTA</h1>

    <form action="visualise.php" method="POST" enctype="multipart/form-data">
        
        <label>Upload a .FASTA file<input type="radio" name="selection" value="upload" checked id=""></Label><br>
        <input type="file" name="uploaded_file" id=""><br><br>

        <label>Paste the FASTA sequence(s)<input type="radio" name="selection" value="paste" id=""></label><br>
        <textarea name="textarea" id="" cols="50" rows="10"></textarea><br><br>

        <?php
            foreach (['A', 'T', 'G', 'C'] as $nt){
                echo "Pick the color for: <strong>$nt </strong>";
                    echo "<select name=\"$nt\">";
                    echo "  <option value=\"black\">none</option>";
                    echo "  <option value=\"red\">red</option>";
                    echo "  <option value=\"blue\">blue</option>";
                    echo "  <option value=\"green\">green</option>";
                    echo "  <option value=\"yellow\">yellow</option>";
                    echo "</select><br>";
            }
        ?><br>

        Group NTs in groups of 10: <input type="checkbox" name="grouped" value="grouped" id=""><br><br>

        Number of nucleotides per row: <input type="number" name="maxperrow" value="maxperrow" id=""><br><br>

        <label>Ignore invalid NTS <input type="radio" name="invalid" value="ignore" checked></label>
        <label>Remove invalid NTS <input type="radio" name="invalid" value="remove"></label>
        <label>Highlight invalid NTS <input type="radio" name="invalid" value="highlight"></label><br>

        <input type="submit" name="submit" id="">
    </form>
</body>
</html>