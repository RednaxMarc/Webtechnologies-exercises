<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alignment</title>

    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php 
        include("navbar.html");
        if(!($_FILES["MSA"]["error"] == 0)){
            echo "<h1>Visualising Error</h1>"; 
            echo "<div class='error''><p>Something went wrong! Please first submit a new analysis.</p></div><br>";
            
            echo "<div id='buttonhome'><a href='newAnalysis.php'><button>Submit new visualisation request</button></a></div>";
        }


        else{
            echo "<h1>Visualising MSA for file " . $_FILES["MSA"]["name"] . "</h1>"; 
            if(empty(trim($_POST["Acolor"])) or empty(trim($_POST["Tcolor"])) or empty(trim($_POST["Ccolor"])) or empty(trim($_POST["Gcolor"]))){
                echo "<div class='error'><p>Default collors were given to the empty color fields!</p></div>";
            }
            if(empty(trim($_POST["nucPerLine"]))){
                echo "<div class='error'><p>A default number of nucleotides per line was given!</p></div>";
                $nucPerLine = 80;
            }
            else{
                $nucPerLine = $_POST["nucPerLine"];
            }
            
            $colors["A"] = $_POST["Acolor"] ?? "white";
            $colors["T"] = $_POST["Tcolor"] ?? "white";
            $colors["C"] = $_POST["Ccolor"] ?? "white";
            $colors["G"] = $_POST["Gcolor"] ?? "white";
            $colors["-"] = "white";

            foreach($colors as $nuc => $color){
                if(empty(trim($color))){
                    $colors[$nuc] = "white";
                }
            }

            
            if(!empty($_POST["conservationScores"])){
                $scores = explode("\n", $_POST["conservationScores"]);
            }


            $multiFasta = file_get_contents($_FILES["MSA"]["tmp_name"]);
            $fastas = explode(">", $multiFasta);
            array_shift($fastas);
            foreach($fastas as $fasta){
                $fasta = explode("\n", $fasta);
                $nameSeq = trim(array_shift($fasta));
                $fasta = implode("", $fasta);
                $fasta = str_replace(" ", "", $fasta);
                $seqLen = strlen($fasta); #is voor een latere stap
                $sequences[">$nameSeq"] = str_split($fasta); 
            }





            $names = "";
            $seq = "";
            $longest = 0;
            foreach($sequences as $name => $nucs){
                $names = $names . $name . "<br>";
                if(strlen($name) > $longest){
                    $longest = strlen($name);
                }
            }
            if(!empty($_POST["conservationScores"])){
                $names = $names . "<div class='bar' style='background: white; width: 10px; height: 30px;'></div>";
            }
            
            
            $divWidthT = intdiv(100 * $longest, $longest + $nucPerLine);
            $divWidthB = intdiv(100 * $nucPerLine, $longest + $nucPerLine);
            $fontSize = 140 / ($longest + $nucPerLine);
            $boxWidth = 0.6 * $fontSize;

            for($counter = 0; $counter < intdiv($seqLen, $nucPerLine) + 1; $counter++){
                echo "<div class='align'>";
                foreach($sequences as $name => $nucs){

                    for($index = $counter * $nucPerLine; $index < ($counter + 1) * $nucPerLine; $index++){
                        $seq = $seq . "<span style='background: " . $colors[$nucs[$index] ?? "-"] . ";'>" . ($nucs[$index] ?? " ") . "</span>";
                    }
                    $seq = $seq . "<br>";
                }

                if(!empty($_POST["conservationScores"])){
                    for($index = $counter * $nucPerLine; $index < ($counter + 1) * $nucPerLine; $index++){
                        $seq = $seq . "<div class='bar' style='background: grey; width: " . $boxWidth . "vw; height: " . ($scores[$index] ?? 0) * 30 . "px;'></div>";
                    }
                }

                
                
                echo "<div class='inline'>";
                echo "<div class='title' style='width: " . $divWidthT . "%;'><pre style='font-size: " . $fontSize . "vw;'>$names</pre></div>"; 
                echo "<div class='bases' style='width: " . $divWidthB . "%;'><pre style='font-size: " . $fontSize . "vw;'>$seq</pre></div>"; 
                echo "</div>";
                echo "</div>";
                $seq = "";
            }
        }

        
        
    ?>
    
</body>
</html>