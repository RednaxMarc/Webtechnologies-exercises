<!DOCTYPE html>
<html lang="en">
<head>
    <title>Word Count</title>

    <style>
        table{
            border-collapse: collapse;
        }

        caption{
            font-weight: bold;
            font-size: 1.5em;
        }

        tr, td, th{
            border: solid 1px black;
            padding: 0.5em;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Word Count</h1>
    
    <!-- Form for user input -->
    <form action="#" method="POST">
        <textarea name="textfield" cols="30" rows="10"></textarea><br> <!-- Text area for user to input text -->
        <label><input type="checkbox" name="lines" checked>lines</label> <!-- Checkbox to count lines (auto checked) -->
        <label><input type="checkbox" name="words" checked>words</label> <!-- Checkbox to count words (auto checked) -->
        <label><input type="checkbox" name="chars" checked>chars</label> <!-- Checkbox to count characters (auto checked) -->
        <br>
        <input type="submit" name="submit"> <!-- Submit button to calculate counts -->
    </form>

    <?php
        // Check if form is submitted
        if(isset($_POST['submit'])){
            $content = $_POST['textfield']; // Get text input from the form
            $lines = explode("\n", $content); // Split text into lines based on newline character (\n)

            $lineCount = count($lines); // Count the number of lines
            $wordCount = 0; // Initialize word count variable
            $charCount = 0; // Initialize character count variable

            // Loop through each line and calculate word and character counts
            foreach($lines as $line){
                $line = str_replace("\r", "", $line); // Remove carriage return (\r) characters if present
                $words = str_word_count($line); // Count words in the line
                $wordCount += $words; // Add words count to total word count
                $charCount += strlen($line); // Add line length to total character count
            }

            echo "<br><br>";
            
            echo "<table>";
            echo "<caption>Values</caption>";
            
            // Check if 'lines' checkbox is selected
            if(isset($_POST['lines'])){
                echo "<tr>";
                echo "<th>Lines</th>";
                echo "<td>$lineCount</td>"; // Display line count
                echo "</tr>";
            }
            
            // Check if 'words' checkbox is selected
            if(isset($_POST['words'])){
                echo "<tr>";
                echo "<th>Words</th>";
                echo "<td>$wordCount</td>"; // Display word count
                echo "</tr>";
            }
            
            // Check if 'chars' checkbox is selected
            if(isset($_POST['chars'])){
                echo "<tr>";
                echo "<th>Characters</th>";
                echo "<td>$charCount</td>"; // Display character count
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>
