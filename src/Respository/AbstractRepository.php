<?php

namespace App\Respository;

use App\Core\Database;

abstract class AbstractRepository
{
    /**
     * @var \PDO
     */
    protected \PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnectionInstance();
    }
}
