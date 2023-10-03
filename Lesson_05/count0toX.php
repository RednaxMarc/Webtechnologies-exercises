<?php
    $count = $argv[1];
    while($count >= 0){
        print ($argv[1] - $count);
        echo "\n";
        $count -=1;
    }
?>