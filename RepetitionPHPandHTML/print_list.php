<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Some Lists</title>
</head>
<body>
    <h3>My favorite dishes</h3>
    <?php 
        $favDishes = ["Fries", "Pasta", "Steak"];
        echo "<ol>";
        foreach ($favDishes as $dish){
            echo "<li> $dish </li>";
        }
        echo "</ol>";
    ?>

    <h3>My hobbies</h3>
    <?php
        $hobbies = ["Swim", "Bike", "Run"];
        echo "<ul>";
        foreach ($hobbies as $sport){
            echo "<li>$sport</li>";
        }
        echo "</ul>";
    ?>
    
</body>
</html>