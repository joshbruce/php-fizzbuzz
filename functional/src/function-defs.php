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
    return func_answer(
        $turn,
        'func_is_multiple_of_three_and_five',
        'func_fizz_buzz_answer',
        [
            'func_is_multiple_of_five',
            'func_buzz_answer',
            [
                'func_is_multiple_of_three',
                'func_fizz_answer'
            ]
        ]
    );
}

/**
 * @param array<int, mixed> $next
 */
function func_answer(
    int $turn,
    string $rule,
    string $answer,
    array $next = []
): string {
    if (
        is_callable($rule) and // to pass static analysis
        $rule($turn) and
        is_callable($answer) // to pass static analysis
    ) {
        return $answer();

    } elseif (func_list_has_three_values($next)) {
        return func_answer($turn, $next[0], $next[1], $next[2]);

    } elseif (func_list_has_two_values($next)) {
        return func_answer($turn, $next[0], $next[1]);

    }
    return func_turn_answer($turn);
}

/**
 * @param array<int, mixed> $list
 */
function func_list_has_three_values(array $list): bool
{
    return count($list) === 3;
}

/**
 * @param array<int, mixed> $list
 */
function func_list_has_two_values(array $list): bool
{
    return count($list) === 2;
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
