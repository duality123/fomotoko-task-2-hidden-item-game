<?php

namespace Components;

use Exception;

class Grid
{
    private array $grid;

    public function __construct(array $grid)
    {
        $this->grid = $grid;
    }

    public function getPlayerPosition(): Coordinate
    {
        foreach ($this->grid as $row => $line) {

            $col = strpos($line, 'X');

            if ($col !== false) {
                return new Coordinate($row, $col);
            }
        }

        throw new Exception("Player not found");
    }

    public function isValid(Coordinate $coordinate): bool
    {
        if (
            !isset(
                $this->grid[$coordinate->row][$coordinate->col]
            )
        ) {
            return false;
        }

        return $this->grid[$coordinate->row][$coordinate->col] !== '#';
    }

    public function markLocation(
        Coordinate $coordinate
    ): array {

        $newGrid = $this->grid;

        $line = $newGrid[$coordinate->row];

        $line[$coordinate->col] = '$';

        $newGrid[$coordinate->row] = $line;

        return $newGrid;
    }

    public function display(array $grid): void
    {
        foreach ($grid as $line) {
            echo $line . PHP_EOL;
        }
    }
}

