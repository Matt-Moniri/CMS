<?php
function find_all_subjects()
{
  global $db;
  $sql = "SELECT * FROM subjects ";
  $sql .= "ORDER BY position ASC ";
  $result_set = mysqli_query($db, $sql);
  confirm_result_set($result_set);
  return $result_set;
}

function find_all_pages()
{
  global $db;
  $sql = "SELECT * FROM pages ";
  $sql .= "ORDER BY subject_id ASC, position ASC ";
  $result_set = mysqli_query($db, $sql);
  confirm_result_set($result_set);
  return $result_set;
}

function find_subject_by_id($id)
{
  global $db;
  $sql = "SELECT * FROM subjects ";
  $sql .= " WHERE id='" . $id . "'";
  $result_set = mysqli_query($db, $sql);
  confirm_result_set($result_set);
  $subject = mysqli_fetch_assoc($result_set);
  mysqli_free_result($result_set);
  return $subject;

}

function insert_new_subject($menu_name, $position, $visible)
{
  global $db;
  $sql = "INSERT INTO subjects (menu_name,position,visiblee) ";
  $sql .= "VALUES ('" . $menu_name . "','" . $position . "','" . $visible . "');";
  $result = mysqli_query($db, $sql);
  if ($result) {
    $id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/subjects/show.php?id=' . u(h($id))));
  }
  else {
    redirect_to(url_for('/staff/subjects/new.php'));
  }
  return;
}

function update_subject($subject)
{
  global $db;
  $sql = "UPDATE subjects ";
  $sql .= "SET menu_name='" . $subject['menu_name'] . "', ";
  $sql .= "position='" . $subject['position'] . "', ";
  $sql .= "visible='" . $subject['visible'] . "' ";
  $sql .= "WHERE id='" . $subject['id'] . "' ";
  $sql .= "LIMIT 1;";
  //exit($sql);
  $result = mysqli_query($db, $sql);
  if ($result) {
    redirect_to(url_for("/staff/subjects/show.php?id=" . $subject['id'] . "&event=Editsuccessful"));
  }
  else {
    $error = mysqli_error($db);
    mysqli_free_result($result);
    close_connection($db);
    redirect_to(url_for("/staff/subjects/edit.php?id=" . $subject['id'] . "&event=error" . $error));

  }



}
?>