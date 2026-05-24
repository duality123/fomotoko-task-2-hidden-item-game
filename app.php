<?php

$config = require __DIR__ . '/assets/Map.php';

$grid = $config['grid'];

$playerRow = 4;
$playerCol = 1;

/*
The Item is randomly generated,
it cant spawn in the wall nor in the player pos
*/

do {

    $itemRow = rand(0, count($grid) - 1);
    $itemCol = rand(0, strlen($grid[0]) - 1);

} while (
    $grid[$itemRow][$itemCol] === '#' ||
    ($itemRow == $playerRow && $itemCol == $playerCol)
);

while (true) {

    // clear console for update each move
    system(PHP_OS_FAMILY === 'Windows' ? 'cls' : 'clear');

    echo "=== Hidden Item Game ===\n\n";

    /*
         display grid
    */

    foreach ($grid as $r => $line) {

        for ($c = 0; $c < strlen($line); $c++) {

            if ($r == $playerRow && $c == $playerCol) {

                echo 'X';

            } else {

                echo $line[$c];
            }
        }

        echo PHP_EOL;
    }

    echo PHP_EOL;
    echo "W = UP\n";
    echo "S = DOWN\n";
    echo "A = LEFT\n";
    echo "D = RIGHT\n";
    echo "Q = QUIT\n\n";

    echo "Input move: ";

    $input = strtolower(trim(fgets(STDIN)));

    $newRow = $playerRow;
    $newCol = $playerCol;

    /*
    Movement
    */

    switch ($input) {

        case 'w':
            $newRow--;
            break;

        case 's':
            $newRow++;
            break;

        case 'a':
            $newCol--;
            break;

        case 'd':
            $newCol++;
            break;

        case 'q':
            exit("Game exited.\n");

        default:
            continue;
    }

    /*
        boundary check
    */

    if (
        !isset($grid[$newRow]) ||
        !isset($grid[$newRow][$newCol])
    ) {
        continue;
    }

    /*
  obstacle ( #) check
    */

    if ($grid[$newRow][$newCol] !== '#') {

        $playerRow = $newRow;
        $playerCol = $newCol;
    }

    /*
    Item found 
    */

    if (
        $playerRow == $itemRow &&
        $playerCol == $itemCol
    ) {

        system(PHP_OS_FAMILY === 'Windows' ? 'cls' : 'clear');

        echo "=== ITEM FOUND! ===\n\n";

        foreach ($grid as $r => $line) {

            for ($c = 0; $c < strlen($line); $c++) {

                if ($r == $playerRow && $c == $playerCol) {

                    echo '$';

                } else {

                    echo $line[$c];
                }
            }

            echo PHP_EOL;
        }

        echo PHP_EOL;
        echo "Congratulations!\n";

        break;
    }
}