<?php

namespace Php\Project\Games\BrainPrime;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\runGame;

function isPrime(int $num): bool
{
    $primeNum = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47];

    return in_array($num, $primeNum) ? true : false;
}

function runBrainPrime()
{
    $gameGreeting = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = [];
    $countRightAnswerForWin = 3;
    $counterOfRightAnswer = 0;

    while ($counterOfRightAnswer < $countRightAnswerForWin) {
        $num = rand(1, 50);
        $question = "Question: {$num}";
        $rightAnswer = isPrime($num) ? 'yes' : 'no';
        $gameData[$question] = $rightAnswer;
        $counterOfRightAnswer++;
    }
    runGame($gameGreeting, $gameData);
}
