<?php
if (strpos($_SERVER['SERVER_NAME'], "herokuapp.com")) {
  require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialize.php');
} else {
  require_once('../../private/initialize.php');
} ?>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<?php $page_title = 'Staff Menu'; ?>
<?php
include(SHARED_PATH . '/staff_header.php');
?>



<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li>
        <a href="<?php
echo url_for('staff/pages/index.php')
  ?>">Pages</a>
      </li>
      <li>
        <a href="<?php
echo url_for('staff/subjects/index.php')
  ?>">Subjects</a>
      </li>
    </ul>
  </div>

</div>
<?php include(SHARED_PATH . '/staff_footer.php');
?>