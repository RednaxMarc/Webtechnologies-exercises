<?php
    print_r($argv);
    if (isset($argv[1]) and isset($argv[2])){
        echo $argv[1] + $argv[2];
    }
    else{
        echo "there is not enough numbers provided on the commandline \n";
    }
    
    #print_r($argv);
    #echo $argv[1]+$argv[2];
?>