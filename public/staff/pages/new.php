<?php require_once('../../../private/initialize.php');

$name = '';
$position = '';
$visible = '';
if (is_post_request()) {
  $name = $_POST['name'];
  $position = $_POST['position'];
  $visible = $_POST['visible'];
  echo 'Entered data for new page created:';
  echo '<br>name= ' . $name;
  echo '<br>position= ' . $position;
  echo '<br>visible= ' . $visible;
}
else {
  $page = find_page_by_id($page['id']);
  $page_set = find_all_pages();
  $pages_num = mysqli_num_rows($page_set);
}
?>
<?php $page_title = 'Create New Page'?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page edit">
    <h3>
      --
      <?php echo $_GET['event']?>
    </h3>
    <h1>
      <?php echo 'Create a new page'?>
    </h1>

    <form action="<?php echo url_for('/staff/pages/create.php?')?>" method="post">
      <dl>
        <dt>Name</dt>
        <dd><input type="text" name="name" value="<?php echo h($name)?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php
for ($i = 1; $i < $pages_num + 1 + 1; $i++) {
  $selected = $i == $page['position'] ? "selected" : "no";

  echo "<option " . $selected . " value=" . $i . ">" . $i . "</option>";
}
?>



          </select>
        </dd>
      </dl>
      <dl>
        <dt>Subject ID</dt>
        <dd><select name="subject_id">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select></dd>
      </dl>
      <dl>
        <dt>Content</dt>
        <dd><textarea name="content" value=""></textarea></dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>

          <!-- // the below is a teqnique to prevent php dispaching the "visible" with no value -->
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?php echo $visible==='1' ? 'checked' : '' ?>/>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Page" />
      </div>
    </form>

  </div>

</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>