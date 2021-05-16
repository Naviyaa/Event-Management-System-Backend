<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/includes/logic/common_functions.php') ?>
<?php include(ROOT_PATH . '/admin/events/eventLogic.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Event - Related Information</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="../../static/css/style.css">
</head>
<body>
  <?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
  <div class="col-md-8 col-md-offset-2">
      <a href="eventList.php" class="btn btn-primary">
        <span class="glyphicon glyphicon-chevron-left"></span>
        Events
      </a>
      <hr>
      <form class="form" action="eventForm.php" method="post">
        <?php if ($isEditting === true): ?>
          <h1 class="text-center">Update Info</h1>
        <?php else: ?>
          <h1 class="text-center">New Information</h1>
        <?php endif; ?>
        <br />

        <?php if ($isEditting === true): ?>
          <input type="hidden" name="e_id" value="<?php echo $e_id ?>">
        <?php endif; ?>
        <div class="form-group <?php echo isset($errors['e_id']) ? 'has-error': '' ?>">
          <label class="control-label">Event Id</label>
          <input type="number" name="e_id" value="<?php echo $e_id; ?>" class="form-control" min=0>
          <?php if (isset($errors['e_id'])): ?>
            <span class="help-block"><?php echo $errors['e_id'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['budget']) ? 'has-error': '' ?>">
          <label class="control-label">Budget</label>
          <input type="number" name="budget" value="<?php echo $budget; ?>" class="form-control" min=0>
          <?php if (isset($errors['budget'])): ?>
            <span class="help-block"><?php echo $errors['budget'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['e_type']) ? 'has-error': '' ?>">
          <label class="control-label">Event Type</label>
          <input type="text" name="e_type" value="<?php echo $e_type; ?>" class="form-control">
          <?php if (isset($errors['e_type'])): ?>
            <span class="help-block"><?php echo $errors['e_type'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['e_time']) ? 'has-error': '' ?>">
          <label class="control-label">Event Timings</label>
          <input type="time" name="e_time" value="<?php echo $e_time; ?>" class="form-control">
          <?php if (isset($errors['e_time'])): ?>
            <span class="help-block"><?php echo $errors['e_time'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['e_date']) ? 'has-error': '' ?>">
          <label class="control-label">Event Date</label>
          <input type="date" name="e_date" value="<?php echo $e_date; ?>" class="form-control">
          <?php if (isset($errors['e_date'])): ?>
            <span class="help-block"><?php echo $errors['e_date'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo isset($errors['h_id']) ? 'has-error': '' ?>">
          <label class="control-label">Host Id</label>
          <input type="number" name="h_id" value="<?php echo $h_id; ?>" class="form-control" min=0>
          <?php if (isset($errors['h_id'])): ?>
            <span class="help-block"><?php echo $errors['h_id'] ?></span>
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