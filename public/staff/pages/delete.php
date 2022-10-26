<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialize.php');
$page_title = "Delete Page";
$page = [];
$page['id'] = $_GET['id'];
if (is_get_request()) {

  $page = find_page_by_id($page['id']);
}
//if not get request then it is a post request 
else {
  $result = delete_page_by_id($page['id']);
  if ($result) {
    redirect_to(url_for('/staff/pages/index.php?event=deleted'));
  } else {
    $error = mysqli_error($db);
    redirect_to(url_for('/staff/pages/delete.php?event= Database Error: ' . $error . '&id=' . h(u($page['id']))));
  }


}



?>


<?php include_once(SHARED_PATH . "/staff_header.php") ?>
<h3>&nbsp;
  <?php echo $_GET['event'] ?>
</h3>
<h1>DELETE Page</h1>
<form action="<?php echo url_for('/staff/pages/delete.php?id=') . h(u($page['id'])) ?>" method="post">
  <dl>
    <dt>Page Name: </dt>
    <dd>
      <?php echo $page['name'] ?>
    </dd>
  </dl>
  <input type="submit" Value="Delete"></input>
  <br>
  <br>
</form>


<?php include_once(SHARED_PATH . "/staff_footer.php") ?>