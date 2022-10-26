<?php
if (strpos($_SERVER['SERVER_NAME'], "herokuapp.com")) {
  require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialize.php');
} else {
  require_once('../../../private/initialize.php');
}
$id = $_GET['id'] ? $_GET['id'] : '1';
$page = find_page_by_id($id);
$event = $_GET['event'] ?? ""
  ?>

<?php $page_title = 'Show Page' ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>
<div class="content">
  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php') ?>">&laquo Back to List</a>
  <br>
  <h2>
    <?php echo $event ?>
  </h2>
  <dl>
    <dt>ID: </dt>
    <dd>
      <?php echo h($page['id']) ?>
    </dd>
  </dl>
  <dl>
    <dt>Menu Name:</dt>
    <dd>
      <?php echo h($page['name']) ?>
    </dd>
  </dl>
  <dl>
    <dt>Position:</dt>
    <dd>
      <?php echo h($page['position']) ?>
    </dd>
  </dl>
  <dl>
    <dt>Visible:</dt>
    <dd>
      <?php echo h($page['visible']) ?>
    </dd>
  </dl>

</div>

<?php include(SHARED_PATH . '/staff_footer.php') ?>