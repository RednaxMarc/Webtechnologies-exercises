<?php
    #print_r($argv);
    if (isset($argv[1]) == FALSE){
        echo "Not suffucient arguments...";
    }
    if ($argv[1] < 3){
        echo "This child is too young for this Lego build \n";
    }
    else{
        echo "Have fun! \n";
    }
?>