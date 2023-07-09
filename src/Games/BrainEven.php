<?php

namespace Php\Project\Games\BrainEven;

use function cli\line;
use function cli\prompt;

use function Php\Project\Engine\runGame;

function isEven($num)
{
    return $num % 2 === 0;
}

function runBrainEven()
{
    $gameGreeting = 'Answer "yes" if the number is even, otherwise answer "no".';
    $countRightAnswerForWin = 3;
    $counterOfRightAnswer = 0;
    $gameData = [];

    while ($counterOfRightAnswer < $countRightAnswerForWin) {
        $randomNum = rand(1, 100);
        $question = 'Question: ' . $randomNum;
        $rightAnswer = isEven($randomNum) ? 'yes' : 'no';
        $gameData[$question] = $rightAnswer;
        $counterOfRightAnswer++;
    }

    runGame($gameGreeting, $gameData);
}
