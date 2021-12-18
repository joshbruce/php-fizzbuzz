<?php

declare(strict_types=1);

namespace JoshBruce\FizzBuzzOopStatic;

/**
 * For the most part, this is FizzBuzzFunctionsOnly, but uses assignments as well.
 *
 * Some folks are pretty hardcore about not having static values inside the body
 * of the implementation and, therefore, pull everything into constants and
 * properties. I'm torn on the complete utility of this approach.
 *
 * IN CSS I do something similar with custom properties; front-loaded at the top.
 * However, in executable code, I typically try to front-load differently.
 *
 * I also tend to prefer the approach that everything is a method. I find the
 * everything is a method approach to be a way of automatically enforcing
 * lazy-loading or deferring to last possible moment.
 *
 * I find the everything is a method approach to also facilitate modification
 * without changing the call signatures easier; fewer breaking changes. For
 * example, if we wanted to modify the value some of the constants return or
 * perform a calculation and this was our starting point, we would need to create
 * the function, recommend users use the function instead, and the deprecate the
 * constants, whereas if everything starts as a method (with optional cached
 * property) we could just modify the guts of the method itself.
 */
abstract class FizzBuzzFunctionsAndAssignments
{
    private const NEW_LINE_CHAR = "\n";

    private const FIZZ_ANSWER = 'Fizz';

    private const BUZZ_ANSWER = 'Buzz';

    private const FIZZ_BUZZ_ANSWER = 'FizzBuzz';

    private const FIZZ_MULTIPLIER = 3;

    private const BUZZ_MULTIPLIER = 5;

    private const FIZZ_BUZZ_MULTIPLIER = 15;

    public static function to(int $high, int $from): string
    {
        // Built based on the functional implementation
        // retrieving from scope local to function
        //
        // I often find this method, one step per line, to be easier to read
        // and comprehend than the nested function approach used up to this point.
        $newLine = self::NEW_LINE_CHAR;

        $gameRange = range($from, $high);

        $answers = array_map(array(self::class, 'answerFor'), $gameRange);
        $answersCompiled = implode($newLine, $answers);

        return $answersCompiled . $newLine;
    }

    private static function answerFor(int $turn): string
    {
        return match (true) {
            (self::isMultipleOf($turn, self::FIZZ_BUZZ_MULTIPLIER)) =>
                self::FIZZ_BUZZ_ANSWER,
            (self::isMultipleOf($turn, self::BUZZ_MULTIPLIER)) =>
                self::BUZZ_ANSWER,
            (self::isMultipleOf($turn, self::FIZZ_MULTIPLIER)) =>
                self::FIZZ_ANSWER,
            default => strval($turn)
        };
    }

    private static function isMultipleOf(int $multiplier, int $multiplicand): bool
    {
        return $multiplier % $multiplicand === 0;
    }
}
