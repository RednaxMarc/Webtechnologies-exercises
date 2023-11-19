<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <link rel="stylesheet" href="stylesheet.css">
</head>

<div class="navbar">
        <?php
            include('navbar.html');
        ?>
</div>

<body class="index">
        
    <h1>Protein Visualization Tool</h1>

        <div class="index">
            <p>Explore the fascinating world of proteins with this Protein Visualization Tool.</p>

            <h2>How to use:</h2>
        
            <p class="index">
            Submit your protein sequences using the <a href="submit.php">user-friendly interface</a>. You can either upload 
            a (multi)fasta file or paste the sequences directly. Customize your visualization 
            preferences, such as coloring amino acid groups, to enhance the visualization.
            </p>
            
            <h2>Features:</h2>

            <ul>
                <li>Upload (multi)fasta files or paste sequences for visualization.</li>
                <li>Color-code amino acid groups for easy identification.</li>
                <li>Group amino acids to enhance readability.</li>
                <li>Remove or highlight invalid amino acids for accurate analysis.</li>
            </ul>

            <h2>Get Started</h2>

            <p>Click on the "Submit Sequences" button to begin the protein visualization journey.</p>
        </div>
        <a href="submit.php" class="button"><div class="button">Submit Sequences!</div></a>
</body>     
</html>