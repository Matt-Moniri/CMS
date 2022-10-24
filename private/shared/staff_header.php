<?php
if (!isset($page_title)) {
  $page_title = 'Staff Area';
} ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    <?php echo h($page_title); ?>
  </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo url_for('stylesheets/staff.css') ?>">
</head>

<body>
  <header>
    <h1>
      M M Bank
    </h1>
  </header>
  <navigation>
    <ul>
      <li>
        <a href="<?php echo url_for('staff/index.php') ?>">&nbsp&nbsp&nbsp&nbsp &raquo to Main Menu</a>
      </li>
    </ul>
  </navigation>