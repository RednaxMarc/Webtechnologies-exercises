<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardian of age</title>
</head>
<body>
    <h3>Please, enter your data personal info here: </h3>
    <form action="#" method="POST">
        <!--Names input-->
        Firstname: <input type="text" name="firstname">
        Lastname: <input type="text" name="lastname">

        <!--Numbers-->
        <br>
        Age: <input type="number" name="age">

        <!--Submit button-->
        <br>
        <input type="submit" name="submit" value="Submit">
        <br>
    </form>

    <?php
        if(isset($_POST['submit'])){
            echo "Dear, " . $_POST['firstname'];
            echo "<br>";
            if($_POST['age']>=21){
                echo "Acces granted";  
            }
            else{
                echo "Acces denied...";
                echo "<br>";
                echo "You should wait " . 21-$_POST['age'] . " year(s)...";
            }
        }
    ?>
</body>
</html>