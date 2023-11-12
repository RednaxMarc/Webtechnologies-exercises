<?php
    if (isset($argv[1]) == TRUE AND count($argv)==2){
        if ($argv[1]<=3){
            echo "This child is too young to play this lego set \n";
        }
        else{
            echo "Go play, have fun! \n";
        }
    }
    else{
        echo "Please, provide a minimum and maximum of 1 age on the command line \n";
    }
    # print_r($argv);
?>