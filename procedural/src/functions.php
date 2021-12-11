<?php

declare(strict_types=1);

require_once(__DIR__ . '/function-definitions.php');

// Uses guard clauses and forced continuation.
for ($i = 1; $i <= 15; $i++) {
    echo answer_for($i) . "\n";
}
