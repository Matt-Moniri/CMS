<?php
if (strpos($_SERVER['SERVER_NAME'], "herokuapp.com")) {
  require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialize.php');
} else {
  require_once('../../../private/initialize.php');
}
$page_title = "Delete subject";
$subject = [];
$subject['id'] = $_GET['id'];
if (is_get_request()) {

  $subject = find_subject_by_id($subject['id']);
}
//if not get request then it is a post request 
else {
  $result = delete_subject_by_id($subject['id']);
  if ($result) {
    redirect_to(url_for('/staff/subjects/index.php?event=deleted'));
  } else {
    $error = mysqli_error($db);
    redirect_to(url_for('/staff/subjects/delete.php?event= Database Error: ' . $error . '&id=' . h(u($subject['id']))));
  }


}



?>


<?php include_once(SHARED_PATH . "/staff_header.php") ?>
<h3>&nbsp;
  <?php echo $_GET['event'] ?>
</h3>
<h1>DELETE SUBJECT</h1>
<form action="<?php echo url_for('/staff/subjects/delete.php?id=') . h(u($subject['id'])) ?>" method="post">
  <dl>
    <dt>Subject Name: </dt>
    <dd>
      <?php echo $subject['menu_name'] ?>
    </dd>
  </dl>
  <input type="submit" Value="Delete"></input>
  <br>
  <br>
</form>


<?php include_once(SHARED_PATH . "/staff_footer.php") ?>