<?php
    if (count($argv) == 2){
        for ($row = 1; $row <= $argv[1]; $row ++){
            for ($spaces = $argv[1] - $row; $spaces > 0; $spaces --){
                echo " ";
            }
            for ($asterisks = 1; $asterisks <= $row; $asterisks ++){
                echo "*";
            }
            echo "\n";
        }
    }
?>