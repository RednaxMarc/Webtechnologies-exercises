<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV to HTML Table App</title>

    <style>
        table{
            border-collapse: collapse;
        }
        td{
            border: solid 1px black;
        }
        tr:nth-child(1){
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>CSV to HTML Table App</h1>
    <form action="#" method="POST">
        Insert your text here: <br><textarea name="csv" cols="100" rows="10"></textarea><br>
        Delimeter: <br><input type="text" name="delimeter" id=""><br>
        <input type="submit" name="submit">
    </form>

    <hr>

    <?php
        if(isset($_POST['submit'])){
            $csvData = $_POST['csv'];
            $delimeter = $_POST['delimeter'];

            $linesCSV = explode("\n", $csvData);

            $lineOneExplode = explode($delimeter, $linesCSV[0]);
            $countItemsLineOne = count($lineOneExplode);
            
            echo "<table>";
            foreach ($linesCSV as $key => $line){
                $items = explode($delimeter, $line);
                $countItems = count($items);
                if ($countItems != $countItemsLineOne){
                    die("ERROR: Number of fields incorrect...");
                }
                echo "<tr>";
                foreach ($items as $value){
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>