<?php include('../config.php') ?>
<?php include(ROOT_PATH . '/admin/middleware.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custome styles -->
  <link rel="stylesheet" href="../static/css/style.css">
</head>
<body>
  <?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>

  <div class="col-md-4 col-md-offset-4">
      <h1 class="text-center">Admin</h1>
      <br />
      <ul class="list-group">
        <a href="<?php echo BASE_URL . 'admin/users/userList.php' ?>" class="list-group-item">Manage Users</a>
        <a href="<?php echo BASE_URL . 'admin/roles/roleList.php' ?>" class="list-group-item">Manage Roles</a>
        <a href="<?php echo BASE_URL. 'admin/organizer/organizerList.php'?>" class="list-group-item">Organizer</a>
        <a href="<?php echo BASE_URL. 'admin/host/hostList.php'?>" class="list-group-item">Host</a>
        <a href="<?php echo BASE_URL. 'admin/department/depList.php'?>" class="list-group-item">Department</a>
        <a href="<?php echo BASE_URL. 'admin/staff/staffList.php'?>" class="list-group-item">Staff</a>
        <a href="<?php echo BASE_URL. 'admin/guest/guestList.php'?>" class="list-group-item">Guests</a>
        <a href="<?php echo BASE_URL. 'admin/venue/venueList.php'?>" class="list-group-item">Venue</a>
        <a href="<?php echo BASE_URL. 'admin/place/placeList.php'?>" class="list-group-item">At Place</a>
        <a href="<?php echo BASE_URL. 'admin/events/eventList.php'?>" class="list-group-item">Events</a>
      </ul>
  </div>
  <?php include(INCLUDE_PATH . "/layouts/footer.php") ?>
</body>
</html>