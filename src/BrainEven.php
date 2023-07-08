<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

function runBrainEven()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $rightAnswerForWin = 3;
    $counterOfRightAnswer = 0;

    while ($counterOfRightAnswer < $rightAnswerForWin) {
        $randomNum = rand(1, 100);
        $question = line('Question: %s', $randomNum);
        $answer = prompt($question);

        if ($answer !== 'yes' && $answer !== 'no') {
            line('%s is wrong answer ;(. Correct answer was "yes" or "no".' . PHP_EOL . 'Let`s try again, %s', $answer, $name);
            break;
        }

        line('Yor answer: %s', $answer);
    
        if ($randomNum % 2 === 0 && $answer === 'yes') {
            line('Correct!');
            $counterOfRightAnswer++;
        } elseif ($randomNum % 2 === 0 && $answer === 'no') {
            line('"no" is wrong answer ;(. Correct answer was "yes".' . PHP_EOL . 'Let`s try again, %s', $name);
            break;
        } elseif ($randomNum % 2 !== 0 && $answer === 'no') {
            line('Correct!');
            $counterOfRightAnswer++;
        } elseif ($randomNum % 2 !== 0 && $answer === 'yes') {
            line('"yes" is wrong answer ;(. Correct answer was "no".' . PHP_EOL . 'Let`s try again, %s', $name);
            break;
        }

        if ($counterOfRightAnswer === $rightAnswerForWin) {
            line('Congratulations, %s!', $name);
        } 
    }

}



