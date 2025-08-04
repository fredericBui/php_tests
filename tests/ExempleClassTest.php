<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../ExempleClass.php';


final class ExempleClassTest extends TestCase
{
    public function testGreetsWithName(): void
    {
        # Create an instance of the class you want to test
        $greeter = new Greeter;

        # Call the method you want to test
        $greeting = $greeter->greet('Alice');

        # Assert that the result is what you expect
        $this->assertSame('Hello, Alice!', $greeting);
    }
}