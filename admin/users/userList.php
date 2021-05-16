<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/admin/users/userLogic.php') ?>
<?php
  $adminUsers = getAdminUsers();
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    #myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
  }
  </style>
  <meta charset="utf-8">
  <title>Admin Area - Users </title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custome styles -->
  <link rel="stylesheet" href="../../static/css/style.css">
</head>
<body>
  <?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
  <div class="col-md-8 col-md-offset-2">
    <a href="userForm.php" class="btn btn-success">
      <span class="glyphicon glyphicon-plus"></span>
      Create new user
    </a>
    <hr>
    <h1 class="text-center">Admin Users</h1>
    <br />
    <?php if (isset($users)): ?>
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
      <table class="table table-bordered" id="myTable_u">
        <thead>
          <tr>
            <th>N</th>
            <th>Username</th>
            <th>Role</th>
            <th colspan="2" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($adminUsers as $key => $value): ?>
            <tr>
              <td><?php echo $key + 1; ?></td>
              <td><?php echo $value['username'] ?></td>
              <td><?php echo $value['role']; ?></td>
              <td class="text-center">
                <a href="<?php echo BASE_URL ?>admin/users/userForm.php?edit_user=<?php echo $value['id'] ?>" class="btn btn-sm btn-success">
                  <span class="glyphicon glyphicon-pencil"></span>
                </a>
              </td>
              <td class="text-center">
                <a href="<?php echo BASE_URL ?>admin/users/userForm.php?delete_user=<?php echo $value['id'] ?>" class="btn btn-sm btn-danger">
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <h2 class="text-center">No users in database</h2>
    <?php endif; ?>
  </div>
  <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable_u");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
  <?php include(INCLUDE_PATH . "/layouts/footer.php") ?>
</body>
</html>