<?php
    unset($argv[0]);
    #print_r($argv);
    echo "The number received: \n";
    foreach ($argv as $i => $value){
        echo "\t Number $i: $value \n";
    } 
    
    $count = count($argv);
 
?>