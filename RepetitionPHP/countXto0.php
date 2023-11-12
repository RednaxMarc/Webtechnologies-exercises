<?php
    if (isset($argv[1]) == TRUE AND count($argv) == 2){
        while ($argv[1] >= 0){
            echo "I count $argv[1] \n";
            $argv[1] --;
        }
    }
?>