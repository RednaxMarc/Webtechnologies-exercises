<?php
    if (isset($argv[1]) == TRUE AND count($argv) == 2){
        $limit = $argv[1];
        $argv[1] = 0;
        while ($argv[1] <= $limit){
            echo "I count $argv[1] \n";
            # $argv[1] ++;
            $argv[1] += 3;
        }
    }
?>