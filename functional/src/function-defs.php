<?php

declare(strict_types=1);

function func_fizz_buzz(int $high, int $low = 1): string
{
    // Builds and executes the game based on parameters.
    return func_concatenate_string(
        implode(
            func_new_line_char(),
            array_map( // get answer for each element in range
                'func_answer_for', // use this function on each turn
                range($low, $high) // create array of turns
            )
        ),
        func_new_line_char()
    );
}

function func_answer_for(int $turn): string
{
    // Establish rules for game, which could be expanded or modified, if desired.
    return func_answer(
        $turn,
        'func_is_multiple_of_three_and_five',
        'func_fizz_buzz_answer',
        array(
            'func_is_multiple_of_five',
            'func_buzz_answer',
            array(
                'func_is_multiple_of_three',
                'func_fizz_answer',
                array()
            )
        )
    );
}

/**
 * @param array<int, mixed> $next
 */
function func_answer(
    int $turn,
    callable $rule,
    callable $answer,
    array $next = []
): string {
    if ($rule($turn)) {
        return $answer();
    }

    if (func_list_has_three_values($next)) {
        return func_answer($turn, ...$next); // recursion
    }

    return func_turn_answer($turn);
}

function func_new_line_char(): string
{
    return "\n";
}

function func_concatenate_string(string $prefix, string $suffix): string
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

/**
 * @param array<int, mixed> $list
 */
function func_list_has_three_values(array $list): bool
{
    return count($list) === 3;
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
