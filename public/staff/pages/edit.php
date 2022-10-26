<?php
if (strpos($_SERVER['SERVER_NAME'], "herokuapp.com")) {
  require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialize.php');
} else {
  require_once('../../../private/initialize.php');
}
if (!isset($_GET['id'])) {
  redirect_to(url_for('staff/pages/index.php'));
}
$pages_num = mysqli_num_rows(find_all_pages());
$page = [];
$page['id'] = $_GET['id'];
$last_event = $_GET['event'];


if (is_post_request()) {
  $page['name'] = $_POST['name'];
  $page['position'] = $_POST['position'];
  $page['subject_id'] = $_POST['subject_id'];
  $page['visible'] = $_POST['visible'];
  $errors = update_page($page);

} else {
  $page = find_page_by_id($page['id']);
}


?>


<?php $page_title = 'Edit page' ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page edit">
    <h3>
      <?php echo $last_event ?>
    </h3>
    <h1>
      <?php echo 'Edit Page' ?>
    </h1>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($page['id']))) ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="name" value="<?php echo h($page['name']) ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php
for ($i = 1; $i < $pages_num + 1; $i++) {
  echo "<option value=" . $i . ">" . $i . "</option>";

} ?>
          </select>
        </dd>
      </dl>

      <dl>
        <dt>Subject ID</dt>
        <dd>
          <select name="subject_id">
            <?php for ($i = 1; $i < 3 + 1; $i++) {
  $selected = $i == $page['subject_id'] ? "selected" : "no";
  echo "<option " . $selected . " value=" . $i . ">" . $i . "</option>";
            } ?>



          </select>
        </dd>
      </dl>


      <dl>
        <dt>Visible</dt>
        <dd>

          <!-- // the below is a teqnique to prevent php dispaching the "visible" with no value -->
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?php echo $page['visible'] === '1' ? 'checked' : '' ?>/>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>