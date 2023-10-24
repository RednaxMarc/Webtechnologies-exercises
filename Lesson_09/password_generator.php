<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
</head>
<body>
    <h1>Password Generator</h1>

    <form action="#" method="GET">
        Number of passwords: <input type="number" name="passAmount" value="<?php echo $_GET['passAmount'] ?? 10?>"><br>
        Number of characters: <input type="number" name="charAmount" value="<?php echo $_GET['charAmount'] ?? 15?>"><br>
        Add numbers: <input type="checkbox" name="addNumbers" checked ><br>
        <input type="submit" name="submit" value="Generate!" id="">
    </form>

    <?php
        if(isset($_GET['submit'])){
            $lowercase = range('a','z');
            $uppercase = range('A', 'Z');
            $numbers = range(0,9);

            $allCharacters = array_merge($lowercase, $uppercase); 

            if(isset($_GET['addNumbers'])){
                $allCharacters = array_merge($lowercase, $uppercase, $numbers);
            }
            
            // Loop over all the passwords
            for ($passwordNumber = 1; $passwordNumber <= $_GET['passAmount']; $passwordNumber ++){
                echo "Password $passwordNumber:";
            
                // Logic to create the actual password
                for ($char = 1; $char <= $_GET['charAmount']; $char ++){
                    $randomIndex = rand(0, count($allCharacters)-1);
                    echo $randomIndex;
                    // Display the random character
                    echo $allCharacters[$randomIndex];
                    
                }
                echo "<br>";
            }
        }
    ?>  
</body>
</html>