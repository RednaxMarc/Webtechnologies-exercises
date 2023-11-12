<?php
    if (count($argv) == 2){
        for (isset($argv[1]) == TRUE; $argv[1] > 0;$argv[1] --){
            echo "*";
        }
        echo "\n";
    }
    else{
        echo "Too much/Too little arguments provided... \n";
    }
?>