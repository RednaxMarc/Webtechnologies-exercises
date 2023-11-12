<?php
    # Creating the array's
    ## Standard input array
    $inputArray = str_split($argv[1]);
    ## Occurencies array
    $occurencesInput = array_count_values($inputArray);

    # Printing the stats
    $totalChars = count($occurencesInput);
    echo "STATS: \n";
    foreach ($occurencesInput as $char => $times){
        $prev = $times/$totalChars * 100;
        print($char . ": " . $times . " occurences -> " . $prev . "\n");
    }

    ## Occurencies array sorted by frequence
    asort($occurencesInput);
    #print_r($occurencesInput);
    echo "\nOrder by frequency: \n";
    foreach ($occurencesInput as $char => $times){
        $prev = $times/$totalChars * 100;
        print($char . ": " . $times . " occurences -> " . $prev . "\n");
    }

    ## Occurencies array sorted by character
    ksort($occurencesInput);
    #print_r($occurencesInput);
    echo "\nOrder by character: \n";
    foreach ($occurencesInput as $char => $times){
        $prev = $times/$totalChars * 100;
        print($char . ": " . $times . " occurences -> " . $prev . "\n");
    }
?>