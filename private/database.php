<?php
require_once('db_credentials.php');

function connect_to_db()
{
  echo ('1con');
  $connection = mysqli_connect(DB_HOST2, DB_USER2, DB_PASSWORD2, DB_NAME2);
  echo ('<br>2con');
  $connect_error = confirm_db_connect();
  echo ('<br>3con');
  exit;

  if ($connect_error) {
    $connection = mysqli_connect(DB_HOST2, DB_USER2, DB_PASSWORD2, DB_NAME2);
    $connect_error = confirm_db_connect();
  }
  if ($connect_error) {
    echo ("second error");
    var_dump($connect_error);
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