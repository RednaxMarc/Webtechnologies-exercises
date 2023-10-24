<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print multifasta files</title>
</head>
<body>
    <h1>Multifasta file reader</h1>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploaded_file">
        <input type="submit" name="submit" value="Upload file">
    </form>

    <?php
        if(isset($_POST['submit'])){
            print_r($_POST);

            echo "<pre>";
                print_r($_FILES);
            echo "</pre>";

            // Explode on ">" and create an array. 
            $contents = file_get_contents($_FILES['uploaded_file']['tmp_name']);
            $lines = explode(">", $contents);
            array_shift($lines);
            #print_r($lines);

            // Report number of sequences
            $countSeq = count($lines);
            echo "The number of sequences is $countSeq <br>";

            foreach($lines as $sequence){
                #print($sequence);
            }
        }
    ?>
</body>
</html>