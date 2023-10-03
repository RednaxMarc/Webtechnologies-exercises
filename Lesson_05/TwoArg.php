<?php
    print_r($argv);
    if (isset($argv[1])){
        echo $argv[1] + $argv[2];
    }
    else{
        echo "there is no number provided on the commandline \n";
    }
    
    #print_r($argv);
    #echo $argv[1]+$argv[2];
?>