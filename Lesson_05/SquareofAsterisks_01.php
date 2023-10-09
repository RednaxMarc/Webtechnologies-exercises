<?php
    if (isset($argv[1]) == TRUE AND isset($argv[2]) == FALSE){
        $columns = $argv[1];
        $rows = $argv[1];

        for (isset($argv[1]) == TRUE; $rows > 0; $rows -= 1){
            while ($columns > 0){
                echo "*";
                $columns -= 1;      
            }
            $columns = $argv[1];
            echo "\n";
        }
    }
    else if (isset($argv[1]) == TRUE AND isset($argv[2]) == TRUE){
        $columns = $argv[1];
        $rows = $argv[2];

        for (isset($argv[2]) == TRUE; $rows > 0; $rows -= 1){
            while ($columns > 0){
                echo "*";
                $columns -= 1;      
            }
            $columns = $argv[1];
            echo "\n";
        }
    }    
?>

    
    