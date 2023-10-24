<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word count</title>
</head>
<body>
    <h2>Word calculator</h2>
    <form action="#" method="POST">
        Enter text: <br><textarea name="textfield" cols="50" rows="5"></textarea><br>
        Lines<input type="checkbox" name="lines" checked>
        Words<input type="checkbox" name="words" checked>
        Characters<input type="checkbox" name="chars" checked>
        <input type="submit" value="Calculate" name="submit"> 
    </form>

    <hr>

    <?php
        // Check if form is submitted and make the table
        if(isset($_POST['submit'])){
            $content=$_POST['textfield'];
            echo "Entered Text: " . $content . "<br>";
            $lines = explode("\n", $content);
            #print_r($lines);

            $linecount=count($lines);
            $wordcount =0 ;
            $charcount = 0;

            foreach($lines as $line){
                $wordcount += str_word_count($line);
                $charcount =+ strlen($line);
            }
            echo "<table>";
            if(isset($_POST['lines'])){
                echo "<tr>";
                    echo "<th>Lines</th>";
                    echo "<td>$linecount</td>";
                echo "</tr>";
            }
            if(isset($_POST['words'])){
                echo "<tr>";
                    echo "<th>Words</th>";
                    echo "<td>$wordcount</td>";
                echo "</tr>";
            }
            if(isset($_POST['chars'])){
                echo "<tr>";
                    echo "<th>Characters</th>";
                    echo "<td>$charcount</td>";
                echo "</tr>";
            }                      
            echo "</table>";
        }
    ?>
</body>
</html>