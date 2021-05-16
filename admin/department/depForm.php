<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/includes/logic/common_functions.php') ?>
<?php include(ROOT_PATH . '/admin/department/depLogic.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Department Information</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="../../static/css/style.css">
</head>
<body>
  <?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
  <div class="col-md-8 col-md-offset-2">
      <a href="depList.php" class="btn btn-primary">
        <span class="glyphicon glyphicon-chevron-left"></span>
       Department List
      </a>
      <hr>
      <form class="form" action="depForm.php" method="post">
        <?php if ($isEditting === true): ?>
          <h1 class="text-center">Update Info</h1>
        <?php else: ?>
          <h1 class="text-center">New Information</h1>
        <?php endif; ?>
        <br />

        <?php if ($isEditting === true): ?>
          <input type="hidden" name="d_id" value="<?php echo $d_id ?>">
        <?php endif; ?>
        <div class="form-group <?php echo isset($errors['d_id']) ? 'has-error': '' ?>">
          <label class="control-label">Department Id</label>
          <input type="number" name="d_id" value="<?php echo $d_id; ?>" class="form-control" min=0>
          <?php if (isset($errors['d_id'])): ?>
            <span class="help-block"><?php echo $errors['d_id'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['d_head']) ? 'has-error': '' ?>">
          <label class="control-label">Department Head</label>
          <input type="text" name="d_head" value="<?php echo $d_head; ?>" class="form-control">
          <?php if (isset($errors['d_head'])): ?>
            <span class="help-block"><?php echo $errors['d_head'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['d_name']) ? 'has-error': '' ?>">
          <label class="control-label">Department Name</label>
          <input type="text" name="d_name" value="<?php echo $d_name; ?>" class="form-control">
          <?php if (isset($errors['d_name'])): ?>
            <span class="help-block"><?php echo $errors['d_name'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['o_id']) ? 'has-error': '' ?>">
          <label class="control-label">Organizer Id</label>
          <input type="number" name="o_id" value="<?php echo $o_id; ?>" class="form-control" min=0>
          <?php if (isset($errors['o_id'])): ?>
            <span class="help-block"><?php echo $errors['o_id'] ?></span>
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