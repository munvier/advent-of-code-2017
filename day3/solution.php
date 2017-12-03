<?php
    require __DIR__ . '/../constants.php';
    
    echo PHP_LINE;
    echo "DAY 3".PHP_EOL;
    echo PHP_LINE;

    define('DOWN', 0);
    define('RIGHT', 1);
    define('UP', 2);
    define('LEFT', 3);

    $dimension = $size = file_get_contents(__DIR__ . '/input.txt');

    $number = 1;

    $direction = RIGHT;

    $distance_left_to_run_in_that_direction = $distance = 1;

    $x = $y = round($size / 2);

    $numbers_coordinates = [];

    for ($count = 0; $count < $dimension; $count++) {
        $spiral[$x][$y] = $number;

        $numbers_coordinates[$number] = $x . "-" . $y;

        switch ($direction) {
            case LEFT: {
                $y--;
                break;
            }
            case UP: {
                $x++;
                break;
            }
            case DOWN: {
                $x--;
                break;
            }
            case RIGHT: {
                $y++;
                break;
            }
        }

        if (--$distance_left_to_run_in_that_direction == 0) {
            switch ($direction) {
                case DOWN: {
                    $direction = LEFT;
                    $distance++;
                    break;
                }

                case UP: {
                    $distance++;
                }

                default: {
                    $direction--;
                    break;
                }
            }

            $distance_left_to_run_in_that_direction = $distance;
        }

        $number++;
    }

    list($a_x, $a_y) = explode("-", $numbers_coordinates[1]);
    list($b_x, $b_y) = explode("-", $numbers_coordinates[$size]);

    $answer = (abs($a_x - $b_x) + abs($a_y - $b_y));

    echo "PART 1 - ANSWER : ".$answer.PHP_EOL;
    echo PHP_LINE;

    $distance_left_to_run_in_that_direction = $distance = 1;

    $y = $x = round($size / 2);

    $spiral = [];

    for ($count = 0; $count < $dimension; $count++) {
        $computed_number = 0;

        for ($temp_x = $x - 1; $temp_x <= $x + 1; $temp_x++) {
            for ($temp_y = $y - 1; $temp_y <= $y + 1; $temp_y++) {
                if (isset($spiral[$temp_x][$temp_y])) {
                    $computed_number += $spiral[$temp_x][$temp_y];
                }
            }
        }

        $spiral[$x][$y] = $computed_number ?: 1;

        if ($computed_number > $size) {
            break;
        }

        switch ($direction) {
            case LEFT: {
                $y--;
                break;
            }
            case UP: {
                $x++;
                break;
            }
            case DOWN: {
                $x--;
                break;
            }
            case RIGHT: {
                $y++;
                break;
            }
        }

        if (--$distance_left_to_run_in_that_direction == 0) {
            switch ($direction) {
                case DOWN: {
                    $direction = LEFT;
                    $distance++;
                    break;
                }
                
                case UP: {
                    $distance++;
                }

                default: {
                    $direction--;
                    break;
                }
            }

            $distance_left_to_run_in_that_direction = $distance;
        }

        $number++;
    }

    echo "PART 2 - ANSWER : ".$computed_number.PHP_EOL;
    echo PHP_LINE;