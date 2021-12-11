<?php

declare(strict_types=1);

// Uses guard clauses and forced continuation.
for ($i = 1; $i <= 15; $i++) {
    switch ($i) {
        case ($i % 15 === 0):
            echo 'FizzBuzz' . "\n";
            break;

        case ($i % 5 === 0):
            echo 'Buzz' . "\n";
            break;

        case ($i % 3 === 0):
            echo 'Fizz' . "\n";
            break;

        default:
            echo strval($i) . "\n";

    }
}
