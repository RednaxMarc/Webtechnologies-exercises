<?php
    print_r($argv);

    if ($argv[2] != "up" OR $argv[2] != "down"){
        echo "Not sufficient arguments! \n";
    }
    if ($argv[1] == "up"){
        if ($argv[2] > $argv[3]){
            echo "This is not possible! \n";
        }
        else if ($argv[2] < $argv[3]){
            while(($argv[2] - 1) != $argv[3]){
                print($argv[2]);
                echo "\n";
                $argv[2] += 1;
            }
             
                
        }
    }
    if ($argv[1] == "down"){
        if ($argv[2] < $argv[3]){
            echo "This is not possible! \n";
        }     
        else if ($argv[2] > $argv[3]){
            while(($argv[2] + 1) != $argv[3]){
                print($argv[2]);
                echo "\n";
                $argv[2] -= 1;
            }
        }
    }

    
?>