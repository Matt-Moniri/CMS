<?php require_once('../../../private/initialize.php');
$page = [];
$page['id'] = $_GET['id'] ? $_GET['id'] : '1';
$page = find_page_by_id($page['id']);
?>





<?php $page_title = 'Show Page'?>
<?php include(SHARED_PATH . '/staff_header.php')?>
<div class="content">
  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php')?>">&laquo Back to List</a>
  <br>
  <div class="page show">
    <dl>
      <dt>Page ID:</dt>
      <dd>
        <?php echo h($page['id'])?>
      </dd>
    </dl>
    <dl>
      <dt>Name:</dt>
      <dd>
        <?php echo h($page['name'])?>
      </dd>
    </dl>
    <dl>
      <dt>Position:</dt>
      <dd>
        <?php echo h($page['position'])?>
      </dd>
    </dl>
    <dl>
      <dt>Visible:</dt>
      <dd>
        <?php echo h($page['visible'])?>
      </dd>
    </dl>
    <dl>
      <dt>page ID:</dt>
      <dd>
        <?php echo h($page['subject_id'])?>
      </dd>
    </dl>
    <dl>
      <dt>Content:</dt>
      <dd>
        <?php echo h($page['content'])?>
      </dd>
    </dl>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php')?>