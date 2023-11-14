<!DOCTYPE html>
<html lang="en">
<head>
    <title>Submit</title>
    <link rel="stylesheet" href="stylesheet.css">

    <style>
        /* Styles for visualisation content */
        div.content {
            width: fit-content;
            margin: 2em auto;
            white-space: nowrap;                /* Ensures headers and alignments inside the content div remain on the same line even when the browser window is minimized (non-essential feature, you don't need to use this) */ 
        }

        div.header, div.sequence {
            display: inline-block;
            vertical-align: top;
        }

        div.header {
            margin-right: 2em;
        }

        /* Styles for conservation bars */
        div.full {
            font-family: monospace;
            display: inline-block;
            position: relative;
            height: 2em;
        }

        div.fill {
            position: absolute;
            bottom: 0px;
            left: 0px;
            width: 100%;
            background: black;
        }
    </style>
</head>
<body>

    <?php
        // Include the navigation bar
        require('navbar.html');
    ?>

    <!--Include the uploaded file name in the header-->
    <?php $filename = $_FILES['uploaded_file']['name'] ?? "which can't be found";?>

    <h1>Visualising MSA for file <?php echo $filename;?></h1>

    <?php 
        // Check if form is submitted
        if(!isset($_POST['submit'])){
            // Display a link to submit a new visualisation request if the form is not submitted
            die("<a class='requestbutton' href='submit.php'>Submit new visualisation request</a>");
        } else if(empty($_FILES['uploaded_file']['name'])){
            // Handle case where no alignment data is submitted
            die("<a class='requestbutton' href='submit.php'>No alignment data was submitted</a>");
        } else {
            // Extract the file contents
            $contents = file_get_contents($_FILES['uploaded_file']['tmp_name']);
            
            // Extract sequences and headers from the file content
            $lines = explode("\n", $contents);              // Extract all lines from the content
            $sequences =  [];                               // Initiate an empty sequences array
            foreach($lines as $line){                       // Loop over all lines
                $line = trim($line);                        // Trim the line to remove any unwanted residual whitespace
                if(preg_match("/^>/", $line)){              // Check if the current line is a header
                    $currentHeader = $line;
                } else if(!empty($line)){                   // Check if the current line is not empty
                    $sequences[$currentHeader][] = $line;   // Save the chunked sequence along with its corresponding header in a subarray
                }
            }

            // Split sequences into chunks based on user input
            $organismsSequenceChunks = [];                                                      // Initiate an empty sequence chunks array, where the indexes will be the headers (i.e. organisms) and the values will be subarrays
            foreach($sequences as $header => $sequence){                                        // Loop over all headers and corresponding sequences
                $sequence = implode('', $sequence);                                             // Implode the sequence subarray to get 1 singular sequence string
                $organismsSequenceChunks[$header] = str_split($sequence, $_POST['nucLine']);    // Create sequence chunks of size $_POST['nucLine'] and store them in a subarray 
                $NOChunks = count(str_split($sequence, $_POST['nucLine']));                     // Determine the number of sequence chunks per header (this operation is performed for each header, but the count remains consistent across all headers)  
            }

            // Extract nucleotide colors or use default white color
            $nucleotideColor['A'] = $_POST['A'] ?? 'white';
            $nucleotideColor['T'] = $_POST['T'] ?? 'white';
            $nucleotideColor['G'] = $_POST['G'] ?? 'white';
            $nucleotideColor['C'] = $_POST['C'] ?? 'white';

            // Check if none of the colors are empty
            foreach($nucleotideColor as $nucleotide => $color){             // Loop over all of the colors
                if(empty(trim($color))){                                    // Check if the color for a nucleotide is empty
                    $nucleotideColor[$nucleotide] = 'white';                // If empty, assign the color white
                }
            }

            // Validate and clean conservation scores                               // NOTE: Conservation scores, in the context of bioinformatics and molecular biology, are numerical values that indicate the degree of evolutionary conservation
            if (!empty(trim($_POST['conservation']))) {                             // Check if conservation scores were provided
                $conservationScores = explode("\n", $_POST['conservation']);        // Explode the conservation scores on a newline, creating a conservation score array
                $cleanedConservationScores = [];                                    // Initiate an empty array to store cleaned conservation scores
                foreach($conservationScores as $score){                             // Loop over all the conservation scores
                    if(!empty(trim($score))){                                       // Check whether the conservation score is empty or not 
                        $cleanedConservationScores[] = $score;                      // If not empty, store the conservation score in the cleaned conservation score array
                    }
                }
                $conservationScores = $cleanedConservationScores;                   // Overwrite the conservation scores array with the cleaned conservation scores array

                // Calculate chunk size based on user input
                $chunkSize = $_POST['nucLine'];                                     

                // Create conservation score chunks                                 // NOTE: We aim to generate conservation score chunks that correspond to the sequence chunks created earlier in this script. Each conservation score chunk at index 0 will align with the sequence chunks of organisms at index 0, and so on.
                $conservationChunks = [];                                           // Initiate an empty array to store the conservation score chunks
                $index = 0;                                                         // Initiate an index variable that starts at 0
                foreach ($conservationScores as $score) {                           // Loop over all conservation scores
                    $conservationChunks[$index][] = $score;                         // Save the current score within a nested subarray at the current index of the main array

                    // Check if the chunk size is reached
                    if (count($conservationChunks[$index]) == $chunkSize) {
                        $index++;                                                   // When the chunk size (defined as the allowed nucleotides per line) is reached, increment the index by 1 to start a new chunk.
                    }
                }
            }

            // Visualise sequence chunks and conservation bars
            for($chunk = 0; $chunk < $NOChunks; $chunk++){                              // Iterate over all chunks, starting at chunk with index 0 and stopping at the final chunk
                // Create a content div
                echo "<div class='content'>";
                
                // Create a header div
                echo "<div class='header'>";
                // Display sequence headers                                             
                foreach(array_keys($organismsSequenceChunks) as $header){                   // Iterate over the sequence headers
                    echo "<span style='font-family: monospace;'>$header</span><br>";        // Display the current header
                }
                echo "</div>";                                                              // Close the header div
                
                // Create a sequence div
                echo "<div class='sequence'>";
                foreach($organismsSequenceChunks as $organismSequenceChunks){               // Loop through the subarrays containing sequence chunks for each header (i.e. organism).
                    // Select the required sequence chunk during this iteration
                    $sequenceChunk = $organismSequenceChunks[$chunk];                       // Note: In each iteration of the loop, we collect chunks with the same index across all organisms.

                    // Replace the nucleotides in the sequence by styled nucleotides
                    $sequenceChunk = str_replace("A", "<span style='background:" . $nucleotideColor['A'] . ";'>A</span>", $sequenceChunk);
                    $sequenceChunk = str_replace("T", "<span style='background:" . $nucleotideColor['T'] . ";'>T</span>", $sequenceChunk);
                    $sequenceChunk = str_replace("G", "<span style='background:" . $nucleotideColor['G'] . ";'>G</span>", $sequenceChunk);
                    $sequenceChunk = str_replace("C", "<span style='background:" . $nucleotideColor['C'] . ";'>C</span>", $sequenceChunk);

                    // Print the sequence chunk with a monospaced font
                    echo "<span style='font-family: monospace;'>$sequenceChunk</span><br>";     // NOTE: We use a monospaced font, so that all characters take up the same amount of space
                }

                // Create the visual conservation score bars
                if (!empty(trim($_POST['conservation']))) {                                         // Check if conservation scores were provided
                    // Loop over all the scores in the current conservation score chunk
                    foreach($conservationChunks[$chunk] as $score){                                 // Iterate through the conservation scores corresponding to the current chunk index
                        // Transform the score into a percentage
                        $percentage = $score * 100;

                        // Create the visual bars 
                        echo "<div class='full'>";                                                      // Create a full bar with a relative position (see styling)
                            echo "<div class='fill' style='height:$percentage%'></div>";                // Create a fill bar with an absolute position (see styling) relative to the full bar
                            echo "<span style='visibility: hidden'>A<span>";                            // Use a hidden character to automatically determine the width of the full bar
                        echo "</div>";
                    }
                }

                // Close the sequence div
                echo "</div>";

                // Close the content div
                echo "</div>";
            }
        }
    ?>
</body>
</html>
