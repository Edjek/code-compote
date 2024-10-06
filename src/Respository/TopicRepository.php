<?php

namespace App\Respository;

use App\Respository\AbstractRespository;

class TopicRepository extends AbstractRepository
{

    public function findAll(): array
    {
        $sql = 'SELECT * FROM topic';
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }
}
