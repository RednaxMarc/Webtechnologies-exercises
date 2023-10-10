<?php
    $FWD_strand = str_split($argv[1]);
    #print_r($FWD_strand);
    echo "orig.:$argv[1] \n";
    echo "      ";
    foreach ($FWD_strand as $nt){
        echo "|";
    }
    echo "\n";
    echo "comp.:";
    foreach ($FWD_strand as $nt){
        if ($nt == "A"){
            echo "T";
        }
        else if ($nt == "T"){
            echo "A";
        }
        else if ($nt == "G"){
            echo "C";
        }
        else if ($nt == "C"){
            echo "G";
        }
    }
    echo "\n";

?>