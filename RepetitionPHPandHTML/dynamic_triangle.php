<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Triangle</title>
</head>
<body>
    <h1>Dynamic trianlge application</h1>
    <form action="#" method="get">
        Base of the triangle: <input type="number" name="base" value=<?php echo $_POST['base'] ?? 10; ?> id=""><br>
        Character used: <input type="text" name="char" value="<?php echo $_POST['char'] ?? "*"; ?>" id=""><br>
        <input type="submit" name="submit" id="">
    </form>

    <hr>

    <?php
        if (isset($_GET['submit'])){
            if ($_GET['base']%2 == 0){ # Even arguments
                $maxRows = $_GET['base'] / 2; # Max rows is the base ($argv[1]) devided by 2
                for ($row = 1; $row <= $maxRows; $row ++){
                    for ($spaces = 1; $spaces <= $maxRows - $row; $spaces ++){ # Spaces per row are max rows minus the row number
                        echo "&nbsp";
                    }
                    for ($asterisks = 1; $asterisks <= $row * 2; $asterisks ++){ # Asterisks per row are the rownumber times 2
                        echo "$_GET[char]";
                    }
                    echo "<br>";
                }
            }
            if ($_GET['base']%2 != 0){ # Uneven arguments
                $maxRows = ($_GET['base'] + 1) / 2; # Max rows is the base ($argv[1]) devided by 2, plus 1 (because uneven base)
                for ($row = 1; $row <= $maxRows; $row ++){
                    for ($spaces = 1; $spaces <= $maxRows - $row; $spaces ++){ # Spaces per row are max rows minus the row number
                        echo "&nbsp";
                    }
                    for ($asterisks = 1; $asterisks <= ($row * 2) -1; $asterisks ++){ # Asterisks per row are the rownumber times 2, minus 1 (because of uneven base)
                        echo "$_GET[char]";
                    }
                    echo "<br>";
                }
            }
        }
    ?>
</body>
</html>