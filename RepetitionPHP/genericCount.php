<?php
    if (count($argv) == 4){
        if ($argv[1] == 'up'){
            while ($argv[2] <= $argv[3]){
                echo "I count $argv[2] \n";
                $argv[2] ++;
            }
        }
        elseif ($argv[1] == 'down'){
            while ($argv[2] >= $argv[3]){
                echo "I count $argv[2] \n";
                $argv[2] --;
            }
        }
        if ($argv[1] !== 'up' AND $argv[1] !== 'down'){
            echo "First argument ($argv[1]) is not 'up' or 'down'... \n";
        }
    }
?>