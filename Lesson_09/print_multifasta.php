<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print multifasta files</title>

    <style>
        .nucleotide{
            font-family: monospace; 
        }
    </style>
</head>
<body>
    <h1>Multifasta file reader</h1>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploaded_file">
        <input type="submit" name="submit" value="Upload file">
    </form>

    <?php
        if(isset($_POST['submit'])){
            #print_r($_POST);
            // Print the nested array
            #echo "<pre>";
                #print_r($_FILES);
            #echo "</pre>";

            // Explode on newline and create an array. 
            $contents = file_get_contents($_FILES['uploaded_file']['tmp_name']);
            $lines = explode("\n", $contents);
            #print_r($lines);
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
            
            echo "The amount of sequences: " . count($sequences) . "<br>"; 

            foreach($sequences as $header => $sequence){
                echo "<strong>$header</strong><br>";

                $countC = substr_count($sequence, 'C');
                $countG = substr_count($sequence, 'G');
                $total = strlen($sequence);
                $GCpercentage = (($countC + $countG)/$total)*100;

                $sequenceArray = str_split($sequence);
                foreach($sequenceArray as $index => $nucleotide){
                    // After 40  nucleotides, you want a new line
                    if($index % 40 == 0 AND $index != 0){
                        echo "<br>";
                    }
                    echo "<span class='nucleotide'>$nucleotide</span>";
                }
                echo "<br>GC percentage: " . $GCpercentage . "<br>";
                echo "<br>";
            }
        }
    ?>
</body>
</html>