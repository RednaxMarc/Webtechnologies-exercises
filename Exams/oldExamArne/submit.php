<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" href="stylesheet.css">
    <style>
        form{
            margin-left: 1em;
        }
    </style>
</head>
<body>

    <?php require('navbar.html');?>
    <div class="content">

    <h1>Submit some (multi)Fasta to visualise </h1>

    <form action="visualise.php" method="POST" enctype="multipart/form-data">

        <div>
            <span style="font-weight: bold;">Input:</span> <br>
            <label><input type="radio" name="selection" value= "upload"> Upload a (multi)fasta file : </label>
            <br><input type="file" name="uploaded_file"><br>
        </div>

        <div>
            <label><input type="radio" name="selection" value = "paste"> paste some (multi)fasta sequences  </label><br>
            <textarea name="data" cols="50" rows="10"></textarea><br><br>
        </div>

        <span style="font-weight: bold;">Output:</span> <br>
        <div>
        Please specifiy the number of nucleotides that should be printed per line: <br>
        <input type="number" name="NucPerLine" value="<?php echo $_POST['NucPerLine'] ?? 72 ?>"><br>
        <label><input type="checkbox" name="Per12"> Group nucleotides by 12.</label><br><br>
        </div>

        <span style="font-weight: bold;">Colors:</span> <br>
        <div>
        <label><input type="checkbox" name="Background"> All nucleotides should receive a different background color.</label><br><br>
        </div>

        <span style="font-weight: bold;">RNA:</span> <br>
        <div>
        <label><input type="checkbox" name="RNA"> The sequence should be transcribed to RNA </label><br><br>
        </div>

        <span style="font-weight: bold;">Errors:</span> <br>
        <div>
        Please specify how to handle invalid nucleotides: <br>
        <label><input type="radio" name="Errors" value= "remove"> Remove the invalid nucleotides from the output. </label><br>
        <label><input type="radio" name="Errors" value= "highlight"> Highlight the invalid nucleotides </label><br><br>
        </div>
        <br>
        <input type="submit" name="submit" value="Visualise Sequence"><br><br>

    </form>
    </div>
    <?php require('navbar.html');?>
</body>
</html>