<?php
    $count = $argv[1];
    while($count >= 0){
        print ($count);
        echo "\n";
        
        if ($count == 0){
            echo "TAKE - OFF! \n";
        }
        
        $count -=1;
    } 
?>