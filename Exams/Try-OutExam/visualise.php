<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualise FASTA</title>

    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <?php
        include('navbar.html');
    ?>

    <hr>

    <h1>Visualise FASTA</h1>

    <?php
        if (isset($_POST['submit'])){
            if ($_POST['selection'] == 'upload'){
                $contents = file_get_contents($_FILES['uploaded_file']['tmp_name']);
            }
            else if ($_POST['selection' == 'paste']){
                $contents = $_POST['textarea'];
            }
            $lines = explode("\n", $contents);
            #echo "<pre>"; print_r($lines); echo "</pre>";
            
            $sequences = [];
            
            foreach ($lines as $i => $line){
                $line = trim($line);
                if (preg_match('/^>/', $line)){
                    $currentHeader = $line;
                }
                else if (!empty($line)){
                    $sequences[$currentHeader] .= $line;
                }
            }
            #echo "<pre>"; print_r($sequences); echo "</pre>";

            foreach ($sequences as $header => $sequence){
                echo "<strong id=\"$header\">$header</strong><br>";

                $nucleotides = [];
                foreach (str_split($sequence) as $nucleotide){
                    if ($_POST['invalid'] == 'ignore'){
                        $color = $_POST[$nucleotide] ?? 'black';
                        $nucleotides[] = "<span class='nuc' style=\"color: $color\">$nucleotide</span>";
                    }
                    if ($_POST['invalid'] == 'remove'AND in_array($nucleotide, ['A', 'T', 'G', 'C'])){
                        if (in_array($nucleotide, ['A', 'T', 'G', 'C'])){
                            $color = $_POST[$nucleotide] ?? 'black';
                            $nucleotides[] = "<span class='nuc' style=\"color: $color\">$nucleotide</span>";
                        }
                    }
                    if ($_POST['invalid'] == 'highlight'){
                        if (in_array($nucleotide, ['A', 'T', 'G', 'C'])){
                            $color = $_POST[$nucleotide] ?? 'black';
                            $nucleotides[] = "<span class='nuc' style=\"color: $color\">$nucleotide</span>";
                        }
                        else {
                            $nucleotides[] = "<span class='nuc' style='background: darkgrey'>$nucleotide</span>";
                        }
                    }
                }
                foreach ($nucleotides as $i => $nucleotide){
                    if (isset($_POST['grouped']) AND $i%10 == 0 AND $i != 0){
                        echo " ";
                    }
                    if(isset($_POST['maxperrow']) AND $i % $_POST['maxperrow']== 0 AND $i != 0){
                        echo "<br>";
                    }
                    echo $nucleotide;
                }
                echo "<br>";

                $frequencies = [];
                $totalNTs = 0;
                foreach (str_split($sequence) as $nucleotide){
                    if (!isset($frequencies[$nucleotide]) AND in_array(str_split($sequence), ['A', 'T', 'G', 'C'])){
                        $frequencies[$nucleotide] = 0;
                    }
                    $frequencies[$nucleotide] ++;
                    $totalNTs ++;
                }
                #print_r($frequencies); echo "<br>";
                #echo "$totalNTs <br>";
            }
            
        }
    ?>

</body>
</html>