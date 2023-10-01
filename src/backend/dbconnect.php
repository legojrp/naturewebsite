<?php 
require "logger.php";
class Dbconnect {
    private $conn;
    private $username = "access";
    private $password = "\$ClockServer272";
    private $database ="test"; 
    private $servername = "locdalhost";
    public $status = false; 

    private $logname = "dbconnect";

    function __construct(){
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->status = true;
        } catch (PDOException $e) {
            logError("$this->logname - " . $e->getMessage());
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
?>