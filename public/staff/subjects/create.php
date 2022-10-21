<?php require_once('../../../private/initialize.php');
if (is_post_request()) {
  // Handle form values sent by new.php
  $menu_name = $_POST['menu_name'] ?? '';
  $position = $_POST['position'] ?? '';
  $visible = $_POST['visible'] ?? '';
  insert_new_subject($menu_name, $position, $visible);

}
else {
  redirect_to(url_for('/staff/subjects/new.php'));
}


?>