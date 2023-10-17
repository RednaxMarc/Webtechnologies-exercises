<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webform</title>
</head>
<body>
    <h3>Please, enter your data personal info here: </h3>
    <form action="#" method="POST">
        <!--Names input-->
        Firstname: <input type="text" name="firstname">
        Lastname: <input type="text" name="lastname">

        <!--Radio buttons-->
        <br>
        F<input type="radio" name="gender" value="F">
        M<input type="radio" name="gender" value="M">
        X<input type="radio" name="gender" value="X">

        <!--Numbers-->
        <br>
        Age: <input type="number" name="age">
        
        <!--Email-->
        <br>
        Email: <input type="email" name="email">

        <!--Password-->
        <br>
        Password: <input type="password" name="password">

        <!--Checkbox-->
        <br>
        Do you want to recieve updates?: <input type="checkbox">

        <!--Submit button-->
        <br>
        <input type="submit" name="submit" value="Submit">
        <br>
        
        <?php
            if(isset($_POST['submit'])){
                echo "Welcome " . $_POST['firstname'];
                echo "<br>";
                print_r($_POST);
            }
            else{
                echo "Nothing has been submitted yet...";
            }
        ?>
    </form>
</body>
</html>