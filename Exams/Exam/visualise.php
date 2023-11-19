<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualise FASTA</title>

    <link rel="stylesheet" href="stylesheet.css">
</head>
<body class="index">
    <div class="navbar">
        <?php
            include('navbar.html');
        ?>
    </div>

    <h1>Process Protein Sequences</h1>
    
    <?php
    $aminoAcidGroups = ['A' => 'nonpolar', 'R' => 'positive', 'N' => 'polar', 'D' => 'negative', 'C' => 'nonpolar', 'Q' => 'polar', 'E' => 'negative', 'G' => 'nonpolar', 'H' => 'positive', 'I' => 'nonpolar', 'L' => 'nonpolar', 'K' => 'positive', 'M' => 'nonpolar', 'F' => 'nonpolar', 'P' => 'nonpolar', 'S' => 'polar', 'T' => 'polar', 'W' => 'nonpolar', 'Y' => 'polar', 'V' => 'nonpolar'];
    $allAminoAcids = array_keys($aminoAcidGroups);
    $colors = [
        'polar' => '#3498db',
        'nonpolar' => '#f39c12',
        'positive' => '#27ae60',
        'negative' => '#e74c3c', 
    ];

    if (!isset($_POST['submit'])){
        echo"<div class=\"errors\">No Amino Acid sequences submitted yet</div>";
    }
    

    if (isset($_POST['submit'])){
        
        // Reading the content
        if ($_POST['selection'] == 'upload'){
            $contents = file_get_contents($_FILES['uploaded_file']['tmp_name']);
        }
        else if ($_POST['selection'] == 'paste'){
            $contents = $_POST['textarea'];
        }
        // Errors
        if ($_POST['selection'] == 'paste'AND empty($contents)){
            echo"<div class=\"errors\">No pasted (multi)fasta detected</div>";
        }
        else if ($_POST['selection'] == 'upload' AND empty($contents)){
            echo"<div class=\"errors\">No uploaded (multi)fasta detected</div>";
        }

        $lines = explode("\n", $contents);
        
        #echo "<pre>"; print_r($lines); echo "</pre>";
        
        $sequences = [];

        // Making a handy array
        foreach ($lines as $line){
            $line = trim($line);
            if (preg_match('/^>/', $line)){
                $currentHeader = $line;
            }
            else if (!empty($line)){
                $sequences[$currentHeader] .= $line;
            }
        }
        #echo "<pre>"; print_r($sequences); echo "</pre>";

        // Making it all uppercase
        foreach ($sequences as $header => $sequence){
            $sequence = strtoupper($sequence);
            $sequences[$header] = $sequence;
        }
        #echo "<pre>"; print_r($sequences); echo "</pre>";

        foreach ($sequences as $header => $sequence){
            // Here i added the <div class=index. DONT FORGET TO CLOSE AFTER SEQUENCE
            echo "<div class=\"index\">";
            echo "<h4 id=\"$header\">$header</h4><br>";

            $aminoAcids = [];
            $invalidAA = 0;
            
            $sequence = str_split($sequence);
            
            foreach ($sequence as $aminoAcid){
                if ($_POST['invalid'] == 'remove'){
                    if (in_array($aminoAcid, $allAminoAcids) AND isset($_POST['color'])){
                        $property = $aminoAcidGroups[$aminoAcid];
                        $color = $colors[$property];
                        $aminoAcids[] = "<span class='aa' style=\"background: $color\">$aminoAcid</span>";
                    }
                    if (in_array($aminoAcid, $allAminoAcids) AND !isset($_POST['color'])){
                        $aminoAcids[] = $aminoAcid;
                    }
                    else if (!in_array($aminoAcid, $allAminoAcids)) {
                        $invalidAA ++;
                    }
                }
                if ($_POST['invalid'] == 'highlight'){
                    if (in_array($aminoAcid, $allAminoAcids) AND isset($_POST['color'])){
                        $property = $aminoAcidGroups[$aminoAcid];
                        $color = $colors[$property];
                        $aminoAcids[] = "<span class='aa' style=\"background: $color\">$aminoAcid</span>";
                    }
                    if (in_array($aminoAcid, $allAminoAcids) AND !isset($_POST['color'])){
                        $aminoAcids[] = $aminoAcid;
                    }
                    else if (!in_array($aminoAcid, $allAminoAcids)) {
                        $invalidAA ++;
                        $color = 'red';
                        $aminoAcids[] = "<span class='aa' style=\"color: $color\">$aminoAcid</span>";
                    }
                }  
            }
            #print_r($aminoAcids);
            foreach ($aminoAcids as $i => $aminoAcid){
                if (isset($_POST['grouped']) AND $i%10 == 0 AND $i != 0){
                    echo " ";
                }
                if(isset($_POST['maxperrow']) AND $i%$_POST['maxperrow']== 0 AND $i != 0){
                    echo "<br>";
                }
                echo $aminoAcid;
            }
            echo "<br>";
            echo "Invalid Amino Acids: $invalidAA";
            echo "<br>";
            echo "</div>";    
        }        
    }
    
    ?>
</body>
</html>
            