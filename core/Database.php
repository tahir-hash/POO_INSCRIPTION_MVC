<?php

namespace App\Core;

class Database
{
    private \PDO|null $pdo = null;
    public function connexionBD(): void
    {
        try {
            $this->pdo = new \PDO('mysql:host=127.0.0.1;dbname=poo_inscription;charset=utf8', 'root', '');
        } catch (\Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function closeConnexion(): void
    {
        $this->pdo = null;
    }

    public function executeSelect(string $sql, array $data = [], bool $single = false): object|array|null
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($data);
        if ($single) {
            $result = $query->fetch(\PDO::FETCH_OBJ);
            if ($query->rowCount() == 0) {
                return null;
            }
        } else {
            $result = $query->fetchAll(\PDO::FETCH_OBJ);
        }
        return $result;
    }

    public function executeUpdate(string $sql, array $data = [], bool $single = false): int
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($data);
        return $this->pdo->lastInsertId('id');
    }
}
