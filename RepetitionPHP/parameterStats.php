<?php
    unset($argv[0]);
    #print_r($argv);
    print ("The numbers recieved: " . count($argv) . "\n");
    foreach($argv as $key => $value){
        echo "Number $key: $value \n";
    }
    
    echo "\n";

    print("Smallest number: " . min($argv) . "\n");
    
    $count = count($argv);
    $sum = array_sum($argv);
    $avg = $sum/$count;
    echo "Avg: $avg \n";
    
    print("Largest number: " . max($argv) . "\n");
    
    $occurences = array_count_values($argv);
    #print_r($occurences);
    echo "Number of occurences: \n";
    foreach ($occurences as $key => $value){
        echo "$key -> $value \n";
    }

    echo "\n";

    $reversedArgv = array_combine(array_keys($argv), array_reverse(array_values($argv)));
    #print_r($reversedArgv);
    echo "The numbers in revers order: \n";
    foreach ($reversedArgv as $key => $value){
        echo "Number $key: $value \n";
    }

    echo "\n";

    $sortedArgv = $argv;
    sort($sortedArgv);
    unset($sortedArgv[0]);
    echo "The numbers from smallest to largest: \n";
    foreach ($sortedArgv as $value){
        echo "$value \n";
    }
?>