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

    private function conditionalTernarySubject(): string
    {
        ob_start();
        include __DIR__ . '/../src/conditionals-ternary.php';
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

        $this->assertSame($this->output(), $subject);

        $this->assertLessThan(0.06, $ms);
    }

    /**
     * @test
     */
    public function zero_through_fifteen_conditionals_ternary(): void
    {
        // Arrange
        $start = hrtime(true);

        // Act
        $subject = $this->conditionalTernarySubject();

        // Assert
        $end = hrtime(true);

        $ns = $end - $start;
        $ms = $ns/1e+6;

        $this->assertSame($this->output(), $subject);

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

        $this->assertSame($this->output(), $subject);

        $this->assertLessThan(0.08, $ms);
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
