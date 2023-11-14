<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

    <?php require('navbar.html');?>

    <h1>Submit new coloring job</h1>
    
    <!-- Form for user input -->
    <form action="process.php" method="POST" enctype="multipart/form-data"> 
        <div>
            <!-- Radio buttons to select input method -->
            <label><input type="radio" name="selection" value='upload' checked>Select fasta file:</label><br>
            <input type="file" name="uploaded_file"> <!-- File upload input -->
        </div>

        <div>
            <label><input type="radio" name="selection" value='paste'>Paste fasta:</label><br>
            <textarea name="textfield" cols="30" rows="10"></textarea> <!-- Textarea for manual input -->
        </div>

        <div>
            <!-- Dropdowns to select colors for nucleotides -->
            <?php 
                foreach (['A', 'T', 'G', 'C'] as $nucleotide){
                    echo "Pick the color for <strong>$nucleotide </strong>";
                    echo "<select name=\"$nucleotide\">";
                    echo "<option value=\"black\">none</option>";
                    echo "<option value=\"red\">red</option>";
                    echo "<option value=\"orange\">orange</option>";
                    echo "<option value=\"green\">green</option>";
                    echo "<option value=\"yellow\">yellow</option>";
                    echo "<option value=\"blue\">blue</option>";
                    echo "</select><br>";
                }
            ?>
        </div>

        <div>
            <label><input type="checkbox" name="group">Group nucleotides in groups of 10</label>
        </div>

        <div>
            <!-- Radio buttons to handle invalid nucleotides -->
            <label><input type="radio" name="invalid" value="ignore" checked> Ignore invalid NTS</label>
            <label><input type="radio" name="invalid" value="remove"> Remove invalid NTS</label>
            <label><input type="radio" name="invalid" value="highlight"> Highlight invalid NTS</label>
        </div>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>