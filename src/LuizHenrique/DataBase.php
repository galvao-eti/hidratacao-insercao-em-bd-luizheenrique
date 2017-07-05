<?php

namespace LuizHenrique;

/**
 * Class DataBase
 *
 * @author Luiz Henrique
 */
class DataBase
{
    public static $instance;

    /**
     * @return \PDO
     */
    public static function getConnection($username, $password, $host, $base)
    {
        if (self::$instance === NULL) {
            self::$instance = new \PDO("mysql:dbname={$base};host={$host}", $username, $password);
        }
        self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return self::$instance;
    }

}