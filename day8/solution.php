<?php
    require __DIR__ . '/../constants.php';

    echo PHP_LINE;
    echo "DAY 8".PHP_EOL;
    echo PHP_LINE;

    $input              = file_get_contents(__DIR__ . '/input.txt');

    $lines              = explode("\n", $input);

    $register             = [];

    $max = 0;

    foreach($lines as $key => $line) {
        $matches = [];

        if (preg_match("/([a-z]+) (inc|dec) (-?\d+) if ([a-z]+) (<|<=|>=|>|==|!=) (-?\d+)/i", $line, $matches)) {
            if (!isset($register[$matches[1]])) {
                $register[$matches[1]] = 0;
            }

            if (!isset($register[$matches[4]])) {
                $register[$matches[4]] = 0;
            }

            switch ($matches[5]) {
                case '<' :
                    $do = ((int) $register[$matches[4]] < (int) $matches[6]);
                    break;

                case '>' :
                    $do = ((int) $register[$matches[4]] > (int) $matches[6]);
                    break;

                case '>=' :
                    $do = ((int) $register[$matches[4]] >= (int) $matches[6]);
                    break;

                case '<=' :
                    $do = ((int) $register[$matches[4]] <= (int) $matches[6]);
                    break;

                case '!=' :
                    $do = ((int) $register[$matches[4]] != (int) $matches[6]);
                    break;

                default :
                    $do = ((int) $register[$matches[4]] == (int) $matches[6]);
                    break;
            }

            if ($do) {
                switch ($matches[2]) {
                    case 'dec' : {
                        $register[$matches[1]] -= (int) $matches[3];
                        break;
                    }
                    default : {
                        $register[$matches[1]] += (int) $matches[3];
                        break;
                    }
                }

                if ($register[$matches[1]] > $max) {
                    $max = $register[$matches[1]];
                }
            }
        }
    }

    echo "PART 1 - ANSWER : ".max($register).PHP_EOL;
    echo PHP_LINE;

    echo "PART 2 - ANSWER : ".$max.PHP_EOL;
    echo PHP_LINE;