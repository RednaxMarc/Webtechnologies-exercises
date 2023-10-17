<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lists</title>
</head>
<body>
    <h1>My Favorite things</h1>
    <?php
        $dishes = ['Fries', 'Pasta', 'Steak'];
        $hobbies = ['Swim', 'Bike', 'Run'];
   
        echo "<ol>";
        foreach($dishes as $i){
            echo "<li>$i</li>";
        }
        echo "</ol>";

        echo "<ul>";
        foreach($hobbies as $i){
            echo "<li>$i</li>";
        }
        echo "</ul>";
    ?>  
</body>
</html>