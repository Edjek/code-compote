<?php

namespace App\Core;

class Database
{
    /**
     * @var \PDO|null
     */
    private static ?\PDO $connection = null;

    private static array $config = [
        'host' => 'localhost',
        'dbname' => 'forum_db',
        'username' => 'root',
        'password' => '',
    ];

    /**
     * @return void
     */
    public static function initConnection(): void
    {
        // On verifie si $connection a déjà été créée, si c'est pas le cas on la créée
        // Design pattern Singleton : permet d'eviter d'appeler une ressource inutilement
        if (self::$connection === null) {
            try {
                self::$connection = new \PDO(
                    'mysql:host=' . self::$config['host'] . ';dbname=' . self::$config['dbname'] . ';charset=utf8',
                    self::$config['username'],
                    self::$config['password'],
                    [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION],
                );
            } catch (\PDOException $e) {
                die("Erreur de connexion à la base de donnée" . $e->getMessage());
            }
        }
    }

    /**
     * @return \PDO
     */
    public static function getConnectionInstance(): \PDO
    {
        return self::$connection;
    }
}
