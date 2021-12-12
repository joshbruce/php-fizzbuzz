<?php

declare(strict_types=1);

function func_fizz_buzz(int $high, int $low = 1, string $output = ''): string
{
    return concatenate_string(
        implode(
            new_line_char(),
            array_map(
                'func_answer_for',
                range($low, $high)
            )
        ),
        new_line_char()
    );
}

function new_line_char(): string
{
    return "\n";
}

function concatenate_string(string $prefix, string $suffix): string
{
    return $prefix . $suffix;
}

function func_is_multiple_of(int $multiplier, int $multiplicand): bool
{
    return ($multiplier % $multiplicand === 0);
}

function func_is_multiple_of_three(int $multiplier): bool
{
    return func_is_multiple_of($multiplier, 3);
}

function func_is_multiple_of_five(int $multiplier): bool
{
    return func_is_multiple_of($multiplier, 5);
}

function func_is_multiple_of_three_and_five(int $multiplier): bool
{
    return func_is_multiple_of_three($multiplier) and
        func_is_multiple_of_five($multiplier);
}

function func_answer_for(int $turn): string
{
    return match (true) {
        func_is_multiple_of_three_and_five($turn) => func_fizz_buzz_answer(),
        func_is_multiple_of_five($turn) => func_buzz_answer(),
        func_is_multiple_of_three($turn) => func_fizz_answer(),
        default => func_turn_answer($turn)
    };
}

function func_fizz_answer(): string
{
    return 'Fizz';
}

function func_buzz_answer(): string
{
    return 'Buzz';
}

function func_fizz_buzz_answer(): string
{
    return func_fizz_answer() . func_buzz_answer();
}

function func_turn_answer(int $turn): string
{
    return strval($turn);
}
