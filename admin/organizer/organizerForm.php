<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/includes/logic/common_functions.php') ?>
<?php include(ROOT_PATH . '/admin/organizer/organizerLogic.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Orgnizer Information</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="../../static/css/style.css">
</head>
<body>
  <?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
  <div class="col-md-8 col-md-offset-2">
      <a href="organizerList.php" class="btn btn-primary">
        <span class="glyphicon glyphicon-chevron-left"></span>
        Organizers
      </a>
      <hr>
      <form class="form" action="organizerForm.php" method="post">
        <?php if ($isEditting === true): ?>
          <h1 class="text-center">Update Info</h1>
        <?php else: ?>
          <h1 class="text-center">New Information</h1>
        <?php endif; ?>
        <br />

        <?php if ($isEditting === true): ?>
          <input type="hidden" name="o_id" value="<?php echo $o_id ?>">
        <?php endif; ?>
        <div class="form-group <?php echo isset($errors['o_id']) ? 'has-error': '' ?>">
          <label class="control-label">Organizer Id</label>
          <input type="number" name="o_id" value="<?php echo $o_id; ?>" class="form-control" min=0>
          <?php if (isset($errors['o_id'])): ?>
            <span class="help-block"><?php echo $errors['o_id'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['o_name']) ? 'has-error': '' ?>">
          <label class="control-label">Organizer Name</label>
          <input type="text" name="o_name" value="<?php echo $o_name; ?>" class="form-control">
          <?php if (isset($errors['o_name'])): ?>
            <span class="help-block"><?php echo $errors['o_name'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['o_sal']) ? 'has-error': '' ?>">
          <label class="control-label">Organizer Salary</label>
          <input type="number" name="o_sal" value="<?php echo $o_sal; ?>" class="form-control" min=0>
          <?php if (isset($errors['o_sal'])): ?>
            <span class="help-block"><?php echo $errors['o_sal'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['ph_no']) ? 'has-error': '' ?>">
          <label class="control-label">Organizer Phone Number</label>
          <input type="number" name="ph_no" value="<?php echo $ph_no; ?>" class="form-control" min=0>
          <?php if (isset($errors['ph_no'])): ?>
            <span class="help-block"><?php echo $errors['ph_no'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['o_mail']) ? 'has-error': '' ?>">
          <label class="control-label">Organizer Mail</label>
          <input type="email" name="o_mail" value="<?php echo $o_mail; ?>" class="form-control">
          <?php if (isset($errors['o_mail'])): ?>
            <span class="help-block"><?php echo $errors['o_mail'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['o_dob']) ? 'has-error': '' ?>">
          <label class="control-label">Organizer DOB</label>
          <input type="date" name="o_dob" value="<?php echo $o_dob; ?>" class="form-control">
          <?php if (isset($errors['o_dob'])): ?>
            <span class="help-block"><?php echo $errors['o_dob'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['address']) ? 'has-error': '' ?>">
          <label class="control-label">Organizer Address</label>
          <textarea name="address" value="<?php echo $address; ?>"  rows="3" cols="12" class="form-control"><?php echo $address; ?></textarea>
          <?php if (isset($errors['address'])): ?>
            <span class="help-block"><?php echo $errors['address'] ?></span>
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