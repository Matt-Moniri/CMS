<?php require_once('../../../private/initialize.php');
if (!isset($_GET['id'])) {
  redirect_to(url_for('staff/subjects/index.php'));
}
$subjects_num = mysqli_num_rows(find_all_subjects());
$subject = [];
$subject['id'] = $_GET['id'];
$last_event = $_GET['event'];


if (is_post_request()) {
  $subject['menu_name'] = $_POST['menu_name'];
  $subject['position'] = $_POST['position'];
  $subject['visible'] = $_POST['visible'];
  $errors = update_subject($subject);

} else {
  $subject = find_subject_by_id($subject['id']);
}


?>


<?php $page_title = 'Edit Subject' ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject edit">
    <h3>
      <?php echo $last_event ?>
    </h3>
    <h1>
      <?php echo 'Edit Subject' ?>
    </h1>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id']))) ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($subject['menu_name']) ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php
for ($i = 1; $i < $subjects_num + 1; $i++) {
  echo "<option value=" . $i . ">" . $i . "</option>";

            } ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>

          <!-- // the below is a teqnique to prevent php dispaching the "visible" with no value -->
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?php echo $subject['visible']==='1' ? 'checked' : '' ?>/>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Subject" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>