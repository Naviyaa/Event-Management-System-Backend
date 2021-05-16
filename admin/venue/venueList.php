<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/admin/venue/venueLogic.php') ?>
<?php
  $venue = getAllRoles();
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
  <title>Venue List</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custome styles -->
  <link rel="stylesheet" href="../../static/css/style.css">
</head>
<body>
  <?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
  <div class="col-md-8 col-md-offset-2">
    <a href="venueForm.php" class="btn btn-success">
      <span class="glyphicon glyphicon-plus"></span>
      Add new Info
    </a>
    <hr>
    <h1 class="text-center">Venue details</h1>
    <br />
    <?php if (isset($venue)): ?>
     <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
      <table class="table table-bordered" id="myTable_v">
        <thead>
          <tr>
            <th>V_Id</th>
            <th>Capacity</th>
            <th>V_Add</th>
            <th class="text-center" colspan=2>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($venue as $key => $value): ?>
            <tr>
              <td><?php echo $value['v_id'] ?></td>
              <td><?php echo $value['capacity'] ?></td>
              <td><?php echo $value['v_add'] ?></td>
              <td class="text-center">
                <a href="<?php echo BASE_URL ?>admin/staff/venueForm.php?edit_role=<?php echo $value['v_id'] ?>" class="btn btn-sm btn-success">
                  <span class="glyphicon glyphicon-pencil"></span>
                </a>
              </td>
              <td class="text-center">
                <a href="<?php echo BASE_URL ?>admin/staff/venueForm.php?delete_role=<?php echo $value['v_id'] ?>" class="btn btn-sm btn-danger">
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <h2 class="text-center">No info in table</h2>
    <?php endif; ?>
  </div>
  <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable_v");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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