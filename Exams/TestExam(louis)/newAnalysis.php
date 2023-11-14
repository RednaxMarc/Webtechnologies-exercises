<!DOCTYPE html>
<html lang="en">
<head>
    <title>Submit New Job</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php include("navbar.html"); ?>
    <h1>Submit new visualisation</h1>
    <div id="new">
        
        <form action="alignment.php" method="POST" enctype="multipart/form-data">
            <span>Select the MSA file to process</span><br>
            <input type="file" name="MSA"><br>
            <br>
            <span>Paste your MSA scores</span><br>
            <textarea name="conservationScores" id="conservationScores" cols="80" rows="10"></textarea><br><br>
            <label>A: <input type="text" name="Acolor" value="pink"></label><br><br>
            <label>T: <input type="text" name="Tcolor" value="lightgreen"></label><br><br>
            <label>C: <input type="text" name="Ccolor" value="lightblue"></label><br><br>
            <label>G: <input type="text" name="Gcolor" value="yellow"></label><br><br>
            <span>Number of nucleotides to show per line</span><br>
            <input type="number" name="nucPerLine" value=80>
            </div>
            
            <div id="button"><input id="submit" type="submit" name="submit" value="Submit and visualize"></div>
        </form>
</body>
</html>