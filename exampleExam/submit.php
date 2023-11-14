<!DOCTYPE html>
<html lang="en">
<head>
    <title>Submit</title>
    <link rel="stylesheet" href="stylesheet.css">

    <style>
        form div{
            margin-bottom: 1em;
        }

        pre{
            display: inline;
        }

        input.submit{
            display: block;
            width: 90%;
            margin: 1em auto;
        }
    </style>
</head>
<body>

    <?php
        require('navbar.html');
    ?>

    <h1>Submit new visualisation</h1>

    
    <form action="process.php" method="POST" enctype="multipart/form-data">
        <div class='content'>
            <div>
                Select the MSA file to process<br>
                <input type="file" name="uploaded_file">
            </div>

            <div>
                Paste your MSA scores<br>
                <textarea name="conservation"cols="50" rows="10"></textarea>
            </div>

            <div>
                <pre>A</pre>: <input type="text" name="A" value="pink"><br>
                <pre>T</pre>: <input type="text" name="T" value="lightgreen"><br>
                <pre>G</pre>: <input type="text" name="G" value="lightblue"><br>
                <pre>C</pre>: <input type="text" name="C" value="yellow"><br>
            </div>
            
            <div>
                Number of nucleotides to show per line:<br>
                <input type="number" name="nucLine" value="50">
            </div>
        </div>
        
        <input type="submit" name="submit" value="Submit and visualize" class="submit">
    </form>
    
</body>
</html>