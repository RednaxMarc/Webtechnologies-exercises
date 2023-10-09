<?php
    $base = $argv[1] ?? 10;
    for ($row = 1; $row <= $base; $row += 1){
        for ($spaces = 1; $spaces <= $base - $row ; $spaces += 1){
            echo " ";
        }
        for ($asterisks = 1; $asterisks <= $row; $asterisks += 1){
            echo "*";
        }
        echo "\n";
    }
?>