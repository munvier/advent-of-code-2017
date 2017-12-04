<?php
    define('PHP_LINE', '------------------------'.PHP_EOL);

    echo PHP_LINE;
    echo "DAY 3".PHP_EOL;
    echo PHP_LINE;

    define('DOWN', 0);
    define('RIGHT', 1);
    define('UP', 2);
    define('LEFT', 3);

    $input      = file_get_contents(__DIR__ . '/input.txt');

    $lines      = explode("\n", $input);
    $answer     = 0;

    foreach($lines as $line) {
        $words = explode(' ', $line);

        $unique_words = array_unique($words);

        if (count($unique_words) === count($words)) {
            $answer++;
        }
    }

    echo "PART 1 - ANSWER : ".$answer.PHP_EOL;
    echo PHP_LINE;

    $answer     = 0;

    foreach($lines as $line) {
        $words = explode(' ', $line);

        $sorted_words = array_map(function($word) {
            $temp_array = str_split($word);

            sort($temp_array);

            return implode($temp_array);
        }, $words);

        $unique_sorted_words = array_unique($sorted_words);

        if (count($unique_sorted_words) === count($words)) {
            $answer++;
        }
    }

    echo "PART 2 - ANSWER : ".$answer.PHP_EOL;
    echo PHP_LINE;