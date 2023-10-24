<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV to HTML table</title>
</head>
<body>
    <h1>CSV to HTML table</h1>

    <form action="#" method="POST">
        CSV: <br>
        <textarea name="csv" id="" cols="30" rows="10"></textarea><br>
        Delimeter: <input type="text" name="delimeter" id=""><br>
        <input type="submit" name="submit">
    </form>

    <?php
        if(isset($_POST['submit'])){
            $csvData = $_POST['csv'];
            $delimeter = $_POST['delimeter'];

            $lines = explode("\n", $csvData);
            #print_r($lines);

            $lineOneItems = count(explode($delimeter, $lines[0]));

            // Iterate over all of the lines
            foreach($lines as $line){
                $items = count(explode($delimeter, $line));
                if($items != $lineOneItems){
                    die("Number of fields in incorrect...");
                }
            }
            // Table
            echo "<table>";
                foreach($lines as $key => $line){
                    $items = explode($delimeter, $line);
                    echo "<tr>";
                        foreach($items as $item){
                            if($key == 0){
                                echo "<th>$item</th>";
                            }
                            else{
                                echo "<td>$item</td>";
                            }
                        }
                    echo "</tr>";
                }
            echo "</table>";
        }
    ?>
</body>
</html>