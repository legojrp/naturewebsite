<?php 
function logMessage($level, $message) {
    $logFile = 'log.log';

    $dir = "log";
    // Check if the log file exists, create it if not
    if ( !file_exists($dir) ) {
        mkdir ($dir, 0744);
    }
    echo is_writable($dir);
    // Generate a timestamp
    $timestamp = date('Y-m-d H:i:s');

    // Format the log message
    $logMessage = "[$timestamp] [$level] $message\n";

    // Append the log message to the log file
    file_put_contents($dir.'/log.log', $logMessage, FILE_APPEND);
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