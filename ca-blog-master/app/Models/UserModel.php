<?php

class UserModel
{

    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    // Get all users
    public function getAllUsers(): array
    {
        return $this->db->select("SELECT * FROM users");
    }

    // Remove user by ID
    public function removeUser(int $id): bool
    {
        return $this->db->remove("DELETE FROM users WHERE id = :id",
            ["id" => $id]);
    }

    public function getUserByUsername(string $username): array
    {
        return $this->db->select("SELECT * FROM users WHERE username = :username",
            ['username' => $username]);

    }

    public function addUser($username, $password)
    {
        $secret_password = password_hash($password, PASSWORD_DEFAULT);
        $this->db->insert("INSERT INTO users (username, password)
        VALUES (:username, :password)",
            ['username' => $username,
                'password' => $secret_password
            ]);

    }
    public function paginate(int $limit, int $offset) :array {
        return $this->db->select("SELECT * FROM users LIMIT :limit OFFSET :offset",
            [
                'limit' => $limit,
                'offset' => $offset
            ]);
    }

}