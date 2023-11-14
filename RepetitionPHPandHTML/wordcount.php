<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Count App</title>
    <style>
        th, td{
            border: solid black 1px;
            text-align: left;
            padding: 1em;
        }
        thead th{
            text-align: center;
            text-decoration: underline;
        }
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1>Word Count App</h1>
    <form action="#" method="POST">
        Insert your text here: <br><textarea name="text" cols="100" rows="10"></textarea><br>
        Calculate:
        <p style="margin-left: 40px">
            New Lines: <input type="checkbox" name="checkLines" checked id=""><br>
            Words: <input type="checkbox" name="checkWords" checked id=""><br>
            Characters: <input type="checkbox" name="checkChars" checked id=""><br>
        </p>
        <input type="submit" name="submit" id="">
    </form>

    <hr>
 
    <?php
        if (isset($_POST['submit'])){
            #echo "<pre>";
                #print_r($_POST);
            #echo "</pre>";
            
            $content = $_POST['text'];
            echo "Entered Text: <br><pre>$content</pre><br>";
            $linesText = explode("\n", $content);
            #echo "<pre>";
                #print_r($linesText);
            #echo "</pre>";
            $newLines = count($linesText);
            #echo "Counted lines: " . $newLines . "<br>";

            $wordCount = 0;
            $charCount = 0;
            foreach ($linesText as $line){
                $wordCount += str_word_count($line);
                $charCount += strlen($line);
            }
            #echo "The wordcount is: $wordCount <br>";
            #echo "The character count (incl. all spaces) is: $charCount <br>";

            echo 
            "<table>
                <thead>
                    <th colspan=2>Stats</th>
                </thead>";
            if (isset($_POST['checkLines'])){
                echo
                "<tr>
                    <th>New lines</th>
                    <td>$newLines</td>
                </tr>";
            }
            if (isset($_POST['checkWords'])){
                echo
                "<tr>
                    <th>Words</th>
                    <td>$wordCount</td>
                </tr>";
            }
            if (isset($_POST['checkChars'])){
                echo
                "<tr>
                    <th>Characters</th>
                    <td>$charCount</td>
                </tr>";
            }
            echo
            "</table>";
        }
    ?>
</body>
</html>