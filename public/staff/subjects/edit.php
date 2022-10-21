<?php require_once('../../../private/initialize.php');
if (!isset($_GET['id'])) {
  redirect_to(url_for('staff/subjects/index.php'));
}
$subject = [];
$subject['id'] = $_GET['id'];
$last_event = $_GET['event'];

if (is_post_request()) {
  $subject['menu_name'] = $_POST['menu_name'];
  $subject['position'] = $_POST['position'];
  $subject['visible'] = $_POST['visible'];
  update_subject($subject);

}

$subject = find_subject_by_id($subject['id'])
  ?>


<?php $page_title = 'Edit Subject'?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject edit">
    <h3>
      <?php echo $last_event?>
    </h3>
    <h1>
      <?php echo 'Edit Subject for id:' . $subject['id']?>
    </h1>

    <form action="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id'])))?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($subject['menu_name'])?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
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