<?php
#The pyramid only has even bases
#Logic for max rows: if the base is 10, max rows are 5, is base is 8, max rows are 4, etc.
#Logic for spaces: if max rows are 5, the 1st row needs 4 spaces, the 2nd row needs 3 spaces, the 3th row needs 2 spaces
#logic for astertisks: row 1 needs 2 asterics, row 2 needs 4 asterics, etc.
    $base = $argv[1];
    $max_row = $base / 2;
    
    for ($row = 1; $row <= $max_row; $row += 1){
        for ($leftspaces = 1; $leftspaces <= $max_row - $row; $leftspaces += 1){
            echo " ";
        }
        for ($asterisks = 1; $asterisks <= $row * 2; $asterisks += 1){
            echo "*";
        }
        #for ($rightspaces = 1; $rightspaces <= $max_row - 1; $rightspaces += 1){
            #echo " ";       
        
    echo "\n";
    }
?>