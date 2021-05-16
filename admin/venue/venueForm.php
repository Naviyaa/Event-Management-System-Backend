<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/includes/logic/common_functions.php') ?>
<?php include(ROOT_PATH . '/admin/venue/venueLogic.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Venue Information</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="../../static/css/style.css">
</head>
<body>
  <?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
  <div class="col-md-8 col-md-offset-2">
      <a href="venueList.php" class="btn btn-primary">
        <span class="glyphicon glyphicon-chevron-left"></span>
       Venue List
      </a>
      <hr>
      <form class="form" action="venueForm.php" method="post">
        <?php if ($isEditting === true): ?>
          <h1 class="text-center">Update Info</h1>
        <?php else: ?>
          <h1 class="text-center">New Information</h1>
        <?php endif; ?>
        <br />

        <?php if ($isEditting === true): ?>
          <input type="hidden" name="v_id" value="<?php echo $v_id ?>">
        <?php endif; ?>
        <div class="form-group <?php echo isset($errors['v_id']) ? 'has-error': '' ?>">
          <label class="control-label">Venue Id</label>
          <input type="number" name="v_id" value="<?php echo $v_id; ?>" class="form-control" min=0>
          <?php if (isset($errors['v_id'])): ?>
            <span class="help-block"><?php echo $errors['v_id'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['capacity']) ? 'has-error': '' ?>">
          <label class="control-label">Capacity</label>
          <input type="number" name="capacity" value="<?php echo $capacity; ?>" class="form-control" min=0>
          <?php if (isset($errors['capacity'])): ?>
            <span class="help-block"><?php echo $errors['capacity'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['v_add']) ? 'has-error': '' ?>">
          <label class="control-label">Venue Address</label>
          <textarea name="v_add" value="<?php echo $v_add; ?>"  rows="3" cols="10" class="form-control"><?php echo $v_add; ?></textarea>
          <?php if (isset($errors['v_add'])): ?>
            <span class="help-block"><?php echo $errors['v_add'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <?php if ($isEditting === true): ?>
            <button type="submit" name="update_role" class="btn btn-primary">Update Info</button>
          <?php else: ?>
            <button type="submit" name="save_role" class="btn btn-success">Save Info</button>
          <?php endif; ?>
        </div>
      </form>
  </div>
  <?php include(INCLUDE_PATH . "/layouts/footer.php") ?>
</body>
</html>