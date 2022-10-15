<?php require_once('../../../private/initialize.php'); ?>
<?php
$pages = [
  ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'MMBank'],
  ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'History'],
  ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Leadership'],
  ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Contact Us'],
];
?>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<?php $page_title = 'Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php')?>
<div id="content">
  <div class="pages listing">
    <h1>Pages</h1>

    <div class="actions">
      <a class="action" href="">Create New Page</a>
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

      <?php foreach ($pages as $page) { ?>
      <tr>
        <td>
          <?php echo htmlspecialchars($page["id"]); ?>
        </td>
        <td>
          <?php echo htmlspecialchars($page['position']); ?>
        </td>
        <td>
          <?php echo htmlspecialchars($page['visible']) == 1 ? 'true' : 'false'; ?>
        </td>
        <td>
          <?php echo $page['menu_name']; ?>
        </td>
        <td><a class="action" href="<?php echo url_for('staff/pages/show.php?id=' . h(u($page['id'])))?>">View</a>
        </td>
        <td><a class="action" href="">Edit</a></td>
        <td><a class="action" href="">Delete</a></td>
      </tr>
      <?php
}?>
    </table>

  </div>
</div>
<?php include(SHARED_PATH . '/staff_footer.php')?>