<?php

/* Don't use PHP dynamic type system */
declare(strict_types=1);

namespace JoshBruce\FizzBuzzFunctional\Tests;

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../src/function-defs.php');

/**
 * Verifying that each function is a pure function.
 *
 * Not too sure these tests are actually helpful beyond demonstrating what is
 * obvious in some cases. What I consider to be the more obvious cases will be
 * lower in the file.
 */
class DefinitionTest extends TestCase
{
    /**
     * @test
     *
     * Not going to test the more specific functions, which call this one.
     */
    public function is_multiple_of(): void // phpcs:ignore
    {
        // Act
        $subject = func_is_multiple_of(5, 5);

        // Assert
        $this->assertTrue($subject);

        // Act
        $subject = func_is_multiple_of(5, 2);

        // Assert
        $this->assertFalse($subject);
    }

    /**
     * @test
     */
    public function concatenate_string(): void // phpcs:ignore
    {
        // Act
        $subject = func_concatenate_string('Hello', ', World!');

        // Assert
        $expected = 'Hello, World!';

        $this->assertSame($expected, $subject);
    }

    /**
     * @test
     */
    public function new_line_character(): void // phpcs:ignore
    {
        // Act
        $subject = func_new_line_char();

        // Assert
        $expected = "\n";

        $this->assertSame($expected, $subject);
    }

    /**
     * @test
     */
    public function fizz_answer(): void // phpcs:ignore
    {
        // Act
        $subject = func_fizz_answer();

        // Assert
        $expected = 'Fizz';

        $this->assertSame($expected, $subject);
    }

    /**
     * @test
     */
    public function buzz_answer(): void // phpcs:ignore
    {
        // Act
        $subject = func_buzz_answer();

        // Assert
        $expected = 'Buzz';

        $this->assertSame($expected, $subject);
    }

    /**
     * @test
     */
    public function fizz_buzz_answer(): void // phpcs:ignore
    {
        // Act
        $subject = func_fizz_buzz_answer();

        // Assert
        $expected = 'FizzBuzz';

        $this->assertSame($expected, $subject);
    }

    /**
     * @test
     */
    public function turn_as_string(): void // phpcs:ignore
    {
        // Arrange
        $possibilities = [1, 2, 3];
        $key           = array_rand($possibilities);
        $turn          = $possibilities[$key];

        // Act
        $subject = func_turn_answer($turn);

        // Assert
        $expected = strval($subject);

        $this->assertSame($expected, $subject);
    }
}
