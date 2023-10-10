<?php
    $FWD_strand = str_split($argv[1]);
    #print_r($FWD_strand);
    echo "$argv[1] \n";
    foreach ($FWD_strand as $nt){
        echo "|";
    }
    echo "\n";
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