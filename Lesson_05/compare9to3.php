<?php
    if ($argv[1] > 3 and $argv[1] < 9){
        echo "This number lays between 3 and 9 \n";
    }
    else if ($argv[1] > 9){
        echo "This number is bigger than 9 (and obviously bigger then 3) \n";
    }
    else if ($argv[1] < 3){
        echo "This number is smaller then 3 \n";
    }   
    else if ($argv[1] == 3){
        echo "This number is equal to 3 \n";
    }
    else if ($argv[1] == 9){
        echo "This number is equal to 9 \n";
    }

    if ($argv[1]%3 == 0 and $argv[1]%9 == 0){
        echo "This number is devisable by 3 and 9 \n";
    }
    else if ($argv[1]%3 == 0){
        echo "this number is devisable by 3 \n";
    }
    else if ($argv[1]%9 == 0){
        echo "this number is devisable by 9 \n";
    }
?>