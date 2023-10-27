<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reading files</title>
</head>
<body>
    <h1>File reader</h1>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploaded_file">
        <input type="submit" name="submit" value="Upload file">
    </form>

    <?php
        if(isset($_POST['submit'])){
            print_r($_POST);

            // Acces the file infomration
            // echo "<pre>";
                // print_r($_FILES);
            // echo "</pre>";

            // Acces the contents with method 1 (as an array)
            // $contents = file($_FILES['uploaded_file']['tmp_name']);
            // print_r($contents);

            // Acces the contents with method 2 (as an array)
            // $contents = file_get_contents($_FILES['uploaded_file']['tmp_name']);
            // $lines = explode("\n", $contents);
            // print_r($lines);

            // Acces the contents with method 2 (as a string)
            $contents = file_get_contents($_FILES['uploaded_file']['tmp_name']);
            print_r($_FILES);
            echo "$contents";

            // echo "<pre>";
                // print_r($lines);
            // echo "</pre>";
        }
    ?>

</body>
</html>