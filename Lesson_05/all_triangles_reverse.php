<?php
    $base = $argv[1];
    for ($row = 1; $row <= $base; $row += 1){
        for ($asterisk = 1; $asterisk <= ($base - $row) +1; $asterisk += 1){
            echo "*";
        }
        echo "\n";
    }

    for ($row = 1; $row <= $base; $row += 1){
        for ($spaces = 1; $spaces <= $row -1 ; $spaces += 1){
            echo " ";
        }
        for ($asterisks = 1; $asterisks <= ($base - $row) +1; $asterisks += 1){
            echo "*";
        }
        echo "\n";
    }

    $max_row = $base / 2;
    for ($row = 1; $row <= $max_row; $row += 1){
        for ($spaces = 1; $spaces <= $row - 1; $spaces += 1){
            echo " ";
        }
        for ($asterisks = 1; $asterisks <= $base - ($row - 1 ) * 2; $asterisks += 1){
            echo "*";
        }        
    echo "\n";
    }
?>