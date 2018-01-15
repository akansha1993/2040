<?php
error_reporting(0);
class GFHConfig
{
    public static $SERVER = 'localhost';
    public static $USER = 'root';
    public static $PASSWORD = '';
    public static $DATABASE = 'healthca_health';
    public static $link = '';

    public function __construct()
    {
        return self::$link = mysqli_connect(self::$SERVER, self::$USER, self::$PASSWORD, self::$DATABASE);
    }

}

global $GFH_Config;
$GFH_Config = new GFHConfig();

function url($value='')
{
    return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/".$value;
}