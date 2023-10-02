<?php 
require_once "logger.php";
class Dbconnect {
    private $conn;
    private $username = "access";
    private $password = "\$ClockServer272";
    private $database ="test"; 
    private $servername = "localhost";
    public $status = false; 

    private $logname = "dbconnect";

    function __construct(){
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->status = true;
        } catch (PDOException $e) {
            syslog(LOG_ALERT, " ******** Database fail ********");
        }
    }

    public function insert($table, $columns, $values){
        try {

       // $sql = "INSERT INTO $this->database (:columns) VALUES (:values)";
        
        $stmt = $this->conn->prepare("INSERT INTO $this->database (:columns) VALUES (:values)");
        $stmt->bindparam(":columns", $columns, PDO::PARAM_STR);
        $stmt->bindparam(":values", $values, PDO::PARAM_STR);
        $stmt->execute();

        } catch(\Throwable $e) {
            logError("Failure on insert context: $table, $columns, $values");
        }
    }


    function __destruct()
    {
        if ($this->conn) {

            $this->conn->close();
        }
        else {
            logError("$this->logname - null conn");
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


