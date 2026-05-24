<?php

namespace Components;

class Game
{
    private Grid $grid;
    private Movement $movement;

    public function __construct(
        Grid $grid,
        Movement $movement
    ) {
        $this->grid = $grid;
        $this->movement = $movement;
    }

    public function start(): void
    {
        echo "=== Hidden Item Game ===\n\n";

        $start = $this->grid->getPlayerPosition();

        $player = new Player($start);

        $result = $player->move($this->movement);

        if ($this->grid->isValid($result)) {

            echo "Possible Item Location:\n";
            echo $result->toString() . PHP_EOL;

            echo "\nGrid Result:\n";

            $markedGrid = $this->grid->markLocation($result);

            $this->grid->display($markedGrid);

            file_put_contents(
                __DIR__ . '/../output/result.txt',
                "Possible Location: "
                . $result->toString()
            );

        } else {

            echo "No valid location found.\n";
        }
    }
}
