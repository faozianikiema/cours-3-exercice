<?php

namespace Tests;

use App\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testAdd(): void
    {
        $this->assertSame(5.0, $this->calculator->add(2, 3));
        $this->assertSame(-1.0, $this->calculator->add(2, -3));
    }

    public function testSub(): void
    {
        $this->assertSame(1.0, $this->calculator->sub(3, 2));
        $this->assertSame(5.0, $this->calculator->sub(2, -3));
    }

    public function testMul(): void
    {
        $this->assertSame(6.0, $this->calculator->mul(2, 3));
        $this->assertSame(-6.0, $this->calculator->mul(2, -3));
    }

    public function testDiv(): void
    {
        $this->assertSame(2.0, $this->calculator->div(6, 3));
        $this->assertSame(-2.0, $this->calculator->div(6, -3));
    }

    public function testDivByZeroThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->calculator->div(5, 0);
    }

    public function testPow(): void
    {
        $this->assertSame(8.0, $this->calculator->pow(2, 3));
        $this->assertSame(1.0, $this->calculator->pow(5, 0));
    }

    public function testSqrt(): void
    {
        $this->assertSame(3.0, $this->calculator->sqrt(9));
        $this->assertSame(0.0, $this->calculator->sqrt(0));
    }

    public function testSplitFloat(): void
    {
        $result = $this->calculator->splitFloat(12.34);
        $this->assertSame(12, $result['left']);
        $this->assertSame(34, $result['right']);

        $result2 = $this->calculator->splitFloat(5.0);
        $this->assertSame(5, $result2['left']);
        $this->assertNull($result2['right']);
    }

    public function testGenerateRandomCalculatorName(): void
    {
        $name1 = $this->calculator->generateRandomCalculatorName();
        $name2 = $this->calculator->generateRandomCalculatorName();
        $this->assertStringStartsWith('Calculator-', $name1);
        $this->assertStringStartsWith('Calculator-', $name2);
        $this->assertNotSame($name1, $name2);
    }
}
