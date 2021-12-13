<?php

/* Don't use PHP dynamic type system */
declare(strict_types=1);

namespace JoshBruce\FizzBuzzFunctional\Tests;

use PHPUnit\Framework\TestCase;

class FunctionalTest extends TestCase
{
    private function functionalSubject(): string
    {
        ob_start();
        include __DIR__ . '/../src/functions.php';
        return ob_get_clean();
    }

    /**
     * @test
     */
    public function zero_through_fifteen_functional(): void
    {
        // Arrange
        $start = hrtime(true);

        // Act
        $subject = $this->functionalSubject();

        // Assert
        $end = hrtime(true);

        $ns = $end - $start;
        $ms = $ns/1e+6;

        $this->assertSame($this->output(), $subject);

        $this->assertLessThan(0.18, $ms);
    }

    /**
     * @test
     */
    public function ten_through_twenty_functional(): void
    {
        // Arrange
        $output = <<<output
            Buzz
            11
            Fizz
            13
            14
            FizzBuzz
            16
            17
            Fizz
            19
            Buzz

            output;

        $start = hrtime(true);

        // Act
        $subject = func_fizz_buzz(20, 10);

        // Assert
        $end = hrtime(true);

        $ns = $end - $start;
        $ms = $ns/1e+6;

        $this->assertSame($output, $subject);

        $this->assertLessThan(0.37, $ms);
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
