<?php

$username = env('DB_USERNAME');
$password = env('DB_PASSWORD');
ini_set( "display_errors", true );
date_default_timezone_set( "France/Paris" );
define( "DB_DSN", "pgsql:host=localhost;dbname=database" );
define( "DB_USERNAME", $username);
define( "DB_PASSWORD",$password );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "mypass" );
require( CLASS_PATH . "/Article.php" );

function handleException( $exception ) {
  echo "An error occured. Please try again later. ";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>