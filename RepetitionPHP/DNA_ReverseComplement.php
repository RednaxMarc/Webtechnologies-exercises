<?php
    $originDNA = str_split($argv[1]);
    #print_r($originDNA);
    echo "\n";
    echo "orig.: $argv[1] \n";
    
    echo "       ";
    foreach ($originDNA as $nt){
        echo "|";
    }
    echo "\n";
    echo "comp.: ";
    foreach ($originDNA as $nt){
        if ($nt == 'A'){echo "T";}
        elseif ($nt == 'T'){echo "A";}
        elseif ($nt == 'G'){echo "C";}
        elseif ($nt == 'C'){echo "G";}
        else {die("\nUnknown nucleotide: $nt \n");}
    }
    echo "\n \n";
?>