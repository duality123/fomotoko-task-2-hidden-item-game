<?php

namespace Components;

class Coordinate
{
    public int $row;
    public int $col;

    public function __construct(int $row, int $col)
    {
        $this->row = $row;
        $this->col = $col;
    }

    public function toString(): string
    {
        return "(" . $this->row . ", " . $this->col . ")";
    }
}
