<?php require_once('../../../private/initialize.php');
$page = [];
$page['id'] = $_GET['id'];
if (is_post_request()) {
  $result = delete_page_by_id($page['id']);
  if ($result) {
    redirect_to(url_for('/staff/pages/index.php?event=deleted'));
  }
  else {
    redirect_to(url_for('/staff/pages/delete.php?event=error&id=' . h(u($page['id']))));
  }

}
else {
  $page = find_page_by_id($page['id']);
}
?>


<?php
$page_title = 'Delete Page';
include(SHARED_PATH . '/staff_header.php')?>

<div id='content'>
  <h1>
    Delete Page
  </h1>
  <form action="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id'])))?>" method="post">
    <dl>
      <dt>Name</dt>
      <dd>
        <?php echo h($page['name'])?>
      </dd>
    </dl>
    <dl>
      <dt>ID</dt>
      <dd>
        <?php echo h($page['id'])?>
      </dd>
    </dl>
    <dl>
      <dt>Position</dt>
      <dd>
        <?php echo h($page['position'])?>
      </dd>
    </dl>
    <dl>
      <dt>Subject ID</dt>
      <dd>
        <?php echo h($page['subject_id'])?>
      </dd>
    </dl>
    <dl>
      <dt>Content</dt>
      <dd>
        <?php echo h($page['content'])?>
      </dd>
    </dl>
    <dl>
      <dt>Visible</dt>
      <dd>
        <?php echo h($page['visible'])?>
      </dd>
    </dl>
    <div id="operations">
      <input type="submit" value="Delete Page" />
    </div>
  </form>
</div>


<?php include(SHARED_PATH . '/staff_footer.php')?>