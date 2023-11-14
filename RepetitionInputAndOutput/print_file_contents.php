<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File print contents</title>
</head>
<body>
    <h1>File print contents</h1>

    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploaded_file">
        <input type="submit" name="submit" value="Upload file">
    </form>

    <?php
         if (isset($_POST['submit'])){
            #print_r($_POST);

            $contents = file_get_contents($_FILES['uploaded_file']['tmp_name']);
            echo "<pre>";
                print_r($_FILES);
            echo "</pre>";
            echo "<pre>$contents</pre>";
         }
    ?>
</body>
</html>