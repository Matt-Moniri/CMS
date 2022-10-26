<?php
if (strpos($_SERVER['SERVER_NAME'], "herokuapp.com")) {
  require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialize.php');
} else {
  require_once('../../../private/initialize.php');
}
var_dump(addslashes("=';:   |"));
var_dump(mysqli_real_escape_string($db, "=';:  |"));
$subjects_num = mysqli_num_rows(find_all_subjects());
$subject = [];
$event = $_GET['event'];

if (is_post_request()) {
  $subject['menu_name'] = $_POST['menu_name'];
  $subject['position'] = $_POST['position'];
  $subject['visible'] = $_POST['visible'];
  $errors = insert_new_subject($subject);

} else {
}


?>


<?php $page_title = 'Create New Subject' ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
    <h3>
      <?php echo $event ?>
    </h3>
    <h1>
      <?php echo 'New Subject' ?>
    </h1>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/staff/subjects/new.php?') ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($subject['menu_name']) ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php
for ($i = 1; $i < $subjects_num + 1 + 1; $i++) {
  $selected = $i == $page['position'] ? "selected" : "no";

  echo "<option " . $selected . " value=" . $i . ">" . $i . "</option>";
            }
            ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>

          <!-- // the below is a teqnique to prevent php dispaching the "visible" with no value -->
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?php echo $subject['visible'] === '1' ? 'checked' : '' ?>/>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Subject" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>