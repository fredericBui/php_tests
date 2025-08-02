<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once '../ExempleClass.php';


final class GreeterTest extends TestCase
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