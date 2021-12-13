<?php

declare(strict_types=1);

namespace JoshBruce\FizzBuzzOopStatic;

/**
 * Making the class abstract ensures that our implementation won't have an instance
 * to mutate or that can change out from under us. Of course, if someone extends
 * the class, then that will change.
 */
abstract class FizzBuzzFunctionsOnly
{
    public static function to(int $high, int $from): string
    {
        // Built based on the functional implementation
        return self::concatenateString(
            implode(
                self::newLineChar(),
                array_map(
                    // static analysis didn't like string, change to array
                    array(self::class, 'answerFor'),
                    range($from, $high)
                )
            ),
            self::newLineChar()
        );
    }

    private static function answerFor(int $turn): string
    {
        if (self::isMultipleOfThreeAndFive($turn)) {
            return self::fizzBuzzAnswer();

        } elseif (self::isMultipleOfFive($turn)) {
            return self::buzzAnswer();

        } elseif (self::isMultipleOfThree($turn)) {
            return self::fizzAnswer();

        }
        return self::turnAnswer($turn);
    }

    private static function turnAnswer(int $turn): string
    {
        return strval($turn);
    }

    private static function fizzAnswer(): string
    {
        return 'Fizz';
    }

    private static function buzzAnswer(): string
    {
        return 'Buzz';
    }

    private static function fizzBuzzAnswer(): string
    {
        return self::concatenateString(self::fizzAnswer(), self::buzzAnswer());
    }

    private static function isMultipleOf(int $multiplier, int $multiplicand): bool
    {
        return $multiplier % $multiplicand === 0;
    }

    private static function isMultipleOfThree(int $multiplier): bool
    {
        return self::isMultipleOf($multiplier, 3);
    }

    private static function isMultipleOfFive(int $multiplier): bool
    {
        return self::isMultipleOf($multiplier, 5);
    }

    private static function isMultipleOfThreeAndFive(int $multiplier): bool
    {
        return self::isMultipleOfThree($multiplier) and
            self::isMultipleOfFive($multiplier);
    }

    private static function concatenateString(
        string $prefix,
        string $suffix
    ): string {
        return $prefix . $suffix;
    }

    private static function newLineChar(): string
    {
        return "\n";
    }
}
