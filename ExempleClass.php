<?php
final class Greeter
{
    # This method takes a name as input and returns a greeting string.
    public function greet(string $name): string
    {
        return 'Hello, ' . $name . '!';
    }
}