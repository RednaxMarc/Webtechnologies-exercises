<?php
    $FWD_strand = str_split($argv[1]);
    #print_r($FWD_strand);
    $total_nts = count($FWD_strand);
    $A_list = [];
    $T_list = [];
    $G_list = [];
    $C_list = [];

    foreach ($FWD_strand as $nt){
        if ($nt == "A"){
            array_push($A_list, $nt);        
        }
        else if ($nt == "T"){
            array_push($T_list, $nt);        
        }
        else if ($nt == "G"){
            array_push($G_list, $nt);        
        }
        else if ($nt == "C"){
            array_push($C_list, $nt);        
        }
    }
    $A_sum = count($A_list);
    $A_prev = ($A_sum/$total_nts)*100;
    $T_sum = count($T_list);
    $T_prev = ($T_sum/$total_nts)*100;
    $G_sum = count($G_list);
    $G_prev = ($G_sum/$total_nts)*100;
    $C_sum = count($C_list);
    $C_prev = ($C_sum/$total_nts)*100;

    echo "Stats: \n";
    echo "A: $A_sum nts -> $A_prev % \n";
    echo "T: $T_sum nts -> $T_prev % \n";
    echo "G: $G_sum nts -> $G_prev % \n";
    echo "C: $C_sum nts -> $C_prev % \n";
    
    echo "\n";
    
    echo "Graph: \n";
    echo "A:";
    foreach($FWD_strand as $nt){
        if ($nt == "A"){
            echo "=";
        }
    }
    echo "\n";
    echo "T:";
    foreach($FWD_strand as $nt){
        if ($nt == "T"){
            echo "=";
        }
    }
    echo "\n";
    echo "G:";
    foreach($FWD_strand as $nt){
        if ($nt == "G"){
            echo "=";
        }
    }
    echo "\n";
    echo "C:";
    foreach($FWD_strand as $nt){
        if ($nt == "C"){
            echo "=";
        }
    }
    echo "\n";
?>