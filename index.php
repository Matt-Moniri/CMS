<?php
echo ('$_SERVER["DOCUMENT_ROOT"]=' . $_SERVER['DOCUMENT_ROOT']);
echo "<br>";
echo ('$_SERVER["SCRIPT_NAME"]=' . $_SERVER['SCRIPT_NAME']);
echo "<br>";
echo ("created=" . $_SERVER['DOCUMENT_ROOT'] . '/private/initialize.php');
echo "<br>";
echo ('$_SERVER["SERVER_NAME"]=' . $_SERVER['SERVER_NAME']);
echo "<br>";
exit();

//$pos = strpos($_SERVER['SCRIPT_NAME'], 'index');
//echo (substr($_SERVER['SCRIPT_NAME'], 0, $pos));

require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialize.php');
echo '<br> requre done';
redirect_to('/public/staff/index.php');
?>
<!--  -->
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>mmb</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="">
</head>

<body>
  <h1>
    root/index
    coming soon
  </h1>
  <!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

  <script src="" async defer></script>
</body>

</html>