<?php 
require_once "logger.php";


ini_set('memory_limit', '5028M');
class Dbconnect {
    protected $conn = "";
    private $username = "access";
    private $password = "\$ClockServer272";
    private $database ="nature"; 
    private $servername = "localhost";
    public $status = false; 

    private $logname = "dbconnect";

    function __construct(){
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            // Set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
            $this->status = true;
        } catch (PDOException $e) {
            syslog(LOG_ALERT, $e->getMessage());
        }
    }

    
    


    function __destruct()
    {
        if ($this->conn instanceof PDO) {
            $this->conn = null;
        } else {
            syslog(LOG_ALERT, "$this->logname - null conn");
        }
    }
} // END OF Dbconnect -------------------------------------------------

class logDB extends Dbconnect{
    private $table = "log";
    public function insert($message, $level, $time){

        try {

       // $sql = "INSERT INTO $this->database (:columns) VALUES (:values)";
        $stmt = $this->conn->prepare("INSERT INTO $this->table (message, level, time) VALUES (:message, :level, :time)");

        $stmt->bindparam(":message", $message);
        $stmt->bindparam(":level", $level);
        $stmt->bindparam(":time", $time);
        $stmt->execute();
        unset($stmt);
        } catch(PDOException $e) {
            //logError("Failure on insert context: $table, $columns, $values");
            syslog(LOG_ALERT, $e->getMessage());
            unset($stmt);
        }
    }
    

}

class natureDB extends Dbconnect {
    private $table = "nature";
    
    public function insert($name, $desc, $imageloc){
        
    }
    public function displayMainPageNoFilter(){
        try {
            $stmt = $this->conn->prepare("Select * FROM nature ORDER BY name ASC LIMIT 20;");
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
        catch (PDOException $e){
            logError("displayMainPageNoFilter error: " . $e->getMessage());
        }
        
    }

    public function getInfoFromId($id){
        try {
            $stmt = $this->conn->prepare("Select * WHERE id = :id FROM nature ORDER BY id ASC LIMIT 1;");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results[0];
        }
        catch (PDOException $e){
            logError("getInfoFromId error: ". $e->getMessage());
        }
    }
}




/*
database nature:
table log: 
    message text 200
    level text 10
    time timestamp


table nature:
    name text(100),
    description text(10000),
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    imagename text(100),

    PRIMARY KEY (id);

*/
?>


