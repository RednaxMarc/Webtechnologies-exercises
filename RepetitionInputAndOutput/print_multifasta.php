<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Multifasta file</title>

    <style>
        span.nuc{
            font-family: monospace;
        }
    </style>
</head>
<body>
    <h1>Print Multifasta file</h1>

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
            #echo "<pre>$content</pre>";

            // Split content into lines
            $lines = explode("\n", trim($content));
            #echo "<pre>";
            #print_r($lines);
            #echo "</pre>";

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
            #echo "<pre>";
            #print_r($sequences);
            #echo "</pre>";

            // Printing
            foreach ($sequences as $header => $seq){
                echo "<strong>$header</strong><br>";
                $chunks = str_split($seq, 50);
                foreach ($chunks as $chunk){
                    echo "<span class='nuc'>$chunk</span><br>";
                }
                // Add GC count
                $totalNT = strlen($seq);
                $gcCount = substr_count($seq, 'G') + substr_count($seq, 'C');
                $gcPerc = ($gcCount / $totalNT) * 100;
                echo "The GC percentage is $gcPerc % <br>";
            }
         }
    ?>
</body>
</html>