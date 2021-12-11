<?php

declare(strict_types=1);

function is_multiple_of(int $multiplier, int $multiplicand): bool
{
    return ($multiplier % $multiplicand === 0);
}

function is_multiple_of_three(int $multiplier): bool
{
    return is_multiple_of($multiplier, 3);
}

function is_multiple_of_five(int $multiplier): bool
{
    return is_multiple_of($multiplier, 5);
}

function is_multiple_of_three_and_five(int $multiplier): bool
{
    return is_multiple_of_three($multiplier) and is_multiple_of_five($multiplier);
}

function answer_for(int $turn): string
{
    if (is_multiple_of_three_and_five($turn)) {
        return fizz_buzz_answer();

    } elseif (is_multiple_of_five($turn)) {
        return buzz_answer();

    } elseif (is_multiple_of_three($turn)) {
        return fizz_answer();

    }
    return turn_answer($turn);
}

function fizz_answer(): string
{
    return 'Fizz';
}

function buzz_answer(): string
{
    return 'Buzz';
}

function fizz_buzz_answer(): string
{
    return fizz_answer() . buzz_answer();
}

function turn_answer(int $turn): string
{
    return strval($turn);
}
