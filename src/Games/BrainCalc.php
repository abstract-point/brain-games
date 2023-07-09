<?php

namespace Php\Project\Games\BrainCalc;

use function cli\line;
use function cli\prompt;

use function Php\Project\Engine\runGame;

function runBrainCalc()
{
    $gameGreeting = 'What is the result of the expression?';
    $calcOperations = ["+", "-", "*"];
    $gameData = [];
    $countRightAnswerForWin = 3;
    $counterOfRightAnswer = 0;

    while ($counterOfRightAnswer < $countRightAnswerForWin) {
        $firstNum = rand(1, 10);
        $secondNum = rand(1, 15);
        $calcOperation = $calcOperations[rand(0, 2)];
        $question = "Question: {$firstNum} {$calcOperation} {$secondNum}";

        switch ($calcOperation) {
            case "+":
                $rightAnswer = $firstNum + $secondNum;
                break;
            case "-":
                $rightAnswer = $firstNum - $secondNum;
                break;
            case "*":
                $rightAnswer = $firstNum * $secondNum;
                break;
        }
        
        $gameData[$question] = (string) $rightAnswer;
        $counterOfRightAnswer++;
    }

    runGame($gameGreeting, $gameData);
}
