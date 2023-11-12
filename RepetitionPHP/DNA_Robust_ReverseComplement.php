<?php
    $originDNA = $argv[1];
    $originDNA = preg_replace('/\s+/', '', $argv[1]);
    $arrayOriginDNA = str_split($originDNA);
    print_r($arrayOriginDNA);
    echo "\norig.: $argv[1] \n";

    $invalid = [];
    echo "comp.: ";
    foreach ($arrayOriginDNA as $nt){
        if ($nt == 'A' || $nt =='a'){echo "T";}
        elseif ($nt == 'T' || $nt =='t'){echo "A";}
        elseif ($nt == 'G' || $nt =='g'){echo "C";}
        elseif ($nt == 'C' || $nt =='c'){echo "G";}
        else {array_push($invalid, $nt);}
    }
    
    echo "\n\n";

    echo "invalid NT characters: \n";
    $invalidOccurences = array_count_values($invalid);
    print_r($invalidOccurences);
?>