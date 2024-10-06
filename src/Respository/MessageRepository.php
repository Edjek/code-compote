<?php

namespace App\Respository;

class MessageRepository extends AbstractRepository
{

    public function findAll(): array | bool
    {
        $sql = 'SELECT * FROM message';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findAllByIdTopic($id): array | bool
    {
        $sql = 'SELECT * FROM message WHERE topic_id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetchAll();
    }
}
