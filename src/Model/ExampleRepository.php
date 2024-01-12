<?php

namespace PhpStarter\Model;

use PDO;

class ExampleRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getPdo();
    }

    public function readById(int $id): ?Example
    {
        $stmt = $this->pdo->prepare("SELECT * FROM example WHERE id = ?");
        $stmt->execute([$id]);

        $row = $stmt->fetch();
        if (!$row) {
            return null;
        }

        return new Example($row['id'], $row['name'], $row['created_at'], $row['updated_at']);
    }

    public function readAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM example");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_map(function ($row) {
            return new Example($row['id'], $row['name'], $row['created_at'], $row['updated_at']);
        }, $results);
    }

    public function create(string $name): void
    {
        $sql = "INSERT INTO example (name) VALUES (:name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['name' => $name]);
    }

    public function update(int $id, string $name): void
    {
        $sql = "UPDATE example SET name = :name WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'name' => $name,
        ]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM example WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}