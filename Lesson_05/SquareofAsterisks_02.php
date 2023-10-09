<?php
    for ($row = 1; $row >= $argv[1]; $row += 1){
        for ($asterisk = $argv[2]; $asterisk != 0; $asterisk -= 1){
            echo "*";
        }
        $asterisk = $argv[1];
        echo "\n";
    }
?>