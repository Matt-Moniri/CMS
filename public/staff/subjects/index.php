<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialize.php');
$subjects_set = find_all_subjects() ?>



<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<?php $page_title = 'Subjects'; ?>
<?php include(SHARED_PATH . '/staff_header.php') ?>
<div id="content">
  <div class="subjects listing">
    <h1>Subjects</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/subjects/new.php') ?>">Create New Subject</a>
    </div>

    <table class="list">
      <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
        <th>Name</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php while ($subject = mysqli_fetch_assoc($subjects_set)) { ?>
      <tr>
        <td>
          <?php echo htmlspecialchars($subject['id']); ?>
        </td>
        <td>
          <?php echo htmlspecialchars($subject['position']); ?>
        </td>
        <td>
          <?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?>
        </td>
        <td>
          <?php echo htmlspecialchars($subject['menu_name']); ?>
        </td>
        <td><a class="action"
            href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id']))) ?>">View</a>
        </td>
        <td><a class="action"
            href="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id']))) ?>">Edit</a>
        </td>
        <td><a class="action"
            href="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id']))) ?>">Delete</a></td>
      </tr>
      <?php
} ?>

    </table>
    <?php mysqli_free_result($subjects_set);
?>
  </div>
</div>
<?php
include('../../../private/shared/staff_footer.php') ?>