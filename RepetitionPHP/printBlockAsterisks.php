<?php
    if (count($argv) == 2 OR count($argv) == 3){
        $columns = $argv[1];
        if (isset($argv[2]) == TRUE){
            $rows = $argv[2];
        }
        elseif (isset($argv[2]) == FALSE){
            $rows = $argv[1];
        }
        
        for (isset($rows) == TRUE; $rows > 0; $rows --){
            for (isset($columns) == TRUE; $columns > 0; $columns --){
                echo "*";
            }
            $columns = $argv[1];
            echo "\n";
        }
    }
?>