<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Format Multifasta</title>

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
    <h1>Format Multifasta</h1>

    <!-- Form for user input -->
    <form action="#" method="POST" enctype="multipart/form-data"> 
      <!-- Radio buttons to select input method -->  
      <div>
            <label><input type="radio" name="selection" value='upload' checked>Select fasta file:</label><br>
            <!-- File upload input -->
            <input type="file" name="uploaded_file"> 
        </div>

        <div>
            <label><input type="radio" name="selection" value='paste'>Paste fasta:</label><br>
            <!-- Textarea for manual input -->
            <textarea name="textfield" cols="50" rows="10"></textarea> 
        </div>

        <input type="submit" name="submit" value="Submit">
    </form>

    <hr>

    <?php
        if (isset($_POST['submit'])){
            if ($_POST['selection'] == 'upload'){
                $content = file_get_contents($_FILES['uploaded_file']['tmp_name']);
            }
            else {
                $content = $_POST['textfield'];
            }

            // Split content into lines
            $lines = explode("\n", trim($content));

            $sequences = [];
            // Go over the lines and select headers starting with
            foreach ($lines as $line){
                if (preg_match('/^>/', $line)){
                    $currentHeader = $line;
                }
                else if (!empty($line)){
                    $sequences[$currentHeader] = $line;
                }
            }
            #echo "<pre>"; #print_r($sequences); #echo "</pre>";

            // Extract the headers and make the contents table
            $headers = array_keys($sequences);
            echo "<ul>";
            foreach ($headers as $header){
                echo "<li><a href='#$header'>" . substr($header, 1) . "</a></li>";
            }
            echo "</ul>";
            // Printing
            foreach ($sequences as $header => $seq){
                echo "<strong id='$header'>$header</strong><br>";
                
                // string split every nucleotide of each sequence
                $sequenceArray = str_split($seq);

                // print every nucleotide with a choosed monospace 
                foreach ($sequenceArray as $i => $nt){
                    echo "<span class='$nt'>$nt</span>";
                    if ($i % 50 == 0 && $i != 0){
                        echo "<br>";
                    }
                }
                echo "<br>";
            }
        }
    ?>
</body>
</html>