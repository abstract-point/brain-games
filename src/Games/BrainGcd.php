<?php

namespace Php\Project\Games\BrainGcd;

use function Php\Project\Engine\runGame;

use function cli\line;
use function cli\prompt;

function calculateGcd($num1, $num2)
{
    if ($num1 !== 0 && $num2 !== 0) {
        return ($num1 % $num2) ? calculateGcd($num2, $num1 % $num2) : $num2;
    }
    return null;
}

function runBrainGcd()
{
    $gameGreeting = 'Find the greatest common divisor of given numbers.';
    $gameData = [];
    $countRightAnswerForWin = 3;
    $counterOfRightAnswer = 0;

    while ($counterOfRightAnswer < $countRightAnswerForWin) {
        $num1 = rand(1, 50);
        $num2 = rand(1, 50);
        $question = "Question: {$num1} {$num2}";
        $rightAnswer = calculateGcd($num1, $num2);
        $gameData[$question] = (string) $rightAnswer;
        $counterOfRightAnswer++;
    }
    runGame($gameGreeting, $gameData);
}

print_r(calculateGcd(7, 29));

