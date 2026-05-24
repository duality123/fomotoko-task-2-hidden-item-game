<?php

namespace Components;

class Player
{
    private Coordinate $position;

    public function __construct(Coordinate $start)
    {
        $this->position = $start;
    }

    public function move(
        Movement $movement
    ): Coordinate {

        $row = $this->position->row;
        $col = $this->position->col;

        // up
        $row -= $movement->up;

        // right
        $col += $movement->right;

        // down
        $row += $movement->down;

        return new Coordinate($row, $col);
    }
}
