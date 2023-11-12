<?php
    if (count($argv) == 2){
        for ($rows = 1; $rows <= $argv[1]; $rows ++){
            for ($column = 1; $column <= $rows; $column ++){
                echo "*";
            }
            echo "\n";
        }
    }
?>