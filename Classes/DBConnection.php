<?php
/**
 * Created by PhpStorm.
 * User: Darke
 * Date: 10.06.2016
 * Time: 12:17
 */

namespace Darkenery\Task1\Classes;


class DBConnection
{
    private static $instance;
    public $mysqli;

    /**
     * @return DBConnection
     */
    static function getInstance()
    {
        if (is_null(self::$instance))
            self::$instance = new DBConnection();
        return self::$instance;
    }

    /**
     * DBConnection constructor.
     */
    private function __construct()
    {
        $host = 'localhost';
        $user = 'root';
        $passwd = '';
        $db = 'work';
        
        $this->mysqli = new \mysqli($host, $user, $passwd, $db);
        $this->mysqli->set_charset("utf8");
    }

    private function __clone() {}
}