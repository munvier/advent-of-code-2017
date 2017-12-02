<?php
    echo "----------------------------------------------";
    echo "\n";
    echo "DAY 2";
    echo "\n";
    echo "----------------------------------------------";
    echo "\n";

    $input          = file_get_contents(__DIR__ . '/input.txt');

    $lines          = explode("\n", $input);
    
    $checksum       = 0;
    
    foreach($lines as $line) {
        $numbers    = explode("\t", $line);
        
        $min        = min($numbers);
        $max        = max($numbers);
        
        $checksum   += $max - $min;
    }

    echo "PART 1 - CHECKSUM : ".$checksum;
    echo "\n";
    echo "----------------------------------------------";
    echo "\n";
    
    $checksum       = 0;
    
    foreach($lines as $line) {
        $numbers    = explode("\t", $line);
        
        foreach($numbers as $key_a => $number_a) {
            foreach($numbers as $key_b => $number_b) {
                if ($key_a === $key_b) continue;
                
                if ($number_a % $number_b === 0) {
                    $checksum += $number_a / $number_b;
                    break 2;
                } else if ($number_b % $number_a === 0) {
                    $checksum += $number_b / $number_a;
                    break 2;
                }
            }
        }
    }
    
    echo "PART 2 - CHECKSUM : ".$checksum;
    echo "\n";
    echo "----------------------------------------------";
    