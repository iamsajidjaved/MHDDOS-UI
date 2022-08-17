<?php
$pid = $_GET[ 'process_id' ];
exec( "kill -s SIGCHLD $pid" );
exec( "kill -9 $pid" );

$db = new SQLite3( 'ddos.db' );
$sql = "DELETE FROM attacks WHERE process_id='$pid';";
$db->exec( $sql );

header( 'Location: ' . $_SERVER[ 'HTTP_REFERER' ] );