<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardian of Age</title>
</head>
<body>
    <h1>Guardian of Age</h1>
    <form action="" method="GET">
        Firstname: <input type="text" name="firstname" id=""><br>
        Lastname: <input type="text" name="lastname" id=""><br>
        Age: <input type="number" name="age" id=""><br>
        <input type="submit" name="submit" value="Check your age" id="">
    </form>

    <?php
        if (isset($_GET['submit'])){
            #print_r($_GET);
            echo "This is your provided data: <br>";
            echo "<p>";
            foreach ($_GET as $key => $value){
                if (!empty($value)){
                    echo "<strong>$key</strong>: $value <br>";
                }
                elseif (empty($value)){
                    echo "<strong>$key</strong>: No data provided... <br>";
                }
            }
            echo "</p>";
            if (empty($_GET['age'])){
                echo "<br>Error: Please Provide an age... <br>";
            }
            else {
                if ($_GET['age'] < 21){
                    echo "You are not old enough! <br>";
                    print("You should wait " . 21-$_GET['age'] . " more year(s).");
                }
                if ($_GET['age'] > 21){
                    echo "You are old enough! <br>";
                }
            }
        }
    ?>
</body>
</html>