<?php
    print_r($argv);
    if (isset($argv[1]) == TRUE AND isset($argv[2])){
        print("The sum is " . $argv[1]+$argv[2] . "\n");
    }
    else{
        echo "There are not enough arguments \n";
    }
?> 