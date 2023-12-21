<?php

namespace BrainGames\Games\Progression;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;

function getProgressionAndNumber()
{
    $numberCount = rand(5, 10);
    $missingPosition = rand(1, $numberCount);
    $number = rand(1, 50);
    $addingNumber = rand(1, 10);
    $progression = [];
    $progression[] = $number;
    for ($i = 1; $i < $numberCount; $i++) {
        $number = $number + $addingNumber;
        $progression[] = $number;
    }
    $answer = $progression[$missingPosition - 1];
    $progression[$missingPosition - 1] = "..";
    $question = implode(" ", $progression);
    return ["Question" => $question, "Correct" => $answer];
}

function run()
{
    $name = Cli\askForName();
    ["Score" => $gameScore, "Goal" => $gameGoal] = Engine\setGameData();
    line("What number is missing in the progression?");
    do {
        ["Question" => $question, "Correct" => $correctAnswer] = getProgressionAndNumber();
        $ifContinue = Engine\processGame($name, $question, $correctAnswer, $gameScore, $gameGoal);
    } while ($ifContinue);
}
