<?php

namespace Php\Project\Games\BrainProgression;

use function Php\Project\Engine\runGame;
use function cli\line;
use function cli\prompt;

function makeProgression()
{
    $progression = [];
    $progressionStart = rand(1, 20);
    $progressionStep = rand(2, 6);
    $lengtProgression = 10;
    $i = 1;

    while ($i < $lengtProgression) {
        $progression[$i] = $progressionStart + $progressionStep * $i;
        $i++;
    }
    return $progression;
}

function runBrainProgression()
{
    $gameGreeting = 'What number is missing in the progression?';
    $gameData = [];
    $countRightAnswerForWin = 3;
    $counterOfRightAnswer = 0;

    while ($counterOfRightAnswer < $countRightAnswerForWin) {
        $progressionArray = makeProgression();
        $indexMissingNum = rand(3, 9);
        $rightAnswer = (string) $progressionArray[$indexMissingNum];
        $progressionArray[$indexMissingNum] = '..';
        $progressionString = implode(' ', $progressionArray);
        $question = "Question: {$progressionString}";
        $gameData[$question] = $rightAnswer;
        $counterOfRightAnswer++;
    }
    runGame($gameGreeting, $gameData);
}
