<?php 
function logMessage($level, $message) {
    $logFile = 'log.log';

    $dir = "/tmp/php_logs";
    // Check if the log file exists, create it if not
    // if ( !file_exists($dir) ) {
    //     mkdir ($dir, 0744);
    // }
    echo $message;
    // Generate a timestamp
    $timestamp = date('ymdHis');

    // Format the log message
    //$logMessage = "[$timestamp] [$level] $message\n";

    // Append the log message to the log file
    // file_put_contents($dir.'/log.log', $logMessage, FILE_APPEND);
    $sql = new Dbconnect();
    if (!$sql->status){
        syslog(LOG_ALERT, " ******** Log Database fail ********");
        return false;
    }
    $sql->insert("log", "message, level, time", "\"$message\",\"$level\",\"$timestamp\"");
    

    
}
function logWarning($message) {
    logMessage('WARN', $message);
}

function logError($message) {
    logMessage('ERROR', $message);
}

function logInfo($message){
    logMessage("log", $message);
}
?>