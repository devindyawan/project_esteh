<?php

class Config
{
    private static $config = array(
        "host" => "",
        "user" => "",
        "password" => "",
        "dbname" => "",
    );

    public $connection;

    // public function __construct()
    // {
    //     $this->connection = mysqli_connect(self::HOST, self::USER, self::PASSWORD, self::DBNAME);
    // }

    public function __construct($host, $user, $password, $dbname)
    {
        self::$config["host"] = $host;
        self::$config["user"] = $user;
        self::$config["password"] = $password;
        self::$config["dbname"] = $dbname;
    }

    public static function get_connection()
    {
        return mysqli_connect(self::$config["host"], self::$config["user"], self::$config["password"], self::$config["dbname"]);
    }

    public static function checkConnection()
    {
        var_dump(self::get_connection()->connect_errno);
    }
}
