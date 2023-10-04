<?php 
require_once "logger.php";


ini_set('memory_limit', '5028M');
class Dbconnect {
    private $conn;
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

    public function insert($table, $columns, $value1, $value2, $value3){
        try {

       // $sql = "INSERT INTO $this->database (:columns) VALUES (:values)";
        echo $this->status;
        $stmt = $this->conn->prepare("INSERT INTO $table ($columns) VALUES (:value1, :value2, :value3)");

        $stmt->bindparam(":value1", $value1);
        $stmt->bindparam(":value2", $value2);
        $stmt->bindparam(":value3", $value3);
        $stmt->execute();
        unset($stmt);
        } catch(PDOException $e) {
            //logError("Failure on insert context: $table, $columns, $values");
            syslog(LOG_ALERT, $e->getMessage());
            unset($stmt);
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
}


/*
database nature:
table log: 
    message text 200
    level text 10
    time timestamp


*/
?>


