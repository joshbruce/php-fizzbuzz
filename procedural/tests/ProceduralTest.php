<?php

/* Don't use PHP dynamic type system */
declare(strict_types=1);

namespace JoshBruce\FizzBuzzProcedural\Tests;

use PHPUnit\Framework\TestCase;

class ProceduralTest extends TestCase
{
    private function conditionalSubject(): string
    {
        ob_start();
        include __DIR__ . '/../src/conditionals.php';
        return ob_get_clean();
    }

    private function switchSubject(): string
    {
        ob_start();
        include __DIR__ . '/../src/switch.php';
        return ob_get_clean();
    }

    /**
     * @test
     */
    public function zero_through_fifteen_conditionals(): void
    {
        // Arrange
        $start = hrtime(true);

        // Act
        $subject = $this->conditionalSubject();

        // Assert
        $end = hrtime(true);

        $ns = $end - $start;
        $ms = $ns/1e+6;

        $expected = <<<output
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

        $this->assertSame($expected, $subject);

        $this->assertLessThan(0.06, $ms);
    }

    /**
     * @test
     */
    public function zero_through_fifteen_switch(): void
    {
        // Arrange
        $start = hrtime(true);

        // Act
        $subject = $this->switchSubject();

        // Assert
        $end = hrtime(true);

        $ns = $end - $start;
        $ms = $ns/1e+6;

        $expected = <<<output
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

        $this->assertSame($expected, $subject);

        $this->assertLessThan(0.08, $ms);
    }
}
