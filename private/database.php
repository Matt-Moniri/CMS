<?php
require_once('db_credentials.php');

function connect_to_db()
{
  $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  confirm_db_connect();
  return $connection;
}

function close_connection($connection)
{
  mysqli_close($connection);
}

function confirm_db_connect()
{
  if (mysqli_connect_errno()) {
    $msg = " Database connection failed: ";
    $msg .= mysqli_connect_error();
    $msg .= " (" . mysqli_connect_errno() . ")";
    exit($msg);
  }
}

function confirm_result_set($result_set)
{
  if (!$result_set) {
    exit("No results back from database. Database query failed.");
  }
}


?>