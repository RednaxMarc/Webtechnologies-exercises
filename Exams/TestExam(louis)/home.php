<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php include("navbar.html"); ?>
    <h1>Welcome to the awesome Multi Alignment Visualiser</h1>
    <div id="home">
        <img src="hero-img.png" alt="hero image">
        <p><?php include("welcome.txt");?></p>
    </div>
    <div id="buttonhome"><a href="newAnalysis.php"><button>Submit new visualisation request</button></a></div>
</body>
</html>