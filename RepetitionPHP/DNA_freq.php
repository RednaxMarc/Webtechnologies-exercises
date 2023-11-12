<?php
    $inputDNA = $argv[1];
    $inputDNA = str_split($inputDNA);
    #print_r($inputDNA);
    $occurencesNT = array_count_values($inputDNA);
    #print_r($occurencesNT);
    $countNT = count($inputDNA);

    echo "input: $argv[1] \n\n";

    echo "STATS: \n";
    print("\t A:" . $occurencesNT['A'] . "nts ->" . $occurencesNT['A']/$countNT * 100 . "%\n");
    print("\t T:" . $occurencesNT['T'] . "nts ->" . $occurencesNT['T']/$countNT * 100 . "%\n");
    print("\t G:" . $occurencesNT['G'] . "nts ->" . $occurencesNT['G']/$countNT * 100 . "%\n");
    print("\t C:" . $occurencesNT['C'] . "nts ->" . $occurencesNT['C']/$countNT * 100 . "%\n");

    echo "\n";

    echo "GRAPH:";
        echo "\t A: ";
        for ($i = 1; $i <= $occurencesNT['A']; $i ++){
            echo "=";
        } echo "\n";
        echo "\t A: ";
        for ($i = 1; $i <= $occurencesNT['T']; $i ++){
            echo "=";
        } echo "\n";
        echo "\t A: ";
        for ($i = 1; $i <= $occurencesNT['G']; $i ++){
            echo "=";
        } echo "\n";
        echo "\t A: ";
        for ($i = 1; $i <= $occurencesNT['C']; $i ++){
            echo "=";
        } echo "\n\n";
?>