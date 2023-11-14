<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" href="stylesheet.css">
    <style>
        /* CSS styles for visualizations */
        div.axis{
            width: 40%;
            border-left: solid 1px black;
            border-bottom: solid 1px black;
        }

        div.full{
            height: 1.5em;
            width: 95%;
            margin: 0.5em;
            border: solid 1px gray;
        }
        
        div.percentage{
            background: lightblue;
            box-sizing: content-box;
            height: 100%;
        }
    </style>
</head>
<body>

    <?php require('navbar.html');?>

    <h1>Sequence visualisation</h1>
    
    <?php
        // Check if the form is submitted
        if(isset($_POST['submit'])){
            // Retrieve content based on user selection //
            if($_POST['selection'] == 'upload'){
                $content = file_get_contents($_FILES['uploaded_file']['tmp_name']); // Read content from uploaded file
            } else{
                $content = $_POST['textfield']; // Read content from textarea
            }

            // Split content into lines
            $lines = explode("\n", trim($content));
            $sequences = [];

             // Parse fasta data
             foreach($lines as $line){
                $line = trim($line); 
                
                // Check for fasta header lines
                if(preg_match('/^>/', $line)){
                    $currentHeader = $line;
                }
                else if(!empty($line)){
                    // Store sequence associated with current header
                    $sequences[$currentHeader] = $line;
                } 
            }

            // Display header hyperlinks
            echo "<ol>";
            foreach (array_keys($sequences) as $header){
                echo "<li><a href=\"#$header\">$header</a></li>";
            }
            echo "</ol>";

            // Display fasta sequences
            foreach($sequences as $header => $sequence){
                // Display the header in bold font
                echo "<strong id=\"$header\">$header</strong><br>";
                
                // Initiate an empty nucleotide array to store all nucleotides
                $nucleotides = [];
                
                // Initiate an empty frequencies array to store the frequency of all nucleotides
                $frequencies = [];
                
                // Initiate an empty totalNucleotides variable to store the amount of nucleotides
                $totalNucleotides = 0;

                // Loop through all nucleotides separately
                foreach(str_split($sequence) as $nucleotide){
                    // In case invalid nucleotides are ignored
                    if($_POST['invalid'] == 'ignore'){
                        // Extract the nucleotide color
                        $color = $_POST[$nucleotide] ?? 'black';

                        // Save the styled nucleotide
                        $nucleotides[] = "<span class='nuc' style=\"color: $color\">$nucleotide</span>";

                        // Add nucleotide to the frequency array
                        if(!isset($frequencies[$nucleotide])){
                            $frequencies[$nucleotide] = 0;
                        }

                        $frequencies[$nucleotide]++;
                        $totalNucleotides++;
                    }
                    // In case invalid nucleotides are removed
                    else if($_POST['invalid'] == 'remove' and in_array($nucleotide, ['A', 'T', 'G', 'C'])){
                        // Extract the nucleotide color
                        $color = $_POST[$nucleotide] ?? 'black';

                        // Save the styled nucleotide
                        $nucleotides[] = "<span class='nuc' style=\"color: $color\">$nucleotide</span>";

                        // Add nucleotide to the frequency array
                        if(!isset($frequencies[$nucleotide])){
                            $frequencies[$nucleotide] = 0;
                        }

                        $frequencies[$nucleotide]++;
                        $totalNucleotides++;
                    } 
                    // In case invalid nucleotides are highlighted
                    else if($_POST['invalid'] == 'highlight'){
                        // Check if the nucleotide is a valid nucleotide
                        if(in_array($nucleotide, ['A', 'T', 'G', 'C'])){
                            // Extract the nucleotide color
                            $color = $_POST[$nucleotide] ?? 'black';

                            // Save the styled nucleotide
                            $nucleotides[] = "<span class='nuc' style=\"color: $color\">$nucleotide</span>";
                        } else{
                            // Save the styled nucleotide with a yellow background to indicate it's invalid
                            $nucleotides[] = "<span class='nuc' style='background:yellow'>$nucleotide</span>";
                        }

                        // Add nucleotide to the frequency array
                        if(!isset($frequencies[$nucleotide])){
                            $frequencies[$nucleotide] = 0;
                        }

                        $frequencies[$nucleotide]++;
                        $totalNucleotides++;
                    }
                }

                // Display the fasta sequences by looping through all nucleotides separately
                foreach($nucleotides as $index => $nucleotide){
                    // Logic to display only 80 nucleotides per line
                    if($index % 80 == 0 and $index != 0){
                        echo "<br>";
                    } 
                    // Logic to group the nucleotides in groups of 10 if this option is selected
                    else if($_POST['group'] and $index % 10 == 0 and $index != 0){
                        echo " ";
                    }
                    // Output the nucleotide
                    echo $nucleotide;
                }

                echo "<br>";

                // Display the nucleotide frequencies in a bar graph
                echo "<div class='axis'>";
                    foreach($frequencies as $nucleotide => $frequency){
                        // Calculate the percentage of this nucleotide in the sequence
                        $percentage = round(($frequency/$totalNucleotides)*100,2);
                        // Display the nucleotide with its percentage as a colored bar
                        echo "<div class='full'>";
                            echo "<div class='percentage' style=\"width: $percentage%\">$nucleotide: $percentage%</div>";
                        echo "</div>";
                    }
                echo "</div>";

                echo "<br>";
            }
        }
    ?>
    
</body>
</html>