<?php
    echo "----------------------------------------------";
    echo "\n";
    echo "DAY 1";
    echo "\n";
    echo "----------------------------------------------";
    echo "\n";

    $input          = file_get_contents(__DIR__ . '/input.txt');

    $solution       = 0;

    $array          = str_split($input);

    $array_length   = count($array);

    foreach($array as $key => $number) {
        if ($array[($key + 1) % $array_length] === $number) {
            $solution += $number;
        }
    }


    echo "PART 1 = SOLUTION : ".$solution;
    echo "\n";
    echo "----------------------------------------------";
    echo "\n";

    $solution       = 0;

    $halfway        = $array_length / 2;

    foreach($array as $key => $number) {
        if ($array[($key + $halfway) % $array_length] === $number) {
            $solution += $number;
        }
    }
    
    echo "PART 2 - SOLUTION : ".$solution;
    echo "\n";
    echo "----------------------------------------------";