<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function setGameData()
{
    return ["Score" => 0, "Goal" => 3];
}

function processGame(string $playerName, string $question, string $correctAnswer, int &$gameScore, int $gameGoal)
{
    $ifContinue = true;
    line("Question: %s", $question);
    $answer = prompt("Your answer is ");
    if (strtolower($answer) == $correctAnswer) {
        line("Correct!");
        $gameScore += 1;
        if ($gameScore === $gameGoal) {
            line("Congratulations, %s!", ucfirst($playerName));
            $ifContinue = false;
        }
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
        line("Let's try again, %s!", ucfirst($playerName));
        $ifContinue = false;
    }
    return $ifContinue;
}
