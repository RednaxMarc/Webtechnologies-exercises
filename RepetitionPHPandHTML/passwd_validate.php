<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Validator</title>
</head>
<body>
    <h1>Password Validator</h1>

    <form action="#" method="POST">
        Password 1: <input type="password" name="pass1"><br>
        Password 2: <input type="password" name="pass2"><br>
        <input type="submit" name="submit" value="Validate Password"><br>
    </form>

    <?php
        if(isset($_POST['submit'])){
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];

            // Array to store all of the errors
            $errors = [];

            // Check is the passwords match
            if($pass1 != $pass2){
                $errors[] = "Passwords don't match";
            }

            // Check if passwords contains at least 1 number and 1 letter
            $pass1Chars = str_split($pass1);
            $number = false; $letter = false;
            foreach($pass1Chars as $character){
                // Is the character a number?
                if(in_array($character, range(0,9))){
                    $number = true;
                }
                // Is the character a letter?
                if(in_array($character, range('a','z'))){
                    $letter = true;
                }
            }
            if($number != true OR $letter != true){
                $errors[] = "Password must contain at least 1 number and 1 letter";
            }

            // Checking if the password is at least 8 characters
            if(strlen($pass1) < 8){
                $errors[] = "Password must be at least 8 characters long";
            }

            // Printing succes or errors
            if(empty($errors)){
                echo "Passwords match! :)";
            }
            else{
                foreach($errors as $error){
                    echo "$error<br>";
                };
            }
        }
    ?>
</body>
</html>