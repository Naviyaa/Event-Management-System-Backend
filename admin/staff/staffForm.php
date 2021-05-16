<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/includes/logic/common_functions.php') ?>
<?php include(ROOT_PATH . '/admin/staff/staffLogic.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Staff Information</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="../../static/css/style.css">
</head>
<body>
  <?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
  <div class="col-md-8 col-md-offset-2">
      <a href="staffList.php" class="btn btn-primary">
        <span class="glyphicon glyphicon-chevron-left"></span>
       Staff List
      </a>
      <hr>
      <form class="form" action="staffForm.php" method="post">
        <?php if ($isEditting === true): ?>
          <h1 class="text-center">Update Info</h1>
        <?php else: ?>
          <h1 class="text-center">New Information</h1>
        <?php endif; ?>
        <br />

        <?php if ($isEditting === true): ?>
          <input type="hidden" name="s_id" value="<?php echo $s_id ?>">
        <?php endif; ?>
        <div class="form-group <?php echo isset($errors['s_id']) ? 'has-error': '' ?>">
          <label class="control-label">Staff Id</label>
          <input type="number" name="s_id" value="<?php echo $s_id; ?>" class="form-control" min=0>
          <?php if (isset($errors['s_id'])): ?>
            <span class="help-block"><?php echo $errors['s_id'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['s_name']) ? 'has-error': '' ?>">
          <label class="control-label">Staff Name</label>
          <input type="text" name="s_name" value="<?php echo $s_name; ?>" class="form-control">
          <?php if (isset($errors['s_name'])): ?>
            <span class="help-block"><?php echo $errors['s_name'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['s_dob']) ? 'has-error': '' ?>">
          <label class="control-label">Staff DOB</label>
          <input type="date" name="s_dob" value="<?php echo $s_dob; ?>" class="form-control">
          <?php if (isset($errors['s_dob'])): ?>
            <span class="help-block"><?php echo $errors['s_dob'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['s_sal']) ? 'has-error': '' ?>">
          <label class="control-label">Staff Salary</label>
          <input type="number" name="s_sal" value="<?php echo $s_sal; ?>" class="form-control" min=0>
          <?php if (isset($errors['s_sal'])): ?>
            <span class="help-block"><?php echo $errors['s_sal'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['s_ph']) ? 'has-error': '' ?>">
          <label class="control-label">Staff's Phone Number</label>
          <input type="number" name="s_ph" value="<?php echo $s_ph; ?>" class="form-control" min=0>
          <?php if (isset($errors['s_ph'])): ?>
            <span class="help-block"><?php echo $errors['s_ph'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['d_id']) ? 'has-error': '' ?>">
          <label class="control-label">Department Id</label>
          <input type="number" name="d_id" value="<?php echo $d_id; ?>" class="form-control">
          <?php if (isset($errors['d_id'])): ?>
            <span class="help-block"><?php echo $errors['d_id'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['s_add']) ? 'has-error': '' ?>">
          <label class="control-label">Staff Address</label>
          <textarea name="s_add" value="<?php echo $s_add; ?>"  rows="3" cols="12" class="form-control"><?php echo $s_add; ?></textarea>
          <?php if (isset($errors['s_add'])): ?>
            <span class="help-block"><?php echo $errors['s_add'] ?></span>
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