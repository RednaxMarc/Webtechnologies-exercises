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
            <label><input type="radio" name="invalid" value="ignore" checked> Ignore invalid NTS</label>
            <label><input type="radio" name="invalid" value="remove"> Remove invalid NTS</label>
            <label><input type="radio" name="invalid" value="highlight"> Highlight invalid NTS</label>  
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

            // Display the headers
            foreach ($sequences as $header => $sequence){
                echo "<strong id=\"$header\">$header</strong><br>";

                $countA = 0;
                $countT = 0;
                $countG = 0;
                $countC = 0;

                // Creating an array for each sequence with each NT as a value for each option of invalid NT management   
                $nucleotides = [];
                
                // string split for the sequence and go over every one by one
                foreach(str_split($sequence) as $nucleotide){
                    // Counting all nucleotides
                    if ($nucleotide == 'A'){
                        $countA ++;
                    }
                    if ($nucleotide == 'T'){
                        $countT ++;
                    }
                    if ($nucleotide == 'G'){
                        $countG ++;
                    }
                    if ($nucleotide == 'C'){
                        $countC ++;
                    }
                    $countNT = strlen($sequence);

                    // Defining the invalid NT management
                    if ($_POST['invalid'] == 'ignore'){
                        $color = $_POST[$nucleotide] ?? 'black';
                        $nucleotides[] = "<span class='nuc' style=\"color: $color\">$nucleotide</span>";
                    }
                    if ($_POST['invalid'] == 'remove' AND in_array($nucleotide, ['A', 'T', 'G', 'C'])){
                        $color = $_POST[$nucleotide] ?? 'black';
                        $nucleotides[] = "<span class='nuc' style=\"color: $color\">$nucleotide</span>";
                    }
                    if ($_POST['invalid'] == 'highlight'){
                        if (in_array($nucleotide, ['A', 'T', 'G', 'C'])){
                            $color = $_POST[$nucleotide] ?? 'black';
                            $nucleotides[] = "<span class='nuc' style=\"color: $color\">$nucleotide</span>";
                        }
                        else {
                            $nucleotides[] = "<span class='nuc' style='background: purple'>$nucleotide</span>";
                        }
                    }
                }
                // Display the sequences by looping through nucleotides array
                foreach ($nucleotides as $index => $nucleotide){
                    // Logic to display only 50 nucleotides per line
                    if($index % 50 == 0 AND $index != 0){
                        echo "<br>";
                    } 
                    // Logic to group the nucleotides in groups of 10 if this 'grouped' option is selected
                    else if(isset($_POST['grouped']) AND $index % 10 == 0 AND $index != 0){
                        echo " ";
                    }
                    // Output the nucleotide
                    echo $nucleotide;
                }
                echo "<br>";
                echo "Sequence lenght: $countNT <br>";
                echo "A: " . ($countA/$countNT)*100 . "% <br>";
                echo "T: " . ($countT/$countNT)*100 . "% <br>";
                echo "G: " . ($countG/$countNT)*100 . "% <br>";
                echo "C: " . ($countC/$countNT)*100 . "% <br>";
            }
        }
    ?>
</body>
</html>