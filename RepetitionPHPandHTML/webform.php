<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Webform</title>
</head>
<body>
    <h1>Basic Webform</h1>
    <form action="#" method="POST">
        Firstname: <input type="text" name="firstname" id=""><br>
        Lastname: <input type="text" name="lastname" id=""><br>
        Gender: 
        <label><input type="radio" name="gender" value="Male" id="">Male</label>
        <label><input type="radio" name="gender" value="Female" id="">Female</label><br>
        Age: <input type="number" name="age" id=""><br>
        Email: <input type="email" name="email" id=""><br>
        Password: <input type="password" name="password" id=""><br>
        Do you want to recieve updates? <input type="checkbox" name="updates" id=""><br>
        <input type="submit" name="submit" value="Submit!" id="">
    </form>

    <?php
        if (isset($_POST['submit'])){
            echo "Welcome, $_POST[firstname]! <br>";
            echo "This is all of the provided data: <br>";
            foreach ($_POST as $key => $value){
                if (!empty($value)){
                    echo "$key: $value <br>";
                }
                else{
                    echo "$key: Nothing submitted... <br>";
                }
                
            }
            #print_r($_POST);
        }
    ?>
</body>
</html>