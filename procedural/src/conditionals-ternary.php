<?php

declare(strict_types=1);

// Uses guard clauses and forced continuation.
for ($i = 1; $i <= 15; $i++) {
    echo ($i % 15 === 0 ? 'FizzBuzz'
        : ($i % 5 === 0
            ? 'Buzz'
            : ($i % 3 === 0
                ? 'Fizz'
                : strval($i)
            )
        )
    );

    echo "\n";
}
