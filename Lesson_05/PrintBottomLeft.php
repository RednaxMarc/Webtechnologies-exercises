<?php
    $base = $argv[1];
    for ($row = 1; $row <= $base; $row += 1){
        for ($asterisk = 1; $asterisk <= $row; $asterisk += 1){
            echo "*";
        }
        echo "\n";
    }
?>