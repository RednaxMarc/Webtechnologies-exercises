<?php
    $name="Xander";
    if (isset($name)){
        echo "The variable exists \n";
    }
?>

<?php
    $name = "";
    if (empty($name)){
        echo "This is empty \n";
    }
?>

<?php
    $name="Xander Marcle";
    echo strlen($name);
    echo "\n";
?>

<?php
    $name="Xander Marcle";
    echo str_replace("Marcle", "Janssens", $name);
    echo "\n";
?>

<?php
    $name="Xander Marcle";
    echo strtoupper($name);
    echo "\n";
?>

<?php
    $name="Xander Marcle";
    echo strtolower($name);
    echo "\n";
?>

<?php
    $csv="I,am,tired";
    echo $csv;
    echo "\n";
?>

<?php
    $csv="I,am,tired";
    $csvArray=explode(",", $csv);
    print_r($csvArray);
    echo "\n";
?>

<?php
    $csv="I;am;tired";
    $csvArray=explode(";", $csv);
    print_r($csvArray);
    echo "\n";
?>


<?php
    $nucleotide="ATGCATGC";
    $nucleotideArray=str_split($nucleotide);
    print_r($nucleotideArray);
    echo "\n";
    echo count($nucleotideArray);
    echo "\n";
?>

<?php
    $nucleotide="ATGCATGC";
    $nucleotideArray=str_split($nucleotide);
    print_r($nucleotideArray);
    echo "\n";
    echo count($nucleotideArray);
    echo "\n";
    echo implode(" ", $nucleotideArray);
    echo "\n";
?>
