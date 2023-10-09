<?php
    unset($argv[0]);
    #print_r($argv);
    $count = count($argv);
    echo "$count parameters provided: \n";
    foreach ($argv as $i => $parameter){
        echo "\t Position $i: $parameter \n";
    }
?>  