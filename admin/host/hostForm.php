<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/includes/logic/common_functions.php') ?>
<?php include(ROOT_PATH . '/admin/host/hostLogic.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Host Information</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="../../static/css/style.css">
</head>
<body>
  <?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
  <div class="col-md-8 col-md-offset-2">
      <a href="hostList.php" class="btn btn-primary">
        <span class="glyphicon glyphicon-chevron-left"></span>
       Hosts
      </a>
      <hr>
      <form class="form" action="hostForm.php" method="post">
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
          <label class="control-label">Host Id</label>
          <input type="number" name="h_id" value="<?php echo $h_id; ?>" class="form-control" min=0>
          <?php if (isset($errors['h_id'])): ?>
            <span class="help-block"><?php echo $errors['h_id'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['h_name']) ? 'has-error': '' ?>">
          <label class="control-label">Host Name</label>
          <input type="text" name="h_name" value="<?php echo $h_name; ?>" class="form-control">
          <?php if (isset($errors['h_name'])): ?>
            <span class="help-block"><?php echo $errors['h_name'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['bill']) ? 'has-error': '' ?>">
          <label class="control-label">Host - Bill</label>
          <input type="number" name="bill" value="<?php echo $bill; ?>" class="form-control" min=0>
          <?php if (isset($errors['bill'])): ?>
            <span class="help-block"><?php echo $errors['bill'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['h_ph']) ? 'has-error': '' ?>">
          <label class="control-label">Host's Phone Number</label>
          <input type="number" name="h_ph" value="<?php echo $h_ph; ?>" class="form-control" min=0>
          <?php if (isset($errors['h_ph'])): ?>
            <span class="help-block"><?php echo $errors['h_ph'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['h_mail']) ? 'has-error': '' ?>">
          <label class="control-label">Host Mail</label>
          <input type="email" name="h_mail" value="<?php echo $h_mail; ?>" class="form-control">
          <?php if (isset($errors['h_mail'])): ?>
            <span class="help-block"><?php echo $errors['h_mail'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['h_dob']) ? 'has-error': '' ?>">
          <label class="control-label">Host DOB</label>
          <input type="date" name="h_dob" value="<?php echo $h_dob; ?>" class="form-control">
          <?php if (isset($errors['h_dob'])): ?>
            <span class="help-block"><?php echo $errors['h_dob'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['h_add']) ? 'has-error': '' ?>">
          <label class="control-label">Host Address</label>
          <textarea name="h_add" value="<?php echo $h_add; ?>"  rows="3" cols="12" class="form-control"><?php echo $h_add; ?></textarea>
          <?php if (isset($errors['h_add'])): ?>
            <span class="help-block"><?php echo $errors['h_add'] ?></span>
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