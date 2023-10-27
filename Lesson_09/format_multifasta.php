<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualise / Format multifasta</title>

    <style>
        .A{
            font-family: monospace;
            color: red;color
        }
        .T{
            font-family: monospace;
            color: yellow;  
        }
        .G{
            font-family: monospace;
            color: green;  
        }
        .C{
            font-family: monospace;
            color: blue;  
        }
    </style>
</head>
<body>
    <h1>Visualise / Format multifasta</h1>
    <form action="#" method="POST" enctype="multipart/form-data">
        <div>
            <label><input type="radio" name="selection" value="paste" id="">Pasta the multifasta content</label><br>
            <textarea name="pasted_file" id="" cols="60" rows="10"></textarea><br>
        
            <label><input type="radio" name="selection" value="upload" id="">Upload the multfasta file </label>
            <input type="file" name="uploaded_file" id="">
        </div>
        <input type="submit" name="submit" id="">
    </form>
 
    <?php
        if(isset($_POST['submit'])){
            if($_POST['selection'] == 'paste'){
                $content = $_POST['pasted_file'];
            }
            else if($_POST['selection'] == 'upload'){
                // Create an array.
                $content = file_get_contents($_FILES['uploaded_file']['tmp_name']);
                #echo $contents . "<br>";
            }
            // Explode on new lines
            $lines = explode("\n", $content);
            #print_r($lines);

            // Checking some initial arrays
            #print_r($_POST);
            #echo "<pre>";
            #    print_r($_FILES);
            #echo "</pre>";

            $sequences = [];
            
            foreach($lines as $line){
                // Remove white spaces at the beginning and end of a string
                $line = trim($line);
                // If a element form the array starts with a >, you overwrite the $line to $currentheader
                if(preg_match('/^>/', $line)){
                    $currentheader = $line;
                }
                // If the line is not empty, write the line to the sequence array
                else if(!empty($line)){
                    $sequences[$currentheader] = $line; 
                }
            }
            #print_r($sequences);
            
            // Echo the amount of sequences
            $headers = array_keys($sequences);
            #print_r($headers);
            echo "<ol>";
                foreach($headers as $header){
                    echo "<li><a href='#$header'>" . substr($header, 1) . "</a></li>";
                }
            echo "</ol>";  
            
            // Display everything properly
            foreach($sequences as $header => $sequence){
                // Echo each header in bold
                echo "<strong id='$header'>$header</strong><br>";
                
                // string split every nucleotide of each sequence
                $sequenceArray = str_split($sequence);
                #print_r($sequenceArray);
                
                // print every nucleotide with a choosed monospace 
                foreach($sequenceArray as $index => $nucleotide){
                    // After 80 nucleotides, you want a new line
                    if($index % 80 == 0 AND $index != 0){
                        echo "<br>";
                    }
                    echo "<span class='$nucleotide'>$nucleotide</span>";
                }
                echo "<br>";
            }
            
        }
    ?>
</body>
</html>