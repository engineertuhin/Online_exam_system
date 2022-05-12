<?php


abstract class database{
    protected static $con;

protected  static function Connection(){
    try {
    return    self::$con=new PDO("mysql:dbname=".'online_exam'.";host=".'localhost','admin','00');
    } catch (PDOEXCEPTION $th) {
        echo "Database is not Connect ->" .$th->Getmessage();
    }
    
}
protected static function get($query){
 return   self::Connection()->prepare($query);


}



}





?>