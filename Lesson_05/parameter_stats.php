<?php
    #unset($argv[0]);
    array_shift($argv);
    #print_r($argv);
    echo "The numbers received: \n";
    foreach ($argv as $i => $number){
        echo "\t Number $i: $number \n";
    }
    echo "\n"; 
    
    $smallest = min($argv);
    echo "Smallest number: $smallest \n";
    
    $sum = array_sum($argv);
    $total = count($argv);
    $average = $sum/$total;
    echo "Average: $average \n";

    $biggest = max($argv);
    echo "Largest number: $biggest \n";
    
    echo "Number of numbers: $total \n";

    $occurences = array_count_values($argv);
    #print_r($occurences);
    echo "Number of occurences: \n";
    foreach ($occurences as $number => $times){
        echo "\t $number -> $times \n";
    }
    
    echo "The numbers in reverse order: \n";
    $reverse = array_reverse($argv);
    for ($i = $total -1; $i >= 0; $i -= 1){
        echo "number $i: $argv[$i] \n";
    }

    echo "The numbers from smallest to largest: \n";
    sort($argv);
    foreach ($argv as $i){
        echo "$i \n";
    }

  
    
    

    
 
?>