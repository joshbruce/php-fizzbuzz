<?php

declare(strict_types=1);

// Uses guard clauses and forced continuation.
for ($i = 0; $i <= 15; $i++) {
    if ($i % 15 === 0) {
        echo 'FizzBuzz' . "\n";
        continue;

    } elseif ($i % 5 === 0) {
        echo 'Buzz' . "\n";
        continue;

    } elseif ($i % 3 === 0) {
        echo 'Fizz' . "\n";
        continue;

    }
    echo strval($i) . "\n";
}
