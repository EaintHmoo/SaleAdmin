<?php
class Database{
    private static $dbName = 'cms';
    private static $dbHost = 'localhost';
    private static $dbUserName = 'root';
    private static $dbUserPassword = '';
    private static $cont = null;

    public function __construct() {
        die('Init function is not allowed');
    }

    public static function connect()
    {
        //One conntection through whole application
        if(null == self::$cont)
        {
            try{
                self :: $cont= new PDO("mysql:host=".self::$dbHost.";dbname=".self::$dbName,self::$dbUserName,self::$dbUserPassword);
            }
            catch(PODException $e){
                die($e->getMessage());
            }
        }
        return self::$cont;
    }
}
?>