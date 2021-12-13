<?php

/* Don't use PHP dynamic type system */
declare(strict_types=1);

namespace JoshBruce\FizzBuzzOopStatic\Tests;

use PHPUnit\Framework\TestCase;

use JoshBruce\FizzBuzzOopStatic\FizzBuzzFunctionsAndAssignments;

class StaticFunctionsAssignmentsTest extends TestCase
{
    /**
     * @test
     */
    public function zero_through_fifteen_oop_static_functions_only(): void
    {
        // Arrange
        $start = hrtime(true);

        // Act
        $subject = FizzBuzzFunctionsAndAssignments::to(15, from: 1);

        // Assert
        $end = hrtime(true);

        $ns = $end - $start;
        $ms = $ns/1e+6;

        $this->assertSame($this->output(), $subject);

        $this->assertLessThan(0.28, $ms);
    }

    private function output(): string
    {
        return <<<output
            1
            2
            Fizz
            4
            Buzz
            Fizz
            7
            8
            Fizz
            Buzz
            11
            Fizz
            13
            14
            FizzBuzz

            output;
    }
}
