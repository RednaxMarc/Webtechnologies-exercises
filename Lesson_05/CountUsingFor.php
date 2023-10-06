<?php
    print_r($argv);
    
    if (isset($argv[4]) == TRUE){
        for ($argv[1] == "up"; $argv[2] <= $argv[3]; $argv[2] += $argv[4]){
            echo "$argv[2] \n";
        }
    
        for ($argv[1] == "down"; $argv[2] >= $argv[3]; $argv[2] -= $argv[4]){
            echo "$argv[2] \n";
        }
    }
    
    else{
        for ($argv[1] == "up"; $argv[2] <= $argv[3]; $argv[2] += 1){
            echo "$argv[2] \n";
        }
    
        for ($argv[1] == "down"; $argv[2] >= $argv[3]; $argv[2] -= 1){
            echo "$argv[2] \n";
        }
    } 
?>
