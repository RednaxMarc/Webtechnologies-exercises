<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualise</title>
    <link rel="stylesheet" href="stylesheet.css">

    <style>
        .error{
            display: block;
            color: white;
            background: darkred;
            padding: 1em;
            width: fit-content;
            border: solid white 1px;
            outline: solid darkred 2px ;
            font-weight: bold;

            margin: 1em auto;
        }
        .header{
            font-weight: bold;
        }
        .A {
            background: orange;
            font-family: monospace;
        }
        .C {
            background: blue;
            font-family: monospace;
        }
        .T {
            background: yellow;
            font-family: monospace;
        }
        .G {
            background: green;
            font-family: monospace;
        }
        .U {
            background: green;
            font-family: monospace;
        }
        .Nuc{
            font-family: monospace;
        }
    </style>
</head>
<body>

<?php require('navbar.html');?>

    <div class="content" >
        <h1>Visualise Sequences</h1>

        <?php
        #########
        # Errors#
        #########

            # Not submitted
            if (!isset($_POST['submit'])) {
                echo"<div class=\"error\">The page is accessed without sending any data.</div><br>";
                echo"<p>Please correct the issues and resubmit the <a href=\"submit.php\">form</a></p>"; 
            }
            # Submitted
            elseif (isset($_POST['submit']) AND (!isset($_POST["selection"])) OR !isset($_POST["Errors"]))
             {
                # No selection was made
                if (!isset($_POST["selection"])) {
                    echo "<div class=\"error\">The page is accessed without sending any data.</div><br>";
                }

                # Selection was made
                else {
                    # Selected paste but empty
                    if ($_POST['selection'] == "paste") {
                        if (empty(trim($_POST["data"]))) {
                        echo "<div class=\"error\">An upload type was picked, but no fasta was received.</div><br>";
                        }
                    }
                    # Selected upload but empty
                    elseif ($_POST['selection'] == "upload") {
                        if (empty(file_get_contents($_FILES['uploaded_file']['tmp_name']))) {
                            echo "<div class=\"error\">An upload type was picked, but no fasta was received.</div><br>";
                        }
                    }

                }

                # No error handling was picked
                if(!isset($_POST["Errors"])) {
                    echo "<div class=\"error\">No error handling option was picked.</div><br>";
                }
                echo"<p>Please correct the issues and resubmit the <a href=\"submit.php\">form</a></p>"; 

            }




            ####### Code ########
         if(isset($_POST['submit'])){

            # Select input
            $content = ($_POST['selection'] == 'upload') ? file_get_contents($_FILES['uploaded_file']['tmp_name']) : $_POST['textfield'];

            # Split the lines of file
            $lines = explode("\n", $content);
            
            # Separate header and sequence in a new sequences array
            $sequences=[];


            foreach ($lines as $line) {
                trim($line); // remove whitespace
                # Headers
                if (preg_match("/^>/", $line)){
                    $currentHeader=$line;;
                    $fullsequence= "";
                }
                #loop over every character that is not in the header
                else{ 
                    $fullsequence .= $line;
                    $sequences[$currentHeader] = $fullsequence;
                }
                // move to next sequence pair
            }

            foreach ($sequences as $header => $sequence) {
                # Display the header
                echo "<span class=\"header\" >$header</span><br>";

                #Mold the sequence
                foreach (str_split($sequence) as $index => $character) {
                    $character=trim($character);
                    $character=strtoupper($character);

                    // Filter

                    # remove
                    if(in_array($character, ['A', 'T', 'G', 'C'])){
                        // Max per line
                        $max = $_POST['NucPerLine'];
                        if($index % $max == 0 and $index != 0){
                            echo "<br>";
                        }
                        // Logic to group the nucleotides
                        if(isset($_POST['Per12']) and $index % 12 == 0 and $index != 0){
                            echo "<span class=\"Nuc\" > </span>";
                        }

                        // RNA
                        if (isset($_POST['RNA']) and isset($_POST["Background"]) and $character =='T'){
                            if ($character == 'T') {
                                echo "<span class=\"U\">U</span>";
                            }
                        }
                        elseif (isset($_POST['RNA']) and $character == 'T'){
                            if ($character == 'T') {
                                echo "<span class=\"Nuc\">U</span>";
                            }
                        }

                        //Background
                        if (isset($_POST["Background"])){
                            echo "<span class=\"$character\">$character</span>";
                        }
                        else {
                            echo "<span class=\"Nuc\">$character</span>";
                        }
                    }
                    # higlight
                    elseif ($_POST['Errors'] == 'highlight' and !in_array($character, ['A', 'T', 'G', 'C'])) {
                        echo "<span style=\"font-family: monospace; background: red;\" >$character</span>";
                    }

                 

                }
                echo "<br>";
            }

            
            

            
         }

        ?>
    </div>
    
<?php require('navbar.html');?>
    
</body>
</html>