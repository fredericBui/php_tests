<?php declare(strict_types=1);
final class Authentification
{
    public function login(string $username, string $password): bool
    {
        return $username === 'admin' && $password === 'password';
    }
}