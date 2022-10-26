<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialize.php');

$id = $_GET['id'] ? $_GET['id'] : '1';
$subject = find_subject_by_id($id);
$event = $_GET['event'];
?>

<?php $page_title = 'Show Page' ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>
<div class="content">
  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php') ?>">&laquo Back to List</a>
  <br>
  <h2>
    <?php echo $event ?>
  </h2>
  <dl>
    <dt>ID: </dt>
    <dd>
      <?php echo h($subject['id']) ?>
    </dd>
  </dl>
  <dl>
    <dt>Menu Name:</dt>
    <dd>
      <?php echo h($subject['menu_name']) ?>
    </dd>
  </dl>
  <dl>
    <dt>Position:</dt>
    <dd>
      <?php echo h($subject['position']) ?>
    </dd>
  </dl>
  <dl>
    <dt>Visible:</dt>
    <dd>
      <?php echo h($subject['visible']) ?>
    </dd>
  </dl>

</div>

<?php include(SHARED_PATH . '/staff_footer.php') ?>