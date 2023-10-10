<?php
    $array = str_split($argv[1]);

    echo "input: $argv[1] \n\n";

    $total = count($array);
    $occurences = array_count_values($array);
    echo "STATS\n";
    foreach ($occurences as $character => $times){
        $prev = $times/$total *100;
        echo "$character: $times occurences -> $prev %\n";
    }
    echo "\n";

    echo "Order by frequency: \n";
    asort($occurences);
    foreach ($occurences as $character => $times){
        $prev = $times/$total *100;
        echo "$character: $times occurences -> $prev %\n";
    }
    echo "\n";

    echo "Order by character: \n";
    ksort($occurences);
    foreach ($occurences as $character => $times){
        $prev = $times/$total *100;
        echo "$character: $times occurences -> $prev %\n";
    }
?>