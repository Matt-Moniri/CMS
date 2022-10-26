<?php
require_once('db_credentials.php');

function connect_to_db()
{
  if (strpos($_SERVER['SERVER_NAME'], "herokuapp.com")) {
    $host = DB_HOST2;
    $user = DB_USER2;
    $pass = DB_PASSWORD2;
    $db_name = DB_NAME2;

  } else {
    $host = DB_HOST;
    $user = DB_USER;
    $pass = DB_PASSWORD;
    $db_name = DB_NAME;
  }
  $connection = mysqli_connect($host, $user, $pass, $db_name);
  $connect_error = confirm_db_connect();

  if ($connect_error) {
    exit($connect_error);
  }
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
    return ($msg);
  }
  return (false);
}

function confirm_result_set($result_set)
{
  if (!$result_set) {
    exit("No results back from database. Database query failed.");
  }
}


?>