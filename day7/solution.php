<?php
    require __DIR__ . '/../constants.php';

    echo PHP_LINE;
    echo "DAY 7".PHP_EOL;
    echo PHP_LINE;

    $input              = file_get_contents(__DIR__ . '/input.txt');

    $lines              = explode("\n", $input);

    $programs           = [];
    $programs_supported = [];

    foreach($lines as $line) {
        $matches = [];

        if (preg_match("/([a-z]+) \(([\d]+)\)( -> ){0,}([a-z, ]+){0,}/i", $line, $matches)) {
            $programs[$matches[1]] = isset($matches[4]) ? $matches[4] : null;

            if (isset($matches[4])) {
                $programs_supported = array_merge($programs_supported, explode(', ', $matches[4]));
            }
        }
    }

    $programs_supported = array_unique($programs_supported);

    $support_programs = array_filter($programs, function($program){
        return !empty($program);
    });

    $support_programs_names = array_keys($support_programs);

    $first_support_program = array_diff($support_programs_names, $programs_supported);

    echo "PART 1 - ANSWER : ".array_pop($first_support_program).PHP_EOL;
    echo PHP_LINE;