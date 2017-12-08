<?php
    require __DIR__ . '/../constants.php';

    echo PHP_LINE;
    echo "DAY 5".PHP_EOL;
    echo PHP_LINE;

    $input      = file_get_contents(__DIR__ . '/input.txt');

    $numbers    = explode("\n", $input);

    array_walk($numbers, function(&$number) {
        $number = (int) $number;
    });

    $cpt    = 0;
    $steps  = 0;

    while (true) {
        $steps++;

        $current_instruction = $numbers[$cpt];

        $numbers[$cpt] = $current_instruction + 1;

        $cpt += $current_instruction;

        if (!isset($numbers[$cpt])) {
            break;
        }
    }

    echo "PART 1 - ANSWER : ".$steps.PHP_EOL;
    echo PHP_LINE;

    $numbers    = explode("\n", $input);

    array_walk($numbers, function(&$number) {
        $number = (int) $number;
    });

    $cpt    = 0;
    $steps  = 0;

    while (true) {
        $steps++;

        $current_instruction = $numbers[$cpt];


        if ($current_instruction >= 3) {
            $numbers[$cpt] = $current_instruction - 1;
        } else {
            $numbers[$cpt] = $current_instruction + 1;
        }

        $cpt += $current_instruction;

        if (!isset($numbers[$cpt])) {
            break;
        }
    }

    echo "PART 2 - ANSWER : ".$steps.PHP_EOL;
    echo PHP_LINE;