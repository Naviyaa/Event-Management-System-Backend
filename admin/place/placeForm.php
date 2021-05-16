<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/includes/logic/common_functions.php') ?>
<?php include(ROOT_PATH . '/admin/place/placeLogic.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>At_place Information</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="../../static/css/style.css">
</head>
<body>
  <?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
  <div class="col-md-8 col-md-offset-2">
      <a href="placeList.php" class="btn btn-primary">
        <span class="glyphicon glyphicon-chevron-left"></span>
        At_Place details
      </a>
      <hr>
      <form class="form" action="placeForm.php" method="post">
        <?php if ($isEditting === true): ?>
          <h1 class="text-center">Update Info</h1>
        <?php else: ?>
          <h1 class="text-center">New Information</h1>
        <?php endif; ?>
        <br />

        <?php if ($isEditting === true): ?>
          <input type="hidden" name="h_id" value="<?php echo $h_id ?>">
        <?php endif; ?>
        <div class="form-group <?php echo isset($errors['h_id']) ? 'has-error': '' ?>">
          <label class="control-label">H_Id</label>
          <input type="number" name="h_id" value="<?php echo $h_id; ?>" class="form-control" min=0>
          <?php if (isset($errors['h_id'])): ?>
            <span class="help-block"><?php echo $errors['h_id'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['v_id']) ? 'has-error': '' ?>">
          <label class="control-label">V_Id</label>
          <input type="number" name="v_id" value="<?php echo $v_id; ?>" class="form-control" min=0>
          <?php if (isset($errors['v_id'])): ?>
            <span class="help-block"><?php echo $errors['v_id'] ?></span>
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