<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Trianlge</title>
</head>
<body>
    <h2>Triangle Application</h2>
    <form action="#" method="POST">
        Base: <input type="text" name="base" value="<?php echo $_POST['base'] ?? 10;?>">
        Symbol: <input type="text" name="symbol" value="<?php echo $_POST['symbol'] ?? "*";?>">
        <input type="submit" value="Make the triangle" name="submit">
    </form>
    <hr>
    <?php
        for ($row=1; $row<=$_POST['base']; $row+=1){
            for ($sign=1; $sign <= $row; $sign+=1){
                echo $_POST['symbol'];
            }
            echo "<br>";
        } 
    ?>
</body>
</html>