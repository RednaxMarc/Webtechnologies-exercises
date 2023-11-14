<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Format Multifasta Extended</title>
</head>
<body>
    <h1>Visualise / Format Fasta Extended</h1>

    <form action="#" method="POST" enctype="multipart/form-data">
        <div>
            <label><input type="radio" name="selection" value="paste" id="">Pasta the multifasta content</label><br>
            <textarea name="pasted_file" id="" cols="60" rows="10"></textarea><br>
        </div> 
        
        <div> 
            <label><input type="radio" name="selection" value="upload" id="">Upload the multfasta file </label>
            <input type="file" name="uploaded_file" id="">
        </div><br>
        
        <div>
            <?php
                foreach(['A', 'T', 'G', 'C'] as $nucleotide){
                    echo "Pick a color for $nucleotide:";
                    echo "<select name=\"$nucleotide\">";
                    echo "    <option value=\"red\">Red</option>";
                    echo "    <option value=\"blue\">Blue</option>";
                    echo "    <option value=\"green\">Green</option>";
                    echo "    <option value=\"brown\">Yellow</option>";
                    echo "</select>";
                }
            ?>
        </div><br>
        
        <div>
            Group the nucleotides in groups of 10: <input type="checkbox" name="grouped" checked><br><br>
        </div>

        <div>
            Ignore invalid nucleotides: <input type="radio" name="invalid" value="ignore" id=""><br>
            Remove invalid nucleotides: <input type="radio" name="invalid" value="remove" id=""><br>
            Highlight invalid nucleotides: <input type="radio" name="invalid" value="highlight" id=""><br>
        </div>
        
        <input type="submit" name="submit" id="">
    </form>

    <hr>

    <?php
        if(isset($_POST['submit'])){
            if($_POST['selection'] == 'paste'){
                $content = $_POST['pasted_file'];
            }
            else if($_POST['selection'] == 'upload'){
                $content = file_get_contents($_FILES['uploaded_file']['tmp_name']);
            }
            
            $sequences = [];
            
            $lines = explode("\n", $content);
            foreach($lines as $line){
                $line = trim($line);
                if(preg_match('/^>/', $line)){
                    $currentheader = $line;
                }
                else if(!empty($line)){
                    $sequences[$currentheader] = $line; 
                }
            }
            #echo "<pre>"; print_r($sequences); echo"</pre>";

            // Display the hyperlinks
            echo "<ul>";
            foreach (array_keys($sequences) as $header){
                echo "<li><a href='#$header'>" . substr($header, 1) . "</a></li>";
            }
            echo "</ul>";

            // Display the sequences
            foreach ($sequences as $header => $sequence){
                echo "<strong id=\"$header\">$header</strong><br>";
                
                $nucleotides = [];
                $frequencies =[];
                $totalNucleotides = 0;

                foreach(str_split($sequence as $nucleotide)){
                    if ($_POST[])
                }
            }
        }
    ?>
</body>
</html>