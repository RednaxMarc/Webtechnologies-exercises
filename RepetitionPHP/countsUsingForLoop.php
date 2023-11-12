<?php
    if (count($argv) == 4){
        if ($argv[1] == 'up'){
            for ($count = $argv[2]; $count <= $argv[3]; $count ++){
                echo "I count $count \n";
            }
        }
        if ($argv[1] == 'down'){
            for ($count = $argv[2]; $count >= $argv[3]; $count --){
                echo "I count $count \n";
            }
        }
        if ($argv[1] != 'up' AND $argv[1] != 'down'){
            echo "First argument ($argv[1]) is not 'up' or 'down'... \n";
        }
    }
?>