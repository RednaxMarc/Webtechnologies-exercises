<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rainbow</title>
</head>
<body>
    <?php
        $colors = [
            "red",
            "orange",
            "green",
            "blue",
            "indigo",
            "violet"
        ];

        for($row=1; $row <= count($colors); $row ++){
            for($column=1; $column <= $row; $column ++){
                $color = $colors[$column-1];
                echo "<span style='color: $color'>*</span>";
            }
            echo "<br>";
        }
    ?>
</body>
</html>