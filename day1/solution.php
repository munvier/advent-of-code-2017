<?php
    echo "DAY 1 - PART 1";
    echo "\n";

    $input          = file_get_contents('input.txt');

    $solution       = 0;

    $array          = str_split($input);

    $array_length   = count($array);

    foreach($array as $key => $number) {
        if ($key !== $array_length - 1) {
            if ($array[$key + 1] === $number) {
                $solution += $number;
            }
        } else {
            if ($array[0] === $number) {
                $solution += $number;
            }
        }
    }


    echo "SOLUTION : ".$solution;
    echo "\n";

    echo "DAY 1 - PART 2";
    echo "\n";

    $solution       = 0;

    $halfway        = $array_length / 2;

    foreach($array as $key => $number) {
        if ($array[($key + $halfway) % $array_length] === $number) {
            $solution += $number;
        }
    }
    
    echo "SOLUTION : ".$solution;