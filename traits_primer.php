<?php
trait FileLogger
{
    public function log($msg){
        echo "File Logger |".date("Y-m-d h:i:s").": $msg <br>";
    }
    public function logOff($msg){
        echo "File Logger Off |".date("Y-m-d h:i:s").": $msg <br>";
    }

}

trait DatabaseLogger
{
    public function log($msg){
        echo "Database Logger |".date("Y-m-d h:i:s").": $msg <br>";
    }

    public function logOff($msg){
        echo "Database Logger Off |".date("Y-m-d h:i:s").": $msg <br>";
    }
}

class Logger
{
    // use FileLogger, DatabaseLogger; //Trait method DatabaseLogger::log has not been applied as Logger::log, because of collision with FileLogger::log
    use FileLogger, DatabaseLogger{
        FileLogger::log insteadOf DatabaseLogger; //jedan log umesto drugog
        DatabaseLogger::logOff insteadOf FileLogger; //jedan log umesto drugog
    }
    public function __construct()
    {
        $this->log("Poruka"); 
    }

}

$log = new Logger();
$log->logOff("Izloguj se");

?>