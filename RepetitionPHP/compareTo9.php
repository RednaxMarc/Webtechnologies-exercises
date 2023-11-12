<?php
    if (isset($argv[1]) == TRUE AND count($argv) == 2){
        if ($argv[1] == 9){
            echo "This number is equal to 9 \n";
        }
        elseif ($argv[1] < 9){
            echo "This number is less then 9 \n";
        }
        elseif ($argv[1] > 9){
            echo "This number is more then 9 \n";
        }
        if (($argv[1] % 9) == 0){
            echo "This number is devisable by 9 \n";
        }
    }
?>