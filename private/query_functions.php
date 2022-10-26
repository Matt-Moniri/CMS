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
  echo ("<br>1");
  $sql = "SELECT * FROM pages ";
  $sql .= "ORDER BY subject_id ASC, position ASC ";
  echo ("<br>2");
  $result_set = mysqli_query($db, $sql);
  echo ("<br>3");
  confirm_result_set($result_set);
  echo ("<br>4");
  return $result_set;
}

function find_subject_by_id($id)
{
  global $db;
  $sql = "SELECT * FROM subjects ";
  $sql .= " WHERE id='" . mysqli_real_escape_string($db, $id) . "'";
  $result_set = mysqli_query($db, $sql);
  confirm_result_set($result_set);
  $subject = mysqli_fetch_assoc($result_set);
  mysqli_free_result($result_set);
  return $subject;

}

function find_page_by_id($id)
{
  global $db;
  $sql = "SELECT * FROM pages ";
  $sql .= " WHERE id='" . mysqli_real_escape_string($db, $id) . "'";
  $result_set = mysqli_query($db, $sql);
  confirm_result_set($result_set);
  $subject = mysqli_fetch_assoc($result_set);
  mysqli_free_result($result_set);
  return $subject;

}

function insert_new_subject($subject)
{
  $errors = validate_subject($subject);
  if (!empty($errors)) {
    return $errors;
  }

  global $db;
  $sql = "INSERT INTO subjects (menu_name,position,visible) ";
  $sql .= "VALUES ('" . mysqli_real_escape_string($db, $subject['menu_name']) . "','";
  $sql .= mysqli_real_escape_string($db, $subject['position']) . "','";
  $sql .= mysqli_real_escape_string($db, $subject['visible']) . "');";
  $result = mysqli_query($db, $sql);
  if ($result) {
    $id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/subjects/show.php?event=The new subject was successfully created! &id=' . u(h($id))));
  } else {
    $errors = [];
    $errors[] = mysqli_error($db);
    return $errors;
  }
}

function insert_new_page($page)
{
  $errors = validate_page($page);
  if (!empty($errors)) {
    return $errors;
  }
  global $db;
  $sql = "INSERT INTO pages (name,position,visible,subject_id,content) ";
  $sql .= "VALUES ('" . $page['name'] . "','";
  $sql .= mysqli_real_escape_string($db, $page['position']) . "','";
  $sql .= mysqli_real_escape_string($db, $page['visible']) . "','";
  $sql .= mysqli_real_escape_string($db, $page['subject_id']) . "','";
  $sql .= mysqli_real_escape_string($db, $page['content']) . "');";

  //exit($sql);
  $result = mysqli_query($db, $sql);
  if ($result) {
    $id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/pages/show.php?event=Your new page was successfully created!&id=' . u(h($id))));
  } else {
    redirect_to(url_for('/staff/pages/new.php?event=' . mysqli_error($db)));
  }
  return;
}
function update_subject($subject)
{
  $errors = validate_subject($subject);
  if (!empty($errors)) {
    return $errors;
  }
  global $db;
  $sql = "UPDATE subjects ";
  $sql .= "SET menu_name='" . mysqli_real_escape_string($db, $subject['menu_name']) . "', ";
  $sql .= "position='" . mysqli_real_escape_string($db, $subject['position']) . "', ";
  $sql .= "visible='" . mysqli_real_escape_string($db, $subject['visible']) . "' ";
  $sql .= "WHERE id='" . mysqli_real_escape_string($db, $subject['id']) . "' ";
  $sql .= "LIMIT 1;";
  //exit($sql);
  $result = mysqli_query($db, $sql);
  if ($result) {
    redirect_to(url_for("/staff/subjects/show.php?id=" . $subject['id'] . "&event=Editted data was successfully saved"));
  } else {
    $errors = [];
    $errors[] = mysqli_error($db);
    mysqli_free_result($result);
    close_connection($db);
    return $errors;

  }



}
function update_page($page)
{
  $errors = validate_page($page);
  if (!empty($errors)) {
    return $errors;
  }
  global $db;
  $sql = "UPDATE pages ";
  $sql .= "SET name='" . mysqli_real_escape_string($db, $page['name']) . "', ";
  $sql .= "position='" . mysqli_real_escape_string($db, $page['position']) . "', ";
  $sql .= "visible='" . mysqli_real_escape_string($db, $page['visible']) . "', ";
  $sql .= "subject_id='" . mysqli_real_escape_string($db, $page['subject_id']) . "', ";
  $sql .= "content='" . mysqli_real_escape_string($db, $page['content']) . "' ";
  $sql .= "WHERE id='" . mysqli_real_escape_string($db, $page['id']) . "' ";
  $sql .= "LIMIT 1;";
  //exit($sql);
  $result = mysqli_query($db, $sql);
  if ($result) {
    redirect_to(url_for("/staff/pages/show.php?id=" . $page['id'] . "&event=The edited data was successfully saved."));
  } else {
    $error = mysqli_error($db);
    mysqli_free_result($result);
    close_connection($db);
    redirect_to(url_for("/staff/pages/edit.php?id=" . $page['id'] . "&event=error" . $error));

  }



}
function delete_subject_by_id($id)
{
  global $db;
  $sql = "DELETE FROM subjects ";
  $sql .= "WHERE id='" . mysqli_real_escape_string($db, $id) . "' ";
  $sql .= "LIMIT 1;";
  $result = mysqli_query($db, $sql);
  return $result;
}

function delete_page_by_id($id)
{
  global $db;
  $sql = "DELETE FROM pages ";
  $sql .= "WHERE id='" . mysqli_real_escape_string($db, $id) . "' ";
  $sql .= "LIMIT 1;";
  $result = mysqli_query($db, $sql);
  return $result;
}
function validate_subject($subject)
{
  $errors = [];

  // menu_name
  if (is_blank($subject['menu_name'])) {
    $errors[] = "Name cannot be blank.";
  } elseif (!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Name must be between 2 and 255 characters.";
  }

  // position
  // Make sure we are working with an integer
  $postion_int = (int) $subject['position'];
  if ($postion_int <= 0) {
    $errors[] = "Position must be greater than zero.";
  }
  if ($postion_int > 999) {
    $errors[] = "Position must be less than 999.";
  }

  // visible
  // Make sure we are working with a string
  $visible_str = (string) $subject['visible'];
  if (!has_inclusion_of($visible_str, ["0", "1"])) {
    $errors[] = "Visible must be true or false.";
  }

  return $errors;
}

function validate_page($page)
{
  $errors = [];

  // menu_name
  if (is_blank($page['name'])) {
    $errors[] = "Name cannot be blank.";
  } elseif (!has_length($page['name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Name must be between 2 and 255 characters.";
  }

  // position
  // Make sure we are working with an integer
  $postion_int = (int) $page['position'];
  if ($postion_int <= 0) {
    $errors[] = "Position must be greater than zero.";
  }
  if ($postion_int > 999) {
    $errors[] = "Position must be less than 999.";
  }

  // visible
  // Make sure we are working with a string
  $visible_str = (string) $page['visible'];
  if (!has_inclusion_of($visible_str, ["0", "1"])) {
    $errors[] = "Visible must be true or false.";
  }

  return $errors;
}
?>