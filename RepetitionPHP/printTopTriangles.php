<?php
    if (isset($argv[1]) == TRUE){
        for ($row = $argv[1]; $row > 0; $row --){
            for ($asterisks = 1; $asterisks <= $row; $asterisks ++){
                echo "*";
            }
            echo "\n";
        }
    }
    if (isset($argv[1]) == TRUE){
        for ($row = $argv[1]; $row > 0; $row --){
            for ($spaces = 1; $spaces <= $argv[1] - $row; $spaces ++){
                echo " ";
            }
            for ($asterisks = 1; $asterisks <= $row; $asterisks ++){
                echo "*";
            }
            echo "\n";
        }
    }
    if (isset($argv[1]) == TRUE){
        if ($argv[1]%2 == 0){ # Even arguments
            $maxRows = $argv[1] / 2; # Max rows is the base ($argv[1]) devided by 2
            for ($row = $maxRows; $row > 0; $row --){
                for ($spaces = 1; $spaces <= $maxRows - $row; $spaces ++){ # Spaces per row are max rows minus the row number
                    echo " ";
                }
                for ($asterisks = 1; $asterisks <= $row * 2; $asterisks ++){ # Asterisks per row are the rownumber times 2
                    echo "*";
                }
                echo "\n";
            }
        }
        if ($argv[1]%2 != 0){ # Uneven arguments
            $maxRows = ($argv[1] + 1) / 2; # Max rows is the base ($argv[1]) devided by 2, plus 1 (because uneven base)
            for ($row = $maxRows; $row > 0; $row --){
                for ($spaces = 1; $spaces <= $maxRows - $row; $spaces ++){ # Spaces per row are max rows minus the row number
                    echo " ";
                }
                for ($asterisks = 1; $asterisks <= ($row * 2) -1; $asterisks ++){ # Asterisks per row are the rownumber times 2, minus 1 (because of uneven base)
                    echo "*";
                }
                echo "\n";
            }
        }
    }
?>