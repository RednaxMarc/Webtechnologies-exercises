<?php
    unset($argv[0]);
    print_r($argv);
    foreach ($argv as $key => $value){
        echo "Position $key: $value \n";
    }
?>