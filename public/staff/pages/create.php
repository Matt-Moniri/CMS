<?php
require_once('../../../private/initialize.php');
if (is_post_request()) {
  $page = [];
  $page['id'] = $_POST['id'];
  $page['name'] = $_POST['name'];
  $page['position'] = $_POST['position'];
  $page['visible'] = $_POST['visible'];
  $page['subject_id'] = $_POST['subject_id'];
  $page['content'] = $_POST['content'];
  insert_new_page($page);

}
else {
  redirect_to(url_for('/staff/pages/new.php'));
}

?>