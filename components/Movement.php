<?php

namespace Components;

class Movement
{
    public int $up;
    public int $right;
    public int $down;

    public function __construct(
        int $up,
        int $right,
        int $down
    ) {
        $this->up = $up;
        $this->right = $right;
        $this->down = $down;
    }
}
