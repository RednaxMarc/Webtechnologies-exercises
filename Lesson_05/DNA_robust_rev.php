<?php
    echo "orig.: $argv[1] \n";
    $oriDNA_modi= preg_replace('/\s+/', '', $argv[1]); 
    $FWD_strand = str_split($oriDNA_modi);
    #print_r($FWD_strand);
    $invalid = [];

    echo "comp.: ";
    foreach ($FWD_strand as $nt){
        if ($nt == "A" || $nt == "a"){
            echo "T";
        }
        else if ($nt == "T" || $nt == "t"){
            echo "A";
        }
        else if ($nt == "G" || $nt == "g"){
            echo "C";
        }
        else if ($nt == "C" || $nt == "c"){
            echo "G";
        }
        else {
            array_push($invalid, $nt);
        }
    }
    echo "\n";
    #print_r($invalid);
    $occurences = array_count_values($invalid);
    #print_r($occurences);
    echo "Invalid NT characters: \n";
    foreach ($occurences as $character => $times){
        echo "$character: $times occurences \n";
    }
?>