<?php

class UserRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function createUser(string $email, string $password): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $stmt->execute([
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
        ]);
    }

    public function findUserByEmail(string $email): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    }
}
