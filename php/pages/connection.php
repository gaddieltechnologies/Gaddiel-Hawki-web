<?php
class Database
{
    private static $dbName = 'gadfort_jpb-hawki-prod' ;
    private static $dbHost = 'mysql3000.mochahost.com' ;
    private static $dbUsername = 'gadfort_jpb';
    private static $dbUserPassword = 'forAug1511';
  
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
		  ini_set('max_execution_time', 300);
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>