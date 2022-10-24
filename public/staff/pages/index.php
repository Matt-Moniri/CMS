<?php require_once('../../../private/initialize.php'); ?>
<?php $pages_set = find_all_pages() ?>



<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<?php $page_title = 'Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>
<div id="content">
  <div class="pages listing">
    <h1>Pages</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/pages/new.php') ?>">Create New Page</a>
    </div>

    <table class="list">
      <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
        <th>Name</th>
        <th>Subject_ID</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php while ($page = mysqli_fetch_assoc($pages_set)) { ?>
      <tr>
        <td>
          <?php echo htmlspecialchars($page['id']); ?>
        </td>
        <td>
          <?php echo htmlspecialchars($page['position']); ?>
        </td>
        <td>
          <?php echo $page['visible'] == 1 ? 'true' : 'false'; ?>
        </td>
        <td>
          <?php echo htmlspecialchars($page['name']); ?>
        </td>
        <td>
          <?php echo htmlspecialchars($page['subject_id']); ?>
        </td>
        <td><a class="action" href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($page['id']))) ?>">View</a>
        </td>
        <td><a class="action" href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($page['id']))) ?>">Edit</a>
        </td>
        <td><a class="action" href="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id']))) ?>">Delete</a>
        </td>
      </tr>
      <?php
} ?>

    </table>
    <?php mysqli_free_result($pages_set);
?>
  </div>
</div>
<?php
include('../../../private/shared/staff_footer.php') ?>